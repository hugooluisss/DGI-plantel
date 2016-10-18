<?php
/**
* TRespuesta
* Representa la respuesta a un reactivo
* @package aplicacion
* @autor Hugo Santiago hugo.santiago@iebo.edu.mx
**/


class TRespuesta{
	private $idAplicacion;
	private $opcion;
	private $mostro;
	private $respondio;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	
	public function TRespuesta(){
		$this->opcion = new TOpcion;
	}
	
	
	public function setId(){
		if ($this->getAplicacion() == '') return false;
		if ($this->opcion->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from aplicacion where idAplicacion = ".$this->getAplicacion()." and idOpcion = ".$this->opcion->getId());
		
		foreach($rs->fields as $key => $val){
			switch($key){
				case 'idOpcion':
					$this->opcion = new TOpcion($val);
				break;
				default:
					$this->$key = $val;
			}
		}
		
		return true;
	}
	
	public function setOpcion($val = ''){
		if ($val == '') return false;
		
		$this->opcion = new TOpcion($val);
		return true;
	}
	
	public function setAplicacion($val = ''){
		if ($val == '') return false;
		
		$this->idAplicacion = $val;
		return true;
	}
	
	public function getAplicacion(){
		return $this->idAplicacion;
	}
	
	public function setMostro($val = ''){
		if ($val == '') return false;
		
		$this->mostro = $val;
		return true;
	}
	
	public function getMostro(){
		return $this->mostro;
	}
	
	public function getContesto(){
		return $this->contesto;
	}
	
	public function guardar(){
		if ($this->getAplicacion() == '') return false;
		if ($this->opcion->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$db->Execute("delete from respuesta where idAplicacion = ".$this->getAplicacion()." and idOpcion in (select idOpcion from opcion where idReactivo = ".$this->opcion->getReactivo().")");
		
		$rs = $db->Execute("INSERT INTO respuesta(idAplicacion, idOpcion, respondio, mostro) VALUES (".$this->getAplicacion().", ".$this->opcion->getId().", now(), '".$this->getMostro()."');");
		
		return $rs?true:false;
	}
	
	public function setFin(){
		if ($this->seccion->getId() == '') return false;
		if ($this->usuario->getId() == '') return false;
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$db->Execute("update aplicacion set fin = now() where idAplicacion = ".$this->getId());
		
		return true;
	}
}
?>