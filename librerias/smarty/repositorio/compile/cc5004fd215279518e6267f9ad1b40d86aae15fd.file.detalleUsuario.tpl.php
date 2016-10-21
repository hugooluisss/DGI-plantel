<?php /* Smarty version Smarty-3.1.11, created on 2016-10-21 14:05:44
         compiled from "templates/plantillas/modulos/soporteTecnico/detalleUsuario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3143299915807b0d4d29014-30538971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc5004fd215279518e6267f9ad1b40d86aae15fd' => 
    array (
      0 => 'templates/plantillas/modulos/soporteTecnico/detalleUsuario.tpl',
      1 => 1477076739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3143299915807b0d4d29014-30538971',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5807b0d4d29ac8_32842797',
  'variables' => 
  array (
    'usuario' => 0,
    'PAGE' => 0,
    'aplicaciones' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5807b0d4d29ac8_32842797')) {function content_5807b0d4d29ac8_32842797($_smarty_tpl) {?><center><img src="http://www.iebo.edu.mx/interno/sip-web/fotos/<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getFoto();?>
" style="width: 150px;" onerror="javascript: this.src='<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
img/logo.jpg'" alt="User Image" class="img-thumbnail"/></center>
<br />
<form class="form-horizontal">
	<div class="form-group">
		<label class="control-label col-sm-2">Nombre:</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" disabled readonly value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getNombre();?>
">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Usuario:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" disabled readonly value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getUser();?>
">
		</div>
		<label class="control-label col-sm-2">Contraseña:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" disabled readonly value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getPass();?>
">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Archivo foto:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" disabled readonly value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getFoto();?>
">
		</div>
		<label class="control-label col-sm-2">No Plantel:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" disabled readonly value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getDecodeOtro()->plantel;?>
">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Sexo:</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" disabled readonly value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getDecodeOtro()->sexo;?>
">
		</div>
		<div class="col-sm-2">
			<button action="getData" class="btn btn-danger" user="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getUser();?>
" pass="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getPass();?>
" correo="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getDecodeOtro()->correo;?>
">Enviar Datos</button>
		</div>
	</div>
</form>

<div class="box">
	<div class="box-body">
		<table id="tblAplicaciones" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Examen</th>
					<th>Sección</th>
					<th>Inicio</th>
					<th>Fin</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aplicaciones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td style="background:<?php if ($_smarty_tpl->tpl_vars['row']->value['fin']==''){?>red<?php }else{ ?>green<?php }?>"><?php echo $_smarty_tpl->tpl_vars['row']->value['idAplicacion'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['examen'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['seccion'];?>
</td>
						<td><?php if ($_smarty_tpl->tpl_vars['row']->value['inicio']==''){?><b>Sin iniciar</b><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['seccion'];?>
<?php }?></td>
						<td><?php if ($_smarty_tpl->tpl_vars['row']->value['fin']==''){?><b>Sin finalizar</b><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['fin'];?>
<?php }?></td>
						<td style="text-align: right">
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>