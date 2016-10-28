<?php /* Smarty version Smarty-3.1.11, created on 2016-10-27 08:44:26
         compiled from "templates/plantillas/modulos/examenes/dashboard/listaAplicadas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:839849260581204ba139046-26001474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef1e3c2c296826798e0785b3ac6760c4d9fcf77c' => 
    array (
      0 => 'templates/plantillas/modulos/examenes/dashboard/listaAplicadas.tpl',
      1 => 1464011994,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '839849260581204ba139046-26001474',
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
  'unifunc' => 'content_581204ba2197e6_13830077',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_581204ba2197e6_13830077')) {function content_581204ba2197e6_13830077($_smarty_tpl) {?><table id="tblSecciones" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Sección</th>
			<th>Nombre</th>
			<th>Inicio</th>
			<th>Fin</th>
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
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['seccion'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['inicio'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fin'];?>
</td>
				<td class="text-right">
					<button type="button" class="btn btn-info" action="exportar" title="Exportar" aplicacion=<?php echo $_smarty_tpl->tpl_vars['row']->value['idAplicacion'];?>
><i class="fa fa-file"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>