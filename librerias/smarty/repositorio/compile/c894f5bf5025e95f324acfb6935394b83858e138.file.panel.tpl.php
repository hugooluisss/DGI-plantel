<?php /* Smarty version Smarty-3.1.11, created on 2016-10-26 12:44:42
         compiled from "templates/plantillas/modulos/soporteTecnico/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18418833015810eb8acfee38-20391490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c894f5bf5025e95f324acfb6935394b83858e138' => 
    array (
      0 => 'templates/plantillas/modulos/soporteTecnico/panel.tpl',
      1 => 1476898895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18418833015810eb8acfee38-20391490',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5810eb8ae00191_11122800',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5810eb8ae00191_11122800')) {function content_5810eb8ae00191_11122800($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Soporte técnico</h1>
	</div>
</div>

<div class="box">
	<div class="box-body">
		<table id="tblSustentantes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Usuario</th>
					<th>Contraseña</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idUsuario'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['user'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['pass'];?>
</td>
						<td class="text-right">
							<button type="button" class="btn btn-success" action="detalle" title="Detalle" usuario="<?php echo $_smarty_tpl->tpl_vars['row']->value['idUsuario'];?>
"><i class="fa fa-tasks"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="winDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
			</div>
		</div>
	</div>
</div><?php }} ?>