<?php
/**
* TOpcion
* Control de opciones a preguntas
* @package aplicacion
* @autor Hugo Santiago hugo.santiago@iebo.edu.mx
**/


class TOpcion{
	private $idOpcion;
	private $idReactivo;
	private $texto;
	private $posicion;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	
	public function TOpcion($id = ''){
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
		$rs = $db->Execute("select * from opcion where idOpcion = ".$id);
		
		if ($rs->EOF){
			$this->idOpcion = $id;
			
			return true;
		}
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
		
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
		return $this->idOpcion;
	}
	
	/**
	* Establece el texto
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTexto($val = ''){
		$this->texto = $val;
		return true;
	}
	
	/**
	* Retorna el valor del texto
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTexto(){
		return $this->texto;
	}
	
	/**
	* Establece el valor de la posicion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPosicion($val = 0){
		$this->posicion = $val;
		return true;
	}
	
	/**
	* Retorna el número de posición
	*
	* @autor Hugo
	* @access public
	* @return integer Posicion
	*/
	
	public function getPosicion(){
		return $this->posicion;
	}
	
	/**
	* Retorna idReactivo
	*
	* @autor Hugo
	* @access public
	* @return integer Posicion
	*/
	
	public function getReactivo(){
		return $this->idReactivo;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @param integer $reactivo Identificador del reactivo
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar($reactivo = ''){
		$db = TBase::conectaDB();
		if ($reactivo <> ''){
			$rs = $db->Execute("select * from reactivo where idReactivo = ".$reactivo);
			if ($rs->EOF) return false;
			
			$rs = $db->Execute("select idOpcion from opcion where idOpcion = ".$this->getId());
			if ($rs->EOF){
				$rs = $db->Execute("INSERT INTO opcion(idOpcion, idReactivo, texto, posicion) VALUES (".$this->getId().", ".$reactivo.", '', 0);");
				if (!$rs) return false;
			}
		}
		
		$rs = $db->Execute("UPDATE opcion
			SET
				texto = '".$this->texto."',
				posicion = ".($this->posicion == ''?0:$this->posicion)."
			WHERE idOpcion = ".$this->getId());
			
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
		$rs = $db->Execute("delete from opcion where idOpcion = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>