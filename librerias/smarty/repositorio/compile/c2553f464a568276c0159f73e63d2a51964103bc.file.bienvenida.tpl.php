<?php /* Smarty version Smarty-3.1.11, created on 2016-01-15 13:02:49
         compiled from "templates/plantillas/modulos/aplicacion/bienvenida.tpl" */ ?>
<?php /*%%SmartyHeaderCode:771776165699158e24e4a1-63136048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2553f464a568276c0159f73e63d2a51964103bc' => 
    array (
      0 => 'templates/plantillas/modulos/aplicacion/bienvenida.tpl',
      1 => 1452884567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '771776165699158e24e4a1-63136048',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5699158e24ef71_12360058',
  'variables' => 
  array (
    'otrosDatos' => 0,
    'nombre' => 0,
    'examenes' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5699158e24ef71_12360058')) {function content_5699158e24ef71_12360058($_smarty_tpl) {?><div class="page-header">
  <h1>Bienvenid<?php if ($_smarty_tpl->tpl_vars['otrosDatos']->value->sexo=='M'){?>o<?php }else{ ?>a<?php }?> <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
</h1>
</div>

<div class="alert alert-info">Selecciona un examen de la lista para continuar</div>
	<ul class="list-group">
<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['examenes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
		<li class="list-group-item">
			<div class="row">
				<div class="col-md-8">
					<?php echo $_smarty_tpl->tpl_vars['row']->value->getNombre();?>

				</div>
				<div class="col-md-4 text-center">
					<a class="btn btn-success" href="?mod=instruccionesExamen&id=<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
">Ingresar</a>
				</div>
			</div>
		</li>
<?php }
if (!$_smarty_tpl->tpl_vars["row"]->_loop) {
?>
	<li class="list-group-item">No tienes exámenes asignados</li>
<?php } ?>

</ul><?php }} ?>