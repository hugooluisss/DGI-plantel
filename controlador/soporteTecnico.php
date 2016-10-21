<?php
global $objModulo;

switch($objModulo->getId()){
	case 'soporteTecnico':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select distinct d.* from examen a join seccion b using(idExamen)join sustentante c using(idExamen) join usuario d using(idUsuario) where a.estado = 'P' and d.estado = 'A';");
		$datos = array();
		
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'detalleUsuario':
		$smarty->assign("usuario", new TUsuario($_POST['id']));
		
		$db = TBase::conectaDB();
		#$rs = $db->Execute("select a.*, b.nombre as seccion, c.nombre as examen from aplicacion a join seccion b using(idSeccion) join examen c using(idExamen) left join sustentante d using(idUsuario, idExamen) where idUsuario = ".$_POST['id']);
		$rs = $db->Execute("select d.*, c.nombre as seccion, b.nombre as examen from sustentante a join examen b using(idExamen) join seccion c using(idExamen) left join aplicacion d using(idUsuario, idSeccion) where a.idUsuario = ".$_POST['id']." and b.estado = 'P';");
		$datos = array();
		
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("aplicaciones", $datos);
	break;
};
?>