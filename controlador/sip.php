<?php
global $objModulo;

switch($objModulo->getId()){
	case 'listaTrabajadoresSip':
		$db = TBase::conectaDB("sip");
		
		$rs = $db->Execute("select num_personal, nombres, apellido_p, apellido_m, sexo, curp, nip, fecha_nac, id_plantel, nombre_pl, nombre_localidad, nombre_muni, nombre_distrito, nombre_region, correo_pers
from ficha_personal a join plantel b using(id_plantel)
	join localidad c on b.localidad_pl = c.cve_localidad and b.municipio_pl = c.cve_municipio
	join municipio d using(cve_municipio)
	join distrito e using(cve_distrito)
	join region f using(cve_region)
where estatus_laboral = 1;");
		$datos = array();
		while(!$rs->EOF){	
			foreach($rs->fields as $key => $val)
				$rs->fields[$key] = str_replace(array('"', "'", '“', '”'), '', $val);
			
			
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'csip':
		switch($objModulo->getAction()){
			case 'importar':
				$trabajador = $_POST;
				$obj = new TUsuario;
				$obj->setId($obj->buscarPorUsuario($trabajador['usuario']));
				$obj->setNombre($trabajador['nombre']);
				$obj->setPass($trabajador['pass']);
					
				$obj->setUser($trabajador['usuario']);
				$obj->setTipo(3);
				$aux = array();
				$aux['sexo'] = $trabajador['sexo'];
				$aux['identificador'] = $trabajador['num_personal'];
				$aux['plantel'] = $trabajador['plantel'];
				$aux['correo'] = str_replace("*", "", $trabajador['correo']);
				$obj->setOtro(json_encode($aux));
				
				echo json_encode(array("band" => $obj->add()));
			break;
		}
	break;
}
?>