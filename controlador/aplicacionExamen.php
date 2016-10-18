<?php
global $objModulo;

switch($objModulo->getId()){
	case 'sustentante':
		global $pageSesion;
		
		$smarty->assign("otrosDatos", json_decode($pageSesion->getOtro()));
		$smarty->assign("nombre", $pageSesion->getNombre());
		
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select idExamen from sustentante a join examen b using(idExamen) where idUsuario = ".$pageSesion->getId()." and estado = 'P'");
		$examenes = array();
		while(!$rs->EOF){
			array_push($examenes, new TExamen($rs->fields['idExamen']));
			$rs->moveNext();
		}
		
		$smarty->assign("examenes", $examenes);
	break;
	case 'instruccionesExamen':
		global $sesion;
		$smarty->assign("examen", new TExamen($_GET['id']));
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from seccion where idExamen = ".$_GET['id']);
		$secciones = array();
		$finalizados = 0;
		
		while(!$rs->EOF){
			$rs->fields["tiempoTexto"] = sprintf("%02d:%02d", $rs->fields['tiempo']/60, $rs->fields['tiempo']%60);
			
			$rs2 = $db->Execute("select idAplicacion from aplicacion where idUsuario = ".$sesion['usuario']." and idSeccion = ".$rs->fields['idSeccion']);
			$rs->fields["aplicacion"] = $rs2->fields['idAplicacion'];
			$rs->fields["fin"] = '';
			
			if ($rs2->EOF){
				$rs->fields["tiempoRestanteTexto"] = "Sin iniciar";
				$rs->fields["tiempoRestante"] = "";
			}else{
				$aplicacion = new TAplicacion($rs2->fields['idAplicacion']);
				$tiempoRestante = $aplicacion->getTiempoRestante();
				
				$rs->fields["fin"] = $aplicacion->getFin() === false?'':$aplicacion->getFin();
				$rs->fields["tiempoRestante"] = $tiempoRestante;
				if ($tiempoRestante <= 0)
					$rs->fields["tiempoRestanteTexto"] = "00:00";
				else
					$rs->fields["tiempoRestanteTexto"] = sprintf("%02d:%02d", $tiempoRestante/60, $tiempoRestante%60);
				
			}
			$seccion = new TSeccion($rs->fields['idSeccion']);
			$rs->fields["puntos"] = $seccion->getPuntos();
			$rs->fields["acumulados"] = $seccion->getPuntosAcumulados();
			
			$finalizados += $rs->fields['fin'] <> ''?1:0;
			array_push($secciones, $rs->fields);
			$rs->moveNext();
		}
		
		unset($sesion['aplicacion']);
		$_SESSION[SISTEMA] = $sesion;
				
		$smarty->assign("secciones", $secciones);
		$smarty->assign("sustentante", $pageSesion);
		
		$smarty->assign("finalizados", $finalizados == count($secciones));
	break;
	case 'panelExamen':
		$db = TBase::conectaDB();
		$seccion = new TSeccion($_GET['seccion']);
		$smarty->assign("seccion", $seccion);
		
		$rs = $db->Execute("select idReactivo from reactivo where idTema in (select idTema from tema a where a.idSeccion = ".$seccion->getId().")");
		$reactivos = array();
		
		while(!$rs->EOF){
			array_push($reactivos, new TReactivo($rs->fields['idReactivo']));
			$rs->moveNext();
		}
		
		$smarty->assign("reactivos", $reactivos);
		
		$smarty->assign("examen", $seccion->getExamen());

		if ($sesion['aplicacion'] == ''){
			$rs = $db->Execute("select idAplicacion from aplicacion where idUsuario = ".$sesion['usuario']." and idSeccion = ".$_GET['seccion']."");
			if ($rs->EOF){
				$aplicacion = new TAplicacion;
				$aplicacion->setUsuario($sesion['usuario']);
				$aplicacion->setSeccion($_GET['seccion']);
				
				$aplicacion->guardar();
				$sesion['aplicacion'] = $aplicacion->getId();
				$_SESSION[SISTEMA] = $sesion;
			}else{
				$aplicacion = new TAplicacion($rs->fields['idAplicacion']);
				$sesion['aplicacion'] = $aplicacion->getId();
				$_SESSION[SISTEMA] = $sesion;
				
				$smarty->assign("fin", $aplicacion->getFin());
			}	
		}else{
			$aplicacion = new TAplicacion($sesion['aplicacion']);
			$smarty->assign("fin", $aplicacion->getFin());
		}
	break;
	case 'getReactivo':
		$reactivo = new TReactivo($_GET['id']);
		$smarty->assign("reactivo", $reactivo);
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select c.idOpcion from aplicacion a join respuesta b using(idAplicacion ) join opcion c using(idOpcion) where idAplicacion = ".$sesion['aplicacion']." and idReactivo = ".$reactivo->getId());
		
		$smarty->assign("respuesta", $rs->fields['idOpcion']);
	break;
	case 'cAplicacionExamen':
		switch($objModulo->getAction()){
			case "guardarRespuesta":
				$respuesta = new TRespuesta();
				
				$respuesta->setAplicacion($sesion['aplicacion']);
				$respuesta->setOpcion($_POST['respuesta']);
				$respuesta->setMostro($_POST['mostrado']);
				
				$datos = array();
				$datos["band"] = $respuesta->guardar();
				
				echo json_encode($datos);
			break;
			case 'getData':
				$seccion = new TSeccion($_POST['seccion']);
				$aplicacion = new TAplicacion($sesion['aplicacion']);
				$db = TBase::conectaDB();
				
				$datos = array();
				if(!is_array($datos))
					$datos = array();
					
				$datos['tiempo'] = $seccion->getTiempo();
				$datos['resta'] = $aplicacion->getTiempoRestante();
				$datos['examen'] = $seccion->getExamen();
				
				$rs = $db->Execute("select idReactivo from reactivo where idTema in (select idTema from tema where idSeccion = ".$seccion->getId().")");
				$reactivos = array();
				$datos['reactivosContestados'] = 0;
				while(!$rs->EOF){
					$rs2 = $db->Execute("select * from respuesta where idAplicacion = ".$aplicacion->getId()." and idOpcion in (select idOpcion from respuesta a join opcion b using(idOpcion) where idReactivo = ".$rs->fields['idReactivo'].")");
					$rs->fields['estado'] = $rs2->EOF?0:1;
					$datos['reactivosContestados'] += $rs2->EOF?0:1;
					
					array_push($reactivos, $rs->fields);
					$rs->moveNext();
				}
				
				$datos['reactivos'] = $reactivos;
				
				echo json_encode($datos);
			break;
			case 'finalizar':
				$aplicacion = new TAplicacion($sesion['aplicacion']);
				echo json_encode(array("band" => $aplicacion->setFin()));
			break;
		}
	break;
}
?>