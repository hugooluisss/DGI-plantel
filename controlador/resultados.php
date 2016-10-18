<?php
global $objModulo;

switch($objModulo->getId()){
	case 'resultados':
		$db = TBase::conectaDB();
		$examen = new TExamen($_GET['examen']);
		$rs = $db->Execute("select * from aplicacion a join seccion b using(idSeccion) where idExamen = ".$examen->getId());
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, new TAplicacion($rs->fields['idAplicacion']));
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
}
?>