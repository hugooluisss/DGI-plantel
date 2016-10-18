<?php
global $objModulo;

switch($objModulo->getId()){
	case 'cmail':
		switch($objModulo->getAction()){
			case 'datosAcceso':
				$usuario = new TUSuario($_POST['id']);
				$otros = $usuario->getDecodeOtro();
				if ($otros->correo <> ''){
					$contenido = file_get_contents("repositorio/mail/datosAcceso.txt");
					
					$contenido = str_replace("/*usuario.nombre*/", $usuario->getNombre(), $contenido);
					$contenido = str_replace("/*usuario.user*/", $usuario->getUser(), $contenido);
					$contenido = str_replace("/*usuario.pass*/", $usuario->getPass(), $contenido);
					
					$email = new TMail;
					$email->setTema("Sus datos personales");
					$email->setDestino($otros->correo, $usuario->getNombre());
					
					$email->setBodyHTML(nl2br($contenido)."
<br><br><br> 
<small>
<b>Información importante</b>
Este mensaje es generado automáticamente por el Sistema Evaluación Docente del Instituto de Estudios  
de Bachillerato del Estado de Oaxaca.
<br><br>
<b>Información confidencial</b><br>
La información transmitida es para el uso exclusivo de la persona o entidad a quien va dirigida, 
y puede contener información de caracter confidencial o privilegiado. Se prohíbe a cualquier 
persona o entidad distinta al destinatario, cualquier revisión, retransmisión, distribución u 
otro uso de la información. Si recibió este mensaje por equivocación, atentamente le solicitamos 
eliminar la información de cualquier equipo de cómputo y hacerlo de conocimiento de remitente.
</small>
					");
					
					echo json_encode(array("band" => $email->send()));
				}else
					echo json_encode(array("band" => false));
			break;
		}
	break;
}
?>