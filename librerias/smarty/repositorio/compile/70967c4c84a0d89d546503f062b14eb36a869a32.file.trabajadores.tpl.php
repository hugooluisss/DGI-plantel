<?php /* Smarty version Smarty-3.1.11, created on 2016-10-26 12:26:08
         compiled from "templates/plantillas/modulos/usuarios/trabajadores.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5801005575810e444e4b979-81970893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70967c4c84a0d89d546503f062b14eb36a869a32' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/trabajadores.tpl',
      1 => 1477502272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5801005575810e444e4b979-81970893',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5810e444ee23d6_18560094',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5810e444ee23d6_18560094')) {function content_5810e444ee23d6_18560094($_smarty_tpl) {?><div class="row">
	<div class="col-md-12">
		<a href="#" class="btn btn-danger pull-center" id="btnImportarTodos">Actualiza / Importar todos</a>
	</div>
</div>
<table id="tblTrabajadores" class="table table-bordered table-hover">
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