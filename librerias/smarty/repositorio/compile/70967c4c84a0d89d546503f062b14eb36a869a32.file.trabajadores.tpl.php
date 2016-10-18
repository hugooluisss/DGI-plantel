<?php /* Smarty version Smarty-3.1.11, created on 2016-06-15 11:46:33
         compiled from "templates/plantillas/modulos/usuarios/trabajadores.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203555826057616941597416-67587965%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70967c4c84a0d89d546503f062b14eb36a869a32' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/trabajadores.tpl',
      1 => 1466009189,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203555826057616941597416-67587965',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57616941621059_22296605',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57616941621059_22296605')) {function content_57616941621059_22296605($_smarty_tpl) {?><table id="tblTrabajadores" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Plantel</th>
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
				<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['num_personal'];?>
</td>
				<td><b><?php echo $_smarty_tpl->tpl_vars['row']->value['nombres'];?>
</b> <?php echo $_smarty_tpl->tpl_vars['row']->value['apellido_p'];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value['apellido_m'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['id_plantel'];?>
 - <?php echo $_smarty_tpl->tpl_vars['row']->value['nombre_pl'];?>
</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-success" action="add" title="Agregar / Actualizar" json='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-plus"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>