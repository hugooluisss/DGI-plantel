<?php
global $objModulo;

switch($objModulo->getId()){
	case 'dashboard':
		$smarty->assign("examen", $_GET['id']);
	break;
	case 'listaSeccionesIniciadas':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select user, c.nombre, b.nombre as seccion, idAplicacion, inicio, fin from aplicacion a join seccion b using(idSeccion) join usuario c using(idUsuario) where idExamen = ".$_GET['examen']);
		$datos = array();
		
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'exportacionOficinas':
		$datos = array();
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select referencia, idExamen from examen where idExamen = ".$_GET['id']);
		$datos = $rs->fields;
		
		$rs = $db->Execute("select idUsuario, b.* from sustentante a join usuario b using(idUsuario) where idExamen = ".$_GET['id']);
		$datos['sustentantes'] = array();
		while(!$rs->EOF){
			$rsResp = $db->Execute("select d.inicio, d.fin, a.idOpcion, a.mostro, a.respondio, c.idReactivo, d.idSeccion
				from respuesta a join opcion b using(idOpcion) 
					join reactivo c using(idReactivo)
					join aplicacion d using(idAplicacion)
				where idExamen = ".$_GET['id']." and idUsuario = ".$rs->fields['idUsuario'].";");
			
			if (!$rs->EOF){
				$rs->fields['respuestas'] = array();
				while(!$rsResp->EOF){
					array_push($rs->fields["respuestas"], $rsResp->fields);
					$rsResp->moveNext();
				}
			}
			array_push($datos["sustentantes"], $rs->fields);
			$rs->moveNext();
		}
		
		$zip = new ZipArchive();
		$archivo = "temporal/oficinas_".date("Y-m-d_His").".zip";
		
		if ($zip->open($archivo, ZIPARCHIVE::CREATE) === TRUE){
			$zip->addFromString("respuestas.txt", base64_encode(json_encode($datos)));
			
			$zip->close();
		}
		
		
		$smarty->assign("datos", $datos);
		$smarty->assign("archivo", $archivo);
		$smarty->assign("configuracion", json_decode(file_get_contents("repositorio/json/configuracion.json")));
	break;
	case 'cDashboard':
		switch($objModulo->getAction()){
			case 'exportarAplicacion':
				$aplicacion = $_POST['aplicacion'];
				$db = TBase::conectaDB();
				
				if ($aplicacion <> ""){
					$rs = $db->Execute("select idAplicacion, inicio, fin, idSeccion, idTipo, ip, idUsuario, user from aplicacion a join usuario b using(idUsuario) where idAplicacion = ".$aplicacion.";");
					
					$usuario = new TUsuario($rs->fields['idUsuario']);
					$archivo = "temporal/".$usuario->getNombre().'.zip';
				}else{
					$rs = $db->Execute("select idAplicacion, inicio, fin, idSeccion, idTipo, ip, idUsuario, user from aplicacion a join usuario b using(idUsuario) join seccion c using(idSeccion) where idExamen = ".$_POST['examen'].";");
					
					$archivo = "temporal/exportacionTotal.zip";
				}
				
					
				$datos = array();
				while(!$rs->EOF){
					$rs->fields['respuestas'] = array();
				
					$rsRespuestas = $db->Execute("select * from respuesta where idAplicacion = ".$rs->fields['idAplicacion']);
					while(!$rsRespuestas->EOF){
						$rs->fields['respuestas'][] = $rsRespuestas->fields;
						$rsRespuestas->moveNext();
					}
					
					array_push($datos, $rs->fields);
					$rs->moveNext();
				}
				
				$zip = new ZipArchive();
				
				if ($zip->open($archivo, ZIPARCHIVE::CREATE) === TRUE){
					$zip->addFromString("respuestas.txt", base64_encode(json_encode($datos)));
					$zip->addFromString("sinEncriptar.txt", json_encode($datos));
					
					$zip->close();
				}
				
				echo json_encode(array("archivo" => $archivo));
			break;
			case 'upload':
				if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
					if (strtolower(end(explode(".", $_FILES['upl']['name']))) !== 'zip'){
						echo '{"status":"error"}';
						exit();
					}
					
					if (!file_exists("temporal/"))
						mkdir("temporal/", 0755);
									
					if(move_uploaded_file($_FILES['upl']['tmp_name'], "temporal/".$_FILES['upl']['name'])){
						chmod("temporal/".$_FILES['upl']['name'], 0755);
						$zip = new ZipArchive;
						if ($zip->open("temporal/".$_FILES['upl']['name']) === TRUE){
							$zip->extractTo("temporal/");
							$zip->close();
							
							echo '{"status":"success"}';
						}else
							echo '{"status":"error"}';
						exit;
					}
				}
				
				echo '{"status":"error"}';
			break;
			case 'importar':
				$file = "temporal/respuestas.txt";
				$db = TBase::conectaDB();
				$estudiantesNo = array();
				if(file_exists($file)){
					$obj = json_decode(base64_decode(file_get_contents($file)));
					$cont = 0;
					
					foreach($obj as $aplicacion){
						$objAplicacion = new TAplicacion();
						
						$rs = $db->Execute("select * from usuario where user = '".$aplicacion->user."'");
						$estudiantesNo[] = "El usuario ".$aplicacion->user." no está registrado en este sistema, no se realizó la importanción";
						
						if (!$rs->EOF){
							$rsAux = $db->Execute("select idAplicacion from aplicacion where idSeccion = ".$aplicacion->idSeccion." and idUsuario = ".$rs->fields['idUsuario']);
							
							if (!$rsAux->EOF)
								$objAplicacion->setId($rsAux->fields['idAplicacion']);
						
							$objAplicacion->setUsuario($rs->fields['idUsuario']);
							$objAplicacion->setInicio($aplicacion->inicio);
							$objAplicacion->setSeccion($aplicacion->idSeccion);
							
							if($objAplicacion->guardar()){
								foreach($aplicacion->respuestas as $respuesta){
									$objResp = new TRespuesta;
									
									$objResp->setOpcion($respuesta->idOpcion);
									$objResp->setAplicacion($objAplicacion->getId());
									$objResp->setMostro($respuesta->mostro);
									$objResp->guardar();
								}
								$objAplicacion->setFin($aplicacion->fin);
							}
							
							$cont++;
						}
					}
				}
				
				echo json_encode(array("band" => true, "importados" => $cont, 'noImportados' => $estudiantesNo));
			break;
			case "exportarPorMail":
				$idExamen = $_POST['examen'];
				$archivo = $_POST['archivo'];
				
				$configuracion = json_decode(file_get_contents("repositorio/json/configuracion.json"));
				
				$sendMail = new TMail;
				$sendMail->setUser($configuracion->correo->usuario);
				$sendMail->setPassword($configuracion->correo->contrasena);
				
				$sendMail->setTema("Exportación enviada");
				$sendMail->setDestino("sistemas.evaluaciones@iebo.edu.mx", utf8_decode("Evaluaciones IEBO"));
				$sendMail->setBodyHTML(utf8_decode($sendMail->construyeMail(file_get_contents("repositorio/mail/exportacion.mail"), $datos)));
				$sendMail->adjuntar($archivo);
				
				$band = false;
				for($x = 0 ; $x < 2 and !$band ; $x++)
					$band = $sendMail->send();
				
				echo json_encode(array("band" => $band));
			break;
		}
	break;
}
?>