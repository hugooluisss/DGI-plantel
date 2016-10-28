<?php /* Smarty version Smarty-3.1.11, created on 2016-10-27 09:16:26
         compiled from "templates/plantillas/modulos/configuracion/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208707820558120c3adb3f18-09625050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9543f1dfc1580f27e690302d19dd1a11857dde5' => 
    array (
      0 => 'templates/plantillas/modulos/configuracion/panel.tpl',
      1 => 1455733413,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208707820558120c3adb3f18-09625050',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'planteles' => 0,
    'item' => 0,
    'configuracion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_58120c3ae7c681_88462493',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58120c3ae7c681_88462493')) {function content_58120c3ae7c681_88462493($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Panel de configuración del sistema</h1>
	</div>
</div>

<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">
			<div class="form-group">
				<label for="selPlantel" class="col-lg-2">Plantel</label>
				<div class="col-lg-6">
					<select class="form-control" id="selPlantel" name="selPlantel">
						<option value="">
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['planteles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->clave;?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value->clave==$_smarty_tpl->tpl_vars['configuracion']->value->plantel){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->clave;?>
 - <?php echo $_smarty_tpl->tpl_vars['item']->value->nombre;?>

						<?php } ?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="selInternet" class="col-lg-2">Internet</label>
				<div class="col-lg-1">
					<select class="form-control" id="selInternet" name="selInternet">
						<option value="No" <?php if ($_smarty_tpl->tpl_vars['configuracion']->value->internet=='No'){?>selected<?php }?>>No
						<option value="Si" <?php if ($_smarty_tpl->tpl_vars['configuracion']->value->internet=='Si'){?>selected<?php }?>>Si
					</select>
				</div>
			</div>
			<h3>Correo electrónico</h3>
			<div class="form-group">
				<label for="txtUsuarioMail" class="col-lg-2">Usuario</label>
				<div class="col-lg-6">
					<input class="form-control" id="txtUsuarioMail" name="txtUsuarioMail" value="<?php echo $_smarty_tpl->tpl_vars['configuracion']->value->correo->usuario;?>
"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtContraseñaMail" class="col-lg-2">Contraseña</label>
				<div class="col-lg-6">
					<input class="form-control" type="password" id="txtContrasenaMail" name="txtContrasenaMail" value="<?php echo $_smarty_tpl->tpl_vars['configuracion']->value->correo->contrasena;?>
"/>
				</div>
			</div>
		</div>
		<div class="box-footer text-right">
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</div>
</form><?php }} ?>