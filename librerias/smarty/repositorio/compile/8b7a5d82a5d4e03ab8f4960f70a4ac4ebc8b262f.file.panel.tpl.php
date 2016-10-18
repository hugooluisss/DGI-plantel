<?php /* Smarty version Smarty-3.1.11, created on 2015-11-19 12:37:53
         compiled from "templates/plantillas/modulos/secciones/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1769298952561ff70acc7101-42921076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b7a5d82a5d4e03ab8f4960f70a4ac4ebc8b262f' => 
    array (
      0 => 'templates/plantillas/modulos/secciones/panel.tpl',
      1 => 1447958272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1769298952561ff70acc7101-42921076',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_561ff70ad0edf2_22799160',
  'variables' => 
  array (
    'examen' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561ff70ad0edf2_22799160')) {function content_561ff70ad0edf2_22799160($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de secciones</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="btn-toolbar" role="toolbar" aria-label="...">
			<button type="button" class="btn btn-default" id="btnRegresar">Regresar</button>
		</div>
	</div>
</div>
<br />
<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Agregar / Modificar</h3>
		</div>
		<div class="box-body">			
			<div class="form-group">
				<label for="txtNombre" class="col-lg-2">Nombre</label>
				<div class="col-lg-10">
					<input type="text" id="txtNombre" name="txtNombre" autofocus="true" class="form-control" autocomplete="false">
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="button" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
			<input type="hidden" id="examen" value="<?php echo $_smarty_tpl->tpl_vars['examen']->value;?>
"/>
		</div>
	</div>
</form>

<div id="dvLista">
</div><?php }} ?>