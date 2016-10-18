<?php
/**
* TTema
* Las secciones están divididas en temas
* @package aplicacion
* @autor Hugo Santiago hugo.santiago@iebo.edu.mx
**/


class TTema{
	private $idTema;
	private $idSeccion;
	private $nombre;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	
	public function TTema($id = ''){
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
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from tema where idTema = ".$id);

		foreach($rs->fields as $field => $val)
			$this->$field = $val;
			
		$this->idTema = $id;
		
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
		return $this->idTema;
	}
	
	/**
	* Establece el identificador de la seccion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setSeccion($val = ''){
		$this->idSeccion = $val;
		return true;
	}
	
	/**
	* Retorna el identificador de la seccion
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getSeccion(){
		return $this->idSeccion;
	}
	
	/**
	* Establece el nombre
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNombre($val = ''){
		$this->nombre = $val;
		return true;
	}
	
	/**
	* Retorna el nombre del tema
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->getSeccion() == '') return false;
		
		$db = TBase::conectaDB();

		$rs = $db->Execute("select idTema from tema where idTema = ".$this->getId());
		if ($rs->EOF){
			$rs = $db->Execute("INSERT INTO tema(idTema, idSeccion, nombre) VALUES (".$this->getId().", ".$this->getSeccion().", '');");
			if (!$rs) return false;
			
			//$this->idTema = $db->Insert_ID();
		}
		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE tema
			SET
				idSeccion = '".$this->getSeccion()."',
				nombre = '".($this->getNombre())."'
			WHERE idTema = ".$this->getId());
			
		return $rs?true:false;
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
		$rs = $db->Execute("delete from tema where idTema = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>