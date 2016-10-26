<?php /* Smarty version Smarty-3.1.11, created on 2016-10-26 13:58:39
         compiled from "templates/plantillas/modulos/examenes/listaSustentantes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1204612415810eacb4a4b06-36931887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3bd095d459825f64c841f670157e89567fd7cb1' => 
    array (
      0 => 'templates/plantillas/modulos/examenes/listaSustentantes.tpl',
      1 => 1477508038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1204612415810eacb4a4b06-36931887',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5810eacb4f3f41_57048096',
  'variables' => 
  array (
    'tipos' => 0,
    'row' => 0,
    'lista' => 0,
    'examen' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5810eacb4f3f41_57048096')) {function content_5810eacb4f3f41_57048096($_smarty_tpl) {?><div class="row">
	<div class="col-md-12">
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tipos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<button class="btn btn-success add" tipo="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" total="<?php echo $_smarty_tpl->tpl_vars['row']->value['total'];?>
">Agregar <?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
 <span class="badge"><?php echo $_smarty_tpl->tpl_vars['row']->value['total'];?>
</span></button> 
		<?php } ?>
	</div>
</div>

<table id="tblSustentantes" class="table table-bordered table-hover">
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