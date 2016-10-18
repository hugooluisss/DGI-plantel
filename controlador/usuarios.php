<?php
global $objModulo;

switch($objModulo->getId()){
	case 'admonUsuarios':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from tipoUsuario");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("tipos", $datos);

	break;
	case 'listaUsuarios':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select a.*, b.nombre as tipo from usuario a join tipousuario b using(idTipo)");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'inicio': default:
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from usuario where idTipo = 1");
		
		if ($rs->EOF){
			echo '<script>location.href="index.php?mod=registro";</script>';
		}
		
	break;
	case 'registro':
	break;
	case 'cusuarios':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TUsuario($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setPass($_POST['pass']);
				$obj->setUser($_POST['usuario']);
				$obj->setTipo($_POST['tipo']);
				
				echo json_encode(array("band" => $obj->add()));
			break;
			case 'del':
				$obj = new TUsuario($_POST['usuario']);
				echo json_encode(array("band" => $obj->del()));
			break;
			case 'setPerfil':
				$obj = new TUsuario($_POST['usuario']);
				echo json_encode(array("band" => $obj->setTipo($_POST["tipo"])));
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
				$file = "temporal/estudiantes.txt";
				if(file_exists($file)){
					$estudiantes = json_decode(file_get_contents($file));
					
					foreach($estudiantes as $estudiante){
						$obj = new TUsuario;
						$obj->setId($obj->buscarPorUsuario($estudiante->matricula));
						$obj->setNombre($estudiante->nombre." ".$estudiante->app." ".$estudiante->apm);
						if ($obj->getId() == '')
							$obj->setPass($estudiante->curp);
							
						$obj->setUser($estudiante->matricula);
						$obj->setTipo(3);
						$aux = array();
						$aux['sexo'] = $estudiante->sexo;
						$aux['identificador'] = $estudiante->idEstudiante;
						$aux['plantel'] = $estudiante->plantel;
						$obj->setOtro(json_encode($aux));
						
						$obj->add();
					}
						
					echo json_encode(array("band" => true));
				}else
					echo json_encode(array("band" => false));
			break;
		}
	break;
}
?>