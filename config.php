<?php
define('SISTEMA', 'Diagnóstico General de Ingreso');
define('VERSION', 'v 1.0');
define('ALIAS', '');
define('AUTOR', 'Hugo Luis Santiago Altamirano');
define('EMAIL', 'hugooluisss@gmail.com');
define('EMAILSOPORTE', 'hugo.santiago@iebo.edu.mx');
define('STATUS', 'En desarrollo');

define('LAYOUT_DEFECTO', 'layout/default.tpl');
define('LAYOUT_AJAX', 'layout/update.tpl');
define('LAYOUT_EXAMEN', 'layout/examen.tpl');

#Login y su controlador	
$conf['inicio'] = array(
	'controlador' => 'usuarios.php',
	'descripcion' => '',
	'seguridad' => false,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('login.js'),
	'capa' => 'layout/login.tpl');
	
$conf['registro'] = array(
	'controlador' => 'usuarios.php',
	'descripcion' => '',
	'seguridad' => false,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('registro.js'),
	'capa' => 'layout/registro.tpl');

$conf['logout'] = array(
	'controlador' => 'login.php',
	#'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Salir del sistema',
	'seguridad' => false,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);
	
#Login y su controlador	
$conf['clogin'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Inicio de sesion',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
$conf['panel'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);

$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/lista.tpl',
	'descripcion' => 'Lista de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cusuarios'] = array(
	'controlador' => 'usuarios.php',
	'descripcion' => 'Controlador de usuarios',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
/*Exámenes*/
$conf['examenes'] = array(
	#'controlador' => 'index.php',
	'vista' => 'examenes/panel.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array('examen.class.js'),
	'jsTemplate' => array('panelExamenes.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaExamenes'] = array(
	'controlador' => 'examenes.php',
	'vista' => 'examenes/lista.tpl',
	'descripcion' => 'Lista de exámenes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['cexamenes'] = array(
	'controlador' => 'examenes.php',
	'descripcion' => 'Controlador de exámenes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaSustentantes'] = array(
	'controlador' => 'examenes.php',
	'vista' => 'examenes/listaSustentantes.tpl',
	'descripcion' => 'Lista de sustentantes y su estado con respecto al examen',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Aplicación del examen*/
$conf['sustentante'] = array(
	'controlador' => 'aplicacionExamen.php',
	'vista' => 'aplicacion/bienvenida.tpl',
	'descripcion' => 'Bienvenida al estudiante con la lista de planteles',
	'seguridad' => true,
	'capa' => LAYOUT_EXAMEN);
	
$conf['instruccionesExamen'] = array(
	'controlador' => 'aplicacionExamen.php',
	'vista' => 'aplicacion/instruccionesExamen.tpl',
	'descripcion' => 'Presentación del examen',
	'seguridad' => true,
	'capa' => LAYOUT_EXAMEN);
	
$conf['panelExamen'] = array(
	'controlador' => 'aplicacionExamen.php',
	'vista' => 'aplicacion/panel.tpl',
	'descripcion' => 'Panel para contestar el examen',
	'js' => array('aplicacion.class.js'),
	'jsTemplate' => array('aplicacionExamen/aplicacion.js'),
	'seguridad' => true,
	'capa' => LAYOUT_EXAMEN);

$conf['getReactivo'] = array(
	'controlador' => 'aplicacionExamen.php',
	'vista' => 'aplicacion/reactivo.tpl',
	'descripcion' => 'Pregunta',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['cAplicacionExamen'] = array(
	'controlador' => 'aplicacionExamen.php',
	'descripcion' => 'Controlador del aplicador de examenes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);


/*Dashboard*/
$conf['dashboard'] = array(
	'controlador' => 'dashboard.php',
	'vista' => 'examenes/dashboard/panel.tpl',
	'descripcion' => 'Dashboard del administrador',
	'seguridad' => true,
	'js' => array('aplicacion.class.js', 'examen.class.js'),
	'jsTemplate' => array('dashboard.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaSeccionesIniciadas'] = array(
	'controlador' => 'dashboard.php',
	'vista' => 'examenes/dashboard/listaAplicadas.tpl',
	'descripcion' => 'Dashboard del administrador',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cDashboard'] = array(
	'controlador' => 'dashboard.php',
	'descripcion' => 'Controlador del dashboard',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['exportacionOficinas'] = array(
	'controlador' => 'dashboard.php',
	'vista' => 'examenes/dashboard/exportacion.tpl',
	'descripcion' => 'Resultado de la exportación',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Configuracion*/
$conf['configuracion'] = array(
	'controlador' => 'configuracion.php',
	'vista' => 'configuracion/panel.tpl',
	'descripcion' => 'Configuracion del sistema',
	'seguridad' => true,
	#'js' => array('aplicacion.class.js'),
	'jsTemplate' => array('configuracion.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['cconfiguracion'] = array(
	'controlador' => 'configuracion.php',
	'descripcion' => 'Controlador de la configuración del sistema',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Dashboard*/
$conf['resultados'] = array(
	'controlador' => 'resultados.php',
	'vista' => 'examenes/resultados/panel.tpl',
	'descripcion' => 'Resultados del exámen',
	'seguridad' => true,
	#'js' => array('aplicacion.class.js', 'examen.class.js'),
	'jsTemplate' => array('resultados.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaTrabajadoresSip'] = array(
	'controlador' => 'sip.php',
	'vista' => 'usuarios/trabajadores.tpl',
	'descripcion' => 'Trabajadores activos en el SIP',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['csip'] = array(
	'controlador' => 'sip.php',
	'descripcion' => 'Controlador del sip',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cmail'] = array(
	'controlador' => 'mail.php',
	'descripcion' => 'Controlador para el envio de correos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['soporteTecnico'] = array(
	'controlador' => 'soporteTecnico.php',
	'vista' => 'soporteTecnico/panel.tpl',
	'descripcion' => 'Configuracion del sistema',
	'seguridad' => true,
	#'js' => array('aplicacion.class.js'),
	'jsTemplate' => array('soporteTecnico.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['detalleUsuario'] = array(
	'controlador' => 'soporteTecnico.php',
	'vista' => 'soporteTecnico/detalleUsuario.tpl',
	'descripcion' => 'Detalle del registro de usuario',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>