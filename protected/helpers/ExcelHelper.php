<?php

class ExcelHelper {
	public static function col($num){
		$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
		return $cols[$num];
	}
	public static function generate($data,$name){
		//siempre recibo un CSqlDataProvider (bueno por ahora)
		$rows = $data->getData();
		if( !(isset($rows[0]) && is_array($rows[0])) ){
			$objPHPExcel = new PHPExcel();
			$sheet = $objPHPExcel->setActiveSheetIndex(0);
			$sheet->setCellValue('A1','No hay datos');
			header('Content-Type: application/vnd.ms-excel');
			header("Content-Disposition: attachment;filename='$name.xls'");
			header('Cache-Control: max-age=0');
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
		}
		$columns=array_keys($rows[0]);
		
		$objPHPExcel = new PHPExcel();
		$sheet = $objPHPExcel->setActiveSheetIndex(0);
		
		$i = 0;
		foreach ($columns as $key) {
			$sheet->getColumnDimension(ExcelHelper::col($i))->setAutoSize(true);
			$sheet->setCellValue(ExcelHelper::col($i)."1",$key);
			$i++;
		}
		
		$i = 2;
		foreach ($rows as $row) {
			$j=0;
			foreach ($columns as $key) {
				if( isset ($row[$key]) && $row[$key][0]==0)
					$sheet->setCellValueExplicit(ExcelHelper::col($j).$i,$row[$key],  PHPExcel_Cell_DataType::TYPE_STRING);
				else
					$sheet->setCellValue(ExcelHelper::col($j).$i,$row[$key]);
				$j++;
			}
			$i++;
		}
		
		header('Content-Type: application/vnd.ms-excel');
		header("Content-Disposition: attachment;filename='$name.xls'");
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
	}	
}
