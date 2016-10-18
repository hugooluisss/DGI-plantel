<?php
/**
* TPrueba
* La que se le aplica al estudiante
* @package aplicacion
* @autor Hugo Santiago hugo.santiago@iebo.edu.mx
**/


class TPrueba{
	private $idPrueba;
	private $fechaInicio;
	private $fechaFin;
	public $estudiante;
	public $plantel;
	public $respuestas;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	
	public function TPrueba($id = ''){
		$this->setId($id);
		$this->respuestas = array();
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
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from prueba where idPrueba = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idPlantel':
					$this->plantel = new TPlantel($id);
				break;
				case 'idEstudiante':
					$this->estudiante = new TEstudiante($id);
				break;
				default:
					$this->$field = $val;
			}
		}
			
		$this->respuestas = array();
		
		return true;
	}
	
	/**
	* Retorna el identificador del objeto
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getId(){
		return $this->idPrueba;
	}
	
	/**
	* Inicia una prueba
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function iniciar(){
		if ($this->estudiante == '') return false;
		
		if ($this->estudiante->getId() == '') return false;
		
		if ($this->plantel == '') return false;
		
		if ($this->plantel->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("INSERT INTO prueba (idEstudiante, idPlantel, fechaInicio) VALUES (".$this->estudiante->getId().", ".$this->plantel->getId().", now());");
		if (!$rs) return false;
		
		return $this->setId($db->Insert_ID());
	}
	
	/**
	* Establece el objeto estudiante
	*
	* @autor Hugo
	* @access public
	* @param string $id identificador
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEstudiante($id = ''){
		$this->estudiante = new TEstudiante($id);
		if ($this->estudiante->getId() == '') return false;
		
		return true;
	}
	
	/**
	* Establece el objeto plantel
	*
	* @autor Hugo
	* @access public
	* @param string $id identificador
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPlantel($id = ''){
		$this->plantel = new TPlantel($id);
		if ($this->estudiante->getId() == '') return false;
		
		return true;
	}
}