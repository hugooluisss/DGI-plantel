<?php /* Smarty version Smarty-3.1.11, created on 2016-10-17 12:06:01
         compiled from "templates/plantillas/modulos/aplicacion/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1206662818569947ab06f174-99881110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a86e21f5c8eec86adfa1a5b1b1c9102e9aa6d72' => 
    array (
      0 => 'templates/plantillas/modulos/aplicacion/panel.tpl',
      1 => 1476723960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1206662818569947ab06f174-99881110',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_569947ab06faf6_96245676',
  'variables' => 
  array (
    'fin' => 0,
    'seccion' => 0,
    'sesion' => 0,
    'examen' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569947ab06faf6_96245676')) {function content_569947ab06faf6_96245676($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['fin']->value==''){?>
<input type="hidden" id="seccion" name="seccion" value="<?php echo $_smarty_tpl->tpl_vars['seccion']->value->getId();?>
" />
<input type="hidden" id="aplicacion" name="aplicacion" value="<?php echo $_smarty_tpl->tpl_vars['sesion']->value['aplicacion'];?>
" />

<div class="panel panel-default">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-4 text-left" id="dvNumeracion"></div>
			<div class="col-md-4 text-center" id="dvContestados"></div>
			<div class="col-md-4 text-right" id="tiempo"></div>
		</div>
	</div>
</div>

<button id="btnTerminarSeccion" class="btn btn-danger">Terminar sección</button>

<div class="alert alert-info alert-dismissible" role="alert"></div>

<div class="row">
	<div class="col-xs-12 text-right">
		<b>Reactivo</b> 
		<button id="btnAnterior" class="btn btn-default">Anterior</button>
		<button id="btnSiguiente" class="btn btn-default">Siguiente</button>
	</div>
</div>
<div class="pregunta">
</div>

<div class="modal fade" id="winReactivos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Reactivos</h1>
			</div>
			<div class="modal-body">
				<div class="row text-center">
					<button class="btn btn-default">Sin contestar</button>
					<button class="btn btn-primary">Contestados</button>
				</div>
				<br /><br />
				<div class="row dos">
				</div>
			</div>
		</div>
	</div>
</div>
<?php }else{ ?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="alert alert-warning text-center" id="FinSeccion">
			<p>Esta sección se encuentra finalizada</p> <br />
			<a href="?mod=instruccionesExamen&id=<?php echo $_smarty_tpl->tpl_vars['examen']->value;?>
" class="btn btn-danger">Aceptar</a>
			
		</div>
	</div>
</div>
<?php }?><?php }} ?>