<?php
class MenuHelper {
	public static function enlace($data,$rol) {

		$estilo = "revoke";
		if($data[$rol] == 0){
			$estilo = "assign";
		}
		$enlace = "<a href='#' type='menu' class='$estilo' rol='$rol' menu='".$data["id"]."' id='$rol-".$data["id"]."' >XXXXXX</a>";
		return $enlace;
	}
}