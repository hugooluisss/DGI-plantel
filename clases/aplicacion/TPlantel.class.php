<?php
/**
* TPlantel
* La que se le aplica al estudiante
* @package aplicacion
* @autor Hugo Santiago hugo.santiago@iebo.edu.mx
**/


class TPlantel{
	private $idPlantel;
	private $nombre;
	private $clave;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	
	public function TPlantel($id = ''){
		$this->setId($id);
	}
	
	/**
	* Carga los datos del objeto
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB("sip");
		$rs = $db->Execute("select * from plantel where id_plantel = '".$id."'");
		
		foreach($rs->fields as $field => $val)
			switch($field){
				case 'id_plantel':
					$this->idPlantel = $val;
				break;
				case 'nombre':
					$this->nombre_pl = $val;
				break;
				case 'clave_pl':
					$this->clave = $val;
				break;
			}
		
		return true;
	}
	
	/**
	* Retorna el identificador del objeto
	*
	* @autor Hugo
	* @access public
	* @return string identificador
	*/
	
	public function getId(){
		return $this->idPlantel;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Nombre
	*/
	
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Retorna la clave SEP
	*
	* @autor Hugo
	* @access public
	* @return string Clave SEP
	*/
	
	public function getClave(){
		return $this->clave;
	}
}