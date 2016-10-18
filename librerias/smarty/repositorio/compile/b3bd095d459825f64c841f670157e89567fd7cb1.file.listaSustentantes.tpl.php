<?php /* Smarty version Smarty-3.1.11, created on 2016-10-14 10:00:52
         compiled from "templates/plantillas/modulos/examenes/listaSustentantes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17149252935696780c0dbbe9-47189032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3bd095d459825f64c841f670157e89567fd7cb1' => 
    array (
      0 => 'templates/plantillas/modulos/examenes/listaSustentantes.tpl',
      1 => 1466014046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17149252935696780c0dbbe9-47189032',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5696780c105034_99230181',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
    'examen' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5696780c105034_99230181')) {function content_5696780c105034_99230181($_smarty_tpl) {?><table id="tblSustentantes" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Usuario</th>
			<th>Nombre</th>
			<th>Pass</th>
			<th>Incluir</th>
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
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['user'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['pass'];?>
</td>
				<td style="text-align: center">
					<input type="checkbox" autocomplete="off" usuario="<?php echo $_smarty_tpl->tpl_vars['row']->value['idUsuario'];?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['agregado']==true){?>checked<?php }?> examen="<?php echo $_smarty_tpl->tpl_vars['examen']->value;?>
"/>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>