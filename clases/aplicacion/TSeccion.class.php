<?php
/**
* TSeccion
* Los exámenes regularmente se dividen en secciones
* @package aplicacion
* @autor Hugo Santiago hugo.santiago@iebo.edu.mx
**/


class TSeccion{
	private $idSeccion;
	private $idExamen;
	private $nombre;
	private $tiempo;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	
	public function TSeccion($id = ''){
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
		$rs = $db->Execute("select * from seccion where idSeccion = ".$id);
		
		if ($rs->EOF){
			$this->idSeccion = $id;
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
		return $this->idSeccion;
	}
	
	/**
	* Establece el identificador del examen
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setExamen($val = ''){
		$this->idExamen = $val;
		return true;
	}
	
	/**
	* Retorna el identificador del examen
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getExamen(){
		return $this->idExamen;
	}
	
	/**
	* Establece el nombre de la sección
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
	* Retorna el nombre de la sección
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Establece el tiempo
	*
	* @autor Hugo
	* @access public
	* @param int $seg Segundos permitidos para contestar el examen
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTiempo($seg = 0){
		$this->tiempo = $seg;
		return true;
	}
	
	/**
	* Retorna el valor del tiempo
	*
	* @autor Hugo
	* @access public
	* @return integer Cantidad de segundos
	*/
	
	public function getTiempo(){
		return $this->tiempo == ''?0:$this->tiempo;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->getExamen() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select idSeccion from seccion where idSeccion = ".$this->getId());
		if ($rs->EOF){
			$rs = $db->Execute("INSERT INTO seccion(idSeccion, idExamen, nombre) VALUES (".$this->getId().", ".$this->getExamen().", '');");
			if (!$rs) return false;
		}
		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE seccion
			SET
				idExamen = '".$this->getExamen()."',
				tiempo = ".$this->getTiempo().",
				nombre = '".($this->getNombre())."'
			WHERE idSeccion = ".$this->getId());
			
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
		$rs = $db->Execute("delete from seccion where idSeccion = ".$this->getId());
		
		return $rs?true:false;
	}
	
	/**
	* Retorna el total de puntos asignados, esto se saca sumando el valor de cada reactivo que pertenece a cada sección
	*
	* @autor Hugo
	* @access public
	* @return mixed False si no hay id o un entero con el puntaje
	*/
	function getPuntos(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select sum(valor) as puntos from reactivo a join tema b using(idTema) where idSeccion = ".$this->getId());
		
		return $rs->fields['puntos'];
	}
	
	/**
	* Retorna el total de puntos acumulados
	*
	* @autor Hugo
	* @access public
	* @return mixed False si no hay id o un entero con el puntaje
	*/
	
	function getPuntosAcumulados($usuario = ''){
		if ($this->getId() == '') return false;
		global $pageSesion;
		
		$usuario = $usuario == ''?$pageSesion->getId():$usuario;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("
			select sum(valor) as puntos from aplicacion a join respuesta b using(idAplicacion)
			join opcion c using(idOpcion)
			join reactivo d using(idReactivo)
			join tema e using(idTema)
		where idOpcion = respuesta and e.idSeccion = ".$this->getId()." and idUsuario = ".$usuario);
		
		
		return $rs->fields['puntos'] == ''?0:$rs->fields['puntos'];
	}
}
?>