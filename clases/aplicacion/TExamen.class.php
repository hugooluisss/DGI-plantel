<?php
/**
* TExamen
* Construcción del examen y su gestión
* @package aplicacion
* @autor Hugo Santiago hugo.santiago@iebo.edu.mx
**/


class TExamen{
	private $idExamen;
	private $periodo;
	public $reactivos;
	private $nombre;
	private $descripcion;
	private $estado;
	private $referencia;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	
	public function TExamen($id = ''){
		$this->setId($id);
		$this->reactivos = array();
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
		$rs = $db->Execute("select * from examen where idExamen = ".$id);
		$this->estado = 'E';
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
			
		$this->reactivos = $this->reactivos;
		
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
		return $this->idExamen;
	}
	
	/**
	* Establece el periodo
	*
	* @autor Hugo
	* @access public
	* @param string $id identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPeriodo($val = ''){
		$this->periodo = $val;
		return true;
	}
	
	/**
	* Retorna el valor del periodo
	*
	* @autor Hugo
	* @access public
	* @return string Periodo
	*/
	
	public function getPeriodo(){
		return $this->periodo;
	}
	
	/**
	* Retorna la duración en horas:minutos
	*
	* @autor Hugo
	* @access public
	* @return string Duración del examen
	*/
	
	public function getDuracion(){
		$db = TBase::conectaDB();
		$rs = $db->Execute("select sum(tiempo) as tiempo from seccion where idExamen = ".$this->getId());
		return sprintf("%02d:%02d", $rs->fields['tiempo']/60, $rs->fields['tiempo']%60);
	}
	
	/**
	* Retorna la duración en minutos
	*
	* @autor Hugo
	* @access public
	* @return integer Duración del examen
	*/
	
	public function getDuracionMinutos(){
		$db = TBase::conectaDB();
		$rs = $db->Execute("select sum(tiempo) as tiempo from seccion where idExamen = ".$this->getId());
		
		return $rs->fields['tiempo'];
	}

	
	/**
	* Establece el nombre
	*
	* @autor Hugo
	* @access public
	* @param string $val Nombre del examen
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNombre($val = ''){
		$this->nombre = $val;
		return true;
	}
	
	/**
	* Retorna el nombre del examen
	*
	* @autor Hugo
	* @access public
	* @return string Nombre
	*/
	
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Establece el descripcion
	*
	* @autor Hugo
	* @access public
	* @param string $val Descripción del examen
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDescripcion($val = ''){
		$this->descripcion = str_replace("'", "", $val);;
		return true;
	}
	
	/**
	* Retorna la descripción
	*
	* @autor Hugo
	* @access public
	* @return string Descripción
	*/
	
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	/**
	* Establece la referencia, es decir, el identificador del examen en oficinas
	*
	* @autor Hugo
	* @access public
	* @param integer $val Identificador en oficinas centrales
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setReferencia($val = ''){
		$db = TBase::conectaDB();
		$rs = $db->execute("select idExamen from examen where referencia = ".$val);
		
		$this->setId($rs->fields['idExamen']);
		
		$this->referencia = $val;
		return true;
	}
	
	/**
	* Retorna la referencia o identificador del examen en oficinas centrales
	*
	* @autor Hugo
	* @access public
	* @return integer Identificador
	*/
	
	public function getReferencia(){
		return $this->referencia;
	}
	
	/**
	* Establece el estado
	*
	* @autor Hugo
	* @access public
	* @param string $val Estado (E, A, T)
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEstado($val = 'E'){
		switch($val){
			case 'C': case 'P': case 'T': //refiriendose a que solo puede ser editando, aplicando y terminado respectivamente
				$this->estado = strtoupper($val);
			break;
			default: return false;
			
		}
		return true;
	}
	
	/**
	* Retorna el estado
	*
	* @autor Hugo
	* @access public
	* @return string inicial del estado
	*/
	
	public function getEstado(){
		return $this->estado;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO examen(nombre, descripcion, periodo) VALUES ('', '', '')");
			$this->idExamen = $db->Insert_ID();
		}
		
		$db->Execute("UPDATE examen
			SET
				nombre = '".$this->getNombre()."',
				descripcion = '".$this->getDescripcion()."',
				periodo = '".$this->getPeriodo()."',
				estado = '".($this->getEstado()  == ''?'C':$this->getEstado())."',
				referencia = '".$this->getReferencia()."'
			WHERE idExamen = ".$this->getId());
			
		return true;
	}
	
	/**
	* Elimina el objeto de la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("delete from examen where idExamen = ".$this->getId());
		
		return $rs?true:false;
	}
	
	/**
	* Agrega la opción y la guarda en la base de datos
	*
	* @autor Hugo
	* @access public
	* @param TOpcion|char Objeto que representa una opción en la pregunta
	* @return boolean True si se realizó sin problemas
	*/
	public function addReactivo($obj = ''){
		if ($this->getId() == '') return false;
		if ($obj == '') return false;
		
		if (!$obj->guardar($this->getId())) return false;
		
		array_push($this->reactivos, $obj);
		return true;
	}
	
	/**
	* Elimina la opción de la lista
	*
	* @autor Hugo
	* @access public
	* @param TOpcion|char Objeto que representa una opción en la pregunta
	* @return boolean True si se realizó sin problemas
	*/
	public function delReactivo($obj = ''){
		if ($this->getId() == '') return false;
		if ($obj == '') return false;
		
		if(!$obj->eliminar()) return false;
		
		$this->getReactivos();
		return true;
	}
	
	/**
	* Carga la lista de opciones al objeto que representa la pregunta
	*
	* @autor Hugo
	* @access public
	* @return array Lista de opciones
	*/
	
	public function getReactivo(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select idReactivo from reactivo where idExamen = ".$this->getId()." order by posicion");
		$this->reactivos = array();
		while(!$rs->EOF){
			array_push($this->reactivos, new TReactivo($rs->fields['idReactivo']));
			
			$rs->moveNext();
		}
		
		return $this->reactivos;
	}
	
	/**
	* crea un objeto json con los datos del examen
	*
	* @autor Hugo
	* @access private
	* @return json Objeto json con todos los datos (preguntas y opciones) del examen
	*/
	
	private function exportar(){
		if ($this->getId() == '') return false;
		$datos = array();
		
		return json_encode($datos);
	}
	
	/**
	* agregar sustentante
	*
	* @autor Hugo
	* @access public
	* @param Integer identificador del usuario
	* @return boolean True si se realizó sin problemas
	*/
	public function addSustentante($id = ''){
		if ($this->getId() == '') return false;
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("insert into sustentante (idExamen, idUsuario) value (".$this->getId().", ".$id.")");
		
		return $rs?true:false;
	}
	
	/**
	* Eliminar un sustentante
	*
	* @autor Hugo
	* @access public
	* @param Integer Identificador del sustentante
	* @return boolean True si se realizó sin problemas
	*/
	public function delSustentante($id = ''){
		if ($this->getId() == '') return false;
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("delete from sustentante where idExamen = ".$this->getId()." and idUsuario = ".$id);
		
		return $rs?true:false;
	}
}
?>