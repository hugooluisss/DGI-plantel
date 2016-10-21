<?php
class TUsuario{
	private $nombre;
	private $pass;
	private $user;
	private $idUsuario;
	private $idTipo;
	private $otro;
	
	public function TUsuario($id = ''){
		$this->setId($id);
		
		return true;
	}
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from usuario where idUsuario = ".$id);
		
		foreach($rs->fields as $key => $val){
			switch($key){
				default:
					$this->$key = $val;
			}
		}
	}
	
	public function getId(){
		return $this->idUsuario;
	}
	
	public function setNombre($val = ''){
		$this->nombre = $val;
		return true;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function setPass($val = ''){
		$this->pass = $val;
		return true;
	}
	
	public function getPass(){
		return $this->pass;
	}
	
	public function setUser($val = ''){
		$this->user = $val;
		return false;
	}
	
	public function getUser($val = ''){
		return $this->user;
	}
	
	public function setTipo($id = ''){
		if ($id == '') return false;
		
		$this->idTipo = $id;
	}
	
	public function getTipo(){
		return $this->idTipo;
	}
	
	public function setOtro($val = ''){
		if ($val == '') return false;
		
		$this->otro = $val;
	}
	
	public function getOtro(){
		return $this->otro;
	}
	
	public function getDecodeOtro(){
		return json_decode($this->otro);
	}
	
	public function getFoto(){
		$obj = $this->getDecodeOtro();
		return $obj->foto;
	}
	
	public function getPlantel(){
		$obj = $this->getDecodeOtro();
		return $obj->id_plantel;
	}
	
	public function buscarPorUsuario($usuario = ''){
		if ($usuario == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from usuario where user = '".$usuario."'");
		
		return $rs->fields['idUsuario'];
	}
	
	public function add(){
		if ($this->getTipo() == '') return false;
		
		$db = TBase::conectaDB();
		if ($this->getId() == ''){
			if ($this->getId() == ''){
				$rs = $db->Execute("INSERT INTO usuario(idTipo) VALUES (".$this->getTipo().");");
				if (!$rs) return false;
				
				$this->idUsuario = $db->Insert_ID();
			}
		}
		
		$rs = $db->Execute("UPDATE usuario
			SET
				nombre = '".$this->getNombre()."',
				pass = '".$this->getPass()."',
				user = '".$this->getUser()."',
				idTipo = ".$this->getTipo().",
				otro = '".$this->getOtro()."'
			WHERE idUsuario = ".$this->getId());
		
		return $rs?true:false;
	}
	
	public function del(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("delete from usuario where idUsuario = ".$this->getId()."");
		
		return $rs?true:false;
	}
}
?>