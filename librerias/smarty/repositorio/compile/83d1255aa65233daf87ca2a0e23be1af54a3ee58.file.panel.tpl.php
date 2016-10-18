<?php /* Smarty version Smarty-3.1.11, created on 2016-05-24 11:41:18
         compiled from "templates/plantillas/modulos/examenes/resultados/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1012129885743337878ecf1-28323694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83d1255aa65233daf87ca2a0e23be1af54a3ee58' => 
    array (
      0 => 'templates/plantillas/modulos/examenes/resultados/panel.tpl',
      1 => 1464108071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1012129885743337878ecf1-28323694',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5743337878f902_64794470',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5743337878f902_64794470')) {function content_5743337878f902_64794470($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Resultados</h1>
	</div>
</div>


<div class="box">
	<div class="box-body">
		<table id="tblResultados" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Sección</th>
					<th>Nombre</th>
					<th>Sustentante</th>
					<th>Inicio</th>
					<th>Fin</th>
					<th>Puntaje</th>
					<th>Cal</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value->seccion->getNombre();?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value->usuario->getNombre();?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value->getInicio();?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value->getFin();?>
</td>
						<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value->getPuntosAcumulados();?>
 / <?php echo $_smarty_tpl->tpl_vars['row']->value->seccion->getPuntos();?>
</td>
						<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value->getPuntosAcumulados()*10/$_smarty_tpl->tpl_vars['row']->value->seccion->getPuntos();?>
</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>