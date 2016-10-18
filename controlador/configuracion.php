<?php
global $objModulo;

/*
$db = TBase::conectaDB('sigei');

$rs = $db->Execute("select cveplt as clave, nomplt as nombre from plantel");
$datos = array();
while(!$rs->EOF){
	$rs->fields['clave'] = sprintf("%03s", $rs->fields['clave']);
	array_push($datos, $rs->fields);
	
	$rs->moveNext();
}

echo json_encode($datos);
*/
switch($objModulo->getId()){
	case 'configuracion':
		$smarty->assign("planteles", json_decode(file_get_contents("repositorio/json/planteles.json")));
		$smarty->assign("configuracion", json_decode(file_get_contents("repositorio/json/configuracion.json")));
	break;
	case 'cconfiguracion':
		switch($objModulo->getAction()){
			case 'save':
				$archivo = "repositorio/json/configuracion.json";
				$band = false;
				if(file_exists($archivo)){
					if (json_decode(file_get_contents($archivo)) !== FALSE)
						$band = true;
				}
				
				if ($band){
					$obj = json_decode(file_get_contents("repositorio/json/planteles.json", true));
				}else
					$obj = array();
					
				
				$obj["plantel"] = $_POST['selPlantel'];
				$obj["internet"] = $_POST['selInternet'] == ''?'No':$_POST['selInternet'];
				$obj["correo"]["usuario"] = $_POST['txtUsuarioMail'];
				$obj["correo"]["contrasena"] = $_POST['txtContrasenaMail'];
				
				if(file_put_contents($archivo, json_encode($obj)))
					echo json_encode(array("band" => true));
				else
					echo json_encode(array("band" => false, "mensaje" => "No se pudo guardar el archivo"));
			break;
		}
	break;
}
?>