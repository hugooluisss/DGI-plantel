<?php /* Smarty version Smarty-3.1.11, created on 2016-10-26 12:41:29
         compiled from "templates/plantillas/modulos/examenes/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:321612505810eac94eaeb4-86377727%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c762b879d2f62900a62c14f087f3f2c16ac6e34' => 
    array (
      0 => 'templates/plantillas/modulos/examenes/lista.tpl',
      1 => 1476457247,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '321612505810eac94eaeb4-86377727',
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
  'unifunc' => 'content_5810eac96133a7_42940025',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5810eac96133a7_42940025')) {function content_5810eac96133a7_42940025($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblExamenes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Periodo</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['periodo'];?>
</td>
						<td style="text-align: right">
							<?php if ($_smarty_tpl->tpl_vars['row']->value['estado']=='C'){?>
								<!--<button type="button" class="btn btn-success" action="email" title="Enviar invitación a sustentantes" examen="<?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
"><i class="fa fa-envelope-o"></i></button>-->
								<button type="button" class="btn btn-info" action="sustentantes" title="Sustentantes" examen="<?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
"><i class="fa fa-users"></i></button>
								<button type="button" class="btn btn-danger" action="estado" title="Publicar" estado="P" examen="<?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
"><i class="fa fa-external-link"></i></button>
								<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" examen="<?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
"><i class="fa fa-times"></i></button>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['row']->value['estado']=='P'){?>
								<!--<button type="button" class="btn btn-success" action="email" title="Enviar invitación a sustentantes" examen="<?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
"><i class="fa fa-envelope-o"></i></button>-->
								<button type="button" class="btn btn-default" action="dashboard" title="Panel de control" examen="<?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
"><i class="fa fa-tachometer"></i></button>
								<button type="button" class="btn btn-info" action="sustentantes" title="Sustentantes" examen="<?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
"><i class="fa fa-users"></i></button>
								<button type="button" class="btn btn-danger" action="estado" title="Finalizar aplicación" estado="T" examen="<?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
"><i class="fa fa-hand-paper-o"></i></button>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['row']->value['estado']=='T'){?>
								<button type="button" class="btn btn-default" action="dashboard" title="Panel de control" examen="<?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
"><i class="fa fa-tachometer"></i></button>
								<button type="button" class="btn btn-default" action="resultados" title="Resultados" examen="<?php echo $_smarty_tpl->tpl_vars['row']->value['idExamen'];?>
"><i class="fa fa-file-excel-o"></i></button>
							<?php }?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>