<?php

class MailHelper {
	public static function sendMail($mensaje) {
		$tipo = pb("mail", "tipo");
		//dd($tipo);
		if($tipo->valor == "gmail"){
			$config = array(
					'ssl' => 'tls',
					'port' => 587,
					'auth' => 'login',
					'username' => $tipo->referencia_1,
					'password' => $tipo->referencia_2,
			);
			
			$transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);
			Zend_Mail::setDefaultTransport($transport);
		}else if($tipo->valor == "elrosado"){
			$smtp = pb("mail", "smtp");
			$config = array(
					'port' => $smtp->referencia_1,
					'auth' => 'login',
					'username' => $tipo->referencia_1,
					'password' => $tipo->referencia_2,
			);
			if(!empty($smtp->referencia_2))
				$config['ssl'] = $smtp->referencia_2;
			
			$transport = new Zend_Mail_Transport_Smtp($smtp->valor, $config);
			Zend_Mail::setDefaultTransport($transport);
		}else if($tipo->valor == "pop"){
			$server = pb("mail", "server");
			$config = array(
					'port' => $server->referencia_1,
					'auth' => 'login',
					'username' => $tipo->referencia_1,
					'password' => $tipo->referencia_2,
			);
			if(!empty($server->referencia_2))
				$config['ssl'] = $server->referencia_2;
			
			$transport = new Zend_Mail_Transport_Smtp($server->valor, $config);
			Zend_Mail::setDefaultTransport($transport);
		}else
			throw new CHttpException(404,'No esta configurado un tipo de mail: gmail, elrosado, ...');
		$from = pb("mail", "from");
		$mail = new Zend_Mail('utf-8');
		$mail->setHeaderEncoding(Zend_Mime::ENCODING_QUOTEDPRINTABLE);
		foreach (explode(";", $mensaje->to) as $correo) {
			$mail->addTo($correo);
		}
		if(!empty($mensaje->cc)){
			foreach (explode(";", $mensaje->cc) as $correo) {
				$mail->addCc($correo);
			}
		}
		if(!empty($mensaje->bcc)){
			foreach (explode(";", $mensaje->bcc) as $correo) {
				$mail->addBcc($correo);
			}
		}
		$mail->setFrom($from->valor, $from->referencia_1);
		$mail->setSubject($mensaje->subject);
		$mail->setBodyHtml($mensaje->body);
		$mail->send();
		return true;
	}
}
