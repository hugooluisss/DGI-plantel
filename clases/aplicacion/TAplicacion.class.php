<?php
/**
* TAplicacion
* Representa a la aplicación de un examen
* @package aplicacion
* @autor Hugo Santiago hugo.santiago@iebo.edu.mx
**/


class TAplicacion{
	private $idAplicacion;
	public $seccion;
	public $usuario;
	private $inicio;
	private $fin;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	
	public function TAplicacion($id = ''){
		$this->usuario = new TUsuario;
		$this->seccion = new TSeccion;
		
		$this->setId($id);
	}
	
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from aplicacion where idAplicacion = ".$id);
		
		foreach($rs->fields as $key => $val){
			switch($key){
				case 'idUsuario':
					$this->usuario = new TUsuario($val);
				break;
				case 'idSeccion':
					$this->seccion = new TSeccion($val);
				break;
				default:
					$this->$key = $val;
			}
		}
		
		return true;
	}
	
	public function setUsuario($idUsuario = ''){
		if ($idUsuario == '') return false;
		
		$this->usuario = new TUsuario($idUsuario);
		return true;
	}
	
	public function setSeccion($seccion = ''){
		if ($seccion == '') return false;
		
		$this->seccion = new TSeccion($seccion);
		return true;
	}
	
	public function setInicio($ini = ''){
		$this->inicio = $ini;
		return true;
	}
	
	public function getInicio(){
		if ($this->getId() == '') return false;
		
		return $this->inicio;
	}
	
	public function getFin(){
		if ($this->getId() == '') return false;
		
		return $this->fin;
	}
	
	public function getId(){
		return $this->idAplicacion;
	}
	
	public function tiempoTranscurrido(){
		if ($this->seccion->getId() == '') return false;
		
		if ($this->getId() == '') return false;
		
		return strtotime("now") - strtotime($this->getInicio());
	}
	
	/**
	* Retorna el valor del tiempo restante para la sección
	*
	* @autor Hugo
	* @access public
	* @return integer Cantidad de segundos
	*/
	
	public function getTiempoRestante(){
		if ($this->seccion->getId() == '') return -1;
		
		$fecha = new DateTime($this->getInicio());
		$fechaNow = new DateTime();
		$restante = $fechaNow->getTimestamp() - ($fecha->getTimestamp() + $this->seccion->getTiempo() * 60);
		$restante *= -1;
		$restante = $restante <= 1?0:$restante;
		return $restante;
	}
	
	public function guardar(){
		if ($this->usuario->getId() == '') return false;
		if ($this->seccion->getId() == '') return false;
		
		$db = TBase::conectaDB();
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO aplicacion(idUsuario, idSeccion, ip, inicio) VALUES (".$this->usuario->getId().", ".$this->seccion->getId().", '".getIpUsuario()."', now());");
			if (!$rs) return false;
			
			$this->setId($db->Insert_ID());
		}
		
		return true;
	}
	
	public function setFin($fin = ''){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($fin == '')
			$db->Execute("update aplicacion set fin = now() where idAplicacion = ".$this->getId());
		else
			$db->Execute("update aplicacion set fin = '".$fin."' where idAplicacion = ".$this->getId());
		
		return true;
	}
	
	public function getPuntosAcumulados(){
		if ($this->seccion->getId() == '') return 0;
		return $this->seccion->getPuntosAcumulados($this->usuario->getId());
	}
	
	public function eliminar($fin = ''){
		if ($this->getId() == '') return false;
		$db = TBase::conectaDB();
		
		$db->Execute("delete from aplicacion where idAplicacion = ".$this->getId());
		
		return true;
	}
}
?>