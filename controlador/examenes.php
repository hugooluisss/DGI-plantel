<?php
global $objModulo;

switch($objModulo->getId()){
	case 'listaExamenes':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from examen");
		$datos = array();
		while(!$rs->EOF){
			$aux = array();
			
			foreach($rs->fields as $key => $val)
				$aux[$key] = $val;

			$aux['json'] = json_encode($aux);
			
			array_push($datos, $aux);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'listaSustentantes':
		$db = TBase::conectaDB();
		$tipos = array();
		foreach(array("ASESOR", "DIRECTOR DE PLANTEL") as $key => $val){
			$rs = $db->Execute("select count(*) as total from usuario where idTipo = 3 and estado = 'A' and otro like '%".$val."%' and not idUsuario in (select idUsuario from sustentante where idExamen = ".$_POST['examen'].")");
			
			array_push($tipos, array("id" => $val, "total" => $rs->fields['total']));
		}
		$smarty->assign("tipos", $tipos);
		
		$rs = $db->Execute("select * from usuario where idTipo = 3 and estado = 'A'");
		$datos = array();
		while(!$rs->EOF){
			$rsAux = $db->Execute("select idUsuario from sustentante where idUsuario = ".$rs->fields['idUsuario']." and idExamen = ".$_POST['examen']);
			$rs->fields['agregado'] = $rsAux->EOF?false:true;
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
		$smarty->assign("examen", $_POST['examen']);
	break;
	case 'cexamenes':
		switch($objModulo->getAction()){
			case 'del':
				$obj = new TExamen($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'setEstado':
				$obj = new TExamen($_POST['id']);
				$obj->setEstado($_POST['estado']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'upload':
				if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
					if (strtolower(end(explode(".", $_FILES['upl']['name']))) !== 'zip'){
						echo '{"status":"error"}';
						exit();
					}
					
					if (file_exists("temporal/"))
						delTree('temporal');
					
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
				$file = "temporal/examen.txt";
				if(file_exists($file)){
					$obj = json_decode(file_get_contents($file));
					
					$examen = new TExamen;
					$examen->setReferencia($obj->idExamen);
					$examen->setNombre($obj->nombre);
					$examen->setPeriodo($obj->periodo);
					$examen->setDescripcion(addslashes($obj->descripcion));
					
					$examen->guardar();
					
					foreach($obj->secciones as $seccion){
						$objSeccion = new TSeccion;
						$objSeccion->setId($seccion->idSeccion);
						$objSeccion->setExamen($examen->getId());
						$objSeccion->setNombre(addslashes($seccion->nombre));
						$objSeccion->setTiempo($seccion->tiempo);
						
						$objSeccion->guardar();
						
						#Ahora los temas de cada sección
						foreach($seccion->temas as $tema){
							$objTema = new TTema;
							
							$objTema->setId($tema->idTema);
							$objTema->setSeccion($tema->idSeccion);
							$objTema->setNombre($tema->nombre);
							
							$objTema->guardar();
						}
					}
					
					foreach($obj->reactivos as $pregunta){
						$reactivo = new TReactivo;
						$reactivo->setId($pregunta->idReactivo);
						$reactivo->setInstrucciones(addslashes($pregunta->instrucciones));
						$reactivo->setTema($pregunta->idTema);
						$reactivo->setValor($pregunta->valor);
						$reactivo->setPosicion($pregunta->posicion);
						$reactivo->setRespuesta($pregunta->respuesta);
						
						$reactivo->guardar($examen->getId());
						
						foreach($pregunta->opciones as $opcion){
							$objOpcion = new TOpcion;
							$objOpcion->setId($opcion->idOpcion);
							$objOpcion->setTexto(addslashes($opcion->texto));
							
							$objOpcion->guardar($reactivo->getId());
						}

					}
					
					#ahora multimedia
					mkdir("repositorio/imagenes/".$examen->getReferencia(), 0777);
					$directorio = "repositorio/imagenes/".$examen->getReferencia();
					$temporal = "temporal/multimedia";
					
					if (file_exists($temporal)){
						$contenidoDir = scandir($temporal);
						foreach($contenidoDir as $archivo){
							if ($archivo != '.' and $archivo != '..'){
								copy($temporal.'/'.$archivo, $directorio.'/'.$archivo);
							}
						}
					}
					
					echo json_encode(array("band" => $examen->guardar()));
				}else
					echo json_encode(array("band" => false));
			break;
			case 'addSustentante':
				$examen = new TExamen($_POST['examen']);
				echo json_encode(array("band" => $examen->addSustentante($_POST['usuario'])));
			break;
			case 'addSustentanteByTipo':
				$examen = new TExamen($_POST['examen']);
				$db = TBase::conectaDB();
		
				$rs = $db->Execute("select idUsuario from usuario where otro like '%".$_POST['tipo']."%' and not idUsuario in (select idUsuario from sustentante where idExamen = ".$_POST['examen'].")");
				while(!$rs->EOF){
					$examen->addSustentante($rs->fields['idUsuario']);
					$rs->moveNext();
				}
				
				echo json_encode(array("band" => true));
			break;
			case 'delSustentante':
				$examen = new TExamen($_POST['examen']);
				echo json_encode(array("band" => $examen->delSustentante($_POST['usuario'])));
			break;
		}
	break;
}
?>