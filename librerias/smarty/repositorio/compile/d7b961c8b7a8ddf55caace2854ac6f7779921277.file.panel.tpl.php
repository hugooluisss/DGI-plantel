<?php /* Smarty version Smarty-3.1.11, created on 2016-10-27 08:44:25
         compiled from "templates/plantillas/modulos/examenes/dashboard/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1295511580581204b9a4af96-93440364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7b961c8b7a8ddf55caace2854ac6f7779921277' => 
    array (
      0 => 'templates/plantillas/modulos/examenes/dashboard/panel.tpl',
      1 => 1455728105,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1295511580581204b9a4af96-93440364',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'examen' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_581204b9af9d64_37463564',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_581204b9af9d64_37463564')) {function content_581204b9af9d64_37463564($_smarty_tpl) {?><div class="page-header">
  <h1>Panel del examen</h1>
</div>
<input type="hidden" id="examen" name="examen" value="<?php echo $_smarty_tpl->tpl_vars['examen']->value;?>
">

<div class="btn-toolbar" role="toolbar" aria-label="...">
	<div class="btn-group" role="group" aria-label="...">
		<button type="button" class="btn btn-default" id="exportarTodos"><i class="fa fa-file"></i> Exportar todo</button>
		<button type="button" class="btn btn-default" id="btnImportar"><i class="fa fa-download"></i> Importar</button>
	</div>
	<div class="btn-group" role="group" aria-label="...">

		<button type="button" class="btn btn-danger" id="btnSubirInformacion"><i class="fa fa-upload"></i> Exportar a oficinas centrales</button>
	</div>
</div>

<br /><br />
<div class="row">
	<div class="col-md-12 col-xs-12">
		<div id="dvExamenes" class="panel panel-success">
			<div class="panel-heading">Aplicaciones</div>
			<div class="panel-body">
				
			</div>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/examenes/dashboard/importar.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/examenes/dashboard/modalExportacion.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>