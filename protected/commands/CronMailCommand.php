<?php

// adding Zend Framework autoloader
Yii::import('application.vendors.*');
require "Zend/Loader/Autoloader.php";
Yii::registerAutoloader(array('Zend_Loader_Autoloader','autoload'), true);

class CronMailCommand extends CConsoleCommand
{
    public function actionTest() {
		//foreach (TiposAdquisicion::model()->findAll() as $key => $value) {
		//	echo $value->nombre."\n";
		//}
		foreach (explode(";", "aaa;bbb;ccc") as $correo) {
			echo $correo."\n";
		}
	}
	
	public function actionSendMail($tipo,$send=false){
		foreach (Parametro::model()->findAllByAttributes(
				array(
					'escenario'=>'notificaciones',
					'parametro'=>$tipo,
					'status'=>'1',
					'referencia_1'=>'dias',
					)
			) 
			as $key => $value) {
			$this->prepareMail($value,$send);
		}
	}
	
	protected function prepareMail($param_dias,$send){
			$rows = $this->getMateriales($param_dias->parametro,$param_dias->valor);
			foreach($rows as $material){
				$resp = Responsable::model()->findByAttributes(array(
					'codigo'=>$material['responsable_codigo'],
					'status'=>1,));
				$cc = $parametro = Parametro::model()->findByAttributes(array(
					'escenario'=>$param_dias->escenario,
					'parametro'=>$param_dias->parametro,
					'valor'=>'cc',
					'status'=>1,));
				$bcc = $parametro = Parametro::model()->findByAttributes(array(
					'escenario'=>$param_dias->escenario,
					'parametro'=>$param_dias->parametro,
					'valor'=>'bcc',
					'status'=>1,));
				$subject = $parametro = Parametro::model()->findByAttributes(array(
					'escenario'=>$param_dias->escenario,
					'parametro'=>$param_dias->parametro,
					'valor'=>'subject',
					'status'=>1,));
				$body = $parametro = Parametro::model()->findByAttributes(array(
					'escenario'=>$param_dias->escenario,
					'parametro'=>$param_dias->parametro,
					'valor'=>'body',
					'status'=>1,));
				
				if(empty($resp->correo))
					throw new CException("El responsable '$resp->codigo' no tiene cuenta de correo asignada.");
				
				$clave = "material[".$material['id']."] $param_dias->parametro[$param_dias->id]";
				
				$mail = Mail::model()->findByAttributes(array('campo'=>$clave));
				
				if(empty($mail)){				
					$mail = new Mail;
					$mail->referencia = $material["obra"];
					$mail->tipo = $param_dias->parametro;
					$mail->to = $resp->correo;
					$mail->cc = $cc->referencia_1;
					$mail->bcc = $bcc->referencia_1;
					$mail->subject = $this->replaceValues($material,$subject->referencia_1.$param_dias->referencia_2);
					$mail->body = $this->replaceValues($material,$body->referencia_3.$param_dias->referencia_3);
					$mail->status = 1;
					$mail->registro= date(p('saveDateTime'));

					//clave, para identificar si ya se envio este mail por este evento.
					$mail->campo = $clave;

					$mail->save();
				}
				if($send){
					if(empty($mail->envio)){
						MailHelper::sendMail($mail);
						$mail->envio= date(p('saveDateTime'));
						$mail->save();	
					}
				}
			}
	}
	
	protected function replaceValues($fila,$mensaje){
		$newmessage = $mensaje;
		foreach ($fila as $key => $value) {
			//echo "$key => $value\n";
			$newmessage = str_replace(':'.$key,$value,$newmessage);
		}
		return $newmessage;
	}
	
	protected function getMateriales($tipo='fecha_tope_pedido',$dias=0){
		$sql   = " select  \n";
		$sql  .= " materiales_rubros.id, \n";
		$sql  .= " responsable.codigo responsable_codigo, \n";
		$sql  .= " responsable.nombre responsable_nombre, \n";
		$sql  .= " concat(materiales_rubros.responsable_aprobacion, ' [', responsable.nombre,']') responsable_aprobacion, \n";
		$sql  .= " materiales_rubros.categoria, \n";
		$sql  .= " materiales_rubros.rubro, \n";
		$sql  .= " materiales_rubros.subrubro, \n";
		$sql  .= " materiales_rubros.etapa_obra, \n";
		$sql  .= " obras.nombre obra, \n";
		$sql  .= " materiales_rubros.nombre, \n";
		$sql  .= " materiales_rubros.dias_tramite_compra, \n";
		$sql  .= " materiales_rubros.dias_adquisicion, \n";
		$sql  .= " materiales_rubros.tipo_adquisicion_id, \n";
		$sql  .= " tipos_adquisicion.nombre tipo_adquisicion, \n";
		$sql  .= " DATEDIFF(NOW(),obras.fecha_inicio) dias_hoy, \n";
		$sql  .= " DATE_FORMAT(obras.fecha_inicio,'".p('showDateMysql')."') fecha_inicio, \n";
		$sql  .= " DATE_FORMAT(obras.fecha_inicio + INTERVAL materiales_rubros.dias_tramite_compra DAY,'".p('showDateMysql')."') dia_tope_pedido, \n";
		$sql  .= " DATE_FORMAT(obras.fecha_inicio + INTERVAL materiales_rubros.dias_adquisicion DAY,'".p('showDateMysql')."') dia_arribo_obra \n";
		$sql  .= " from materiales_rubros, obras, tipos_adquisicion, responsable \n";
		$sql  .= " where obras.id = materiales_rubros.obra_id \n";
		$sql  .= " and tipos_adquisicion.id = materiales_rubros.tipo_adquisicion_id \n";
		$sql  .= " and responsable.codigo = materiales_rubros.responsable_aprobacion \n";
		$sql  .= " and obras.status = 1 \n";
		$sql  .= " and materiales_rubros.status = 1 \n";
		if($tipo == 'fecha_tope_pedido')
			$sql  .= " and date(obras.fecha_inicio + INTERVAL ( materiales_rubros.dias_tramite_compra + $dias ) DAY  ) = curdate() \n";		
		if($tipo == 'fecha_arribo_obra')
			$sql  .= " and date(obras.fecha_inicio + INTERVAL ( materiales_rubros.dias_adquisicion + $dias ) DAY  ) = curdate() \n";
		//echo $sql;
		$command=Yii::app()->db->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
}