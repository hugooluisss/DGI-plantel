<?php /* Smarty version Smarty-3.1.11, created on 2016-10-26 12:41:28
         compiled from "templates/plantillas/modulos/examenes/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16279058415810eac81458d6-63410838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97760ae40ab9ea2087678661ca8a3beb851aca09' => 
    array (
      0 => 'templates/plantillas/modulos/examenes/panel.tpl',
      1 => 1452701288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16279058415810eac81458d6-63410838',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5810eac83c6025_80274067',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5810eac83c6025_80274067')) {function content_5810eac83c6025_80274067($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de exámenes</h1>
	</div>
</div>
<div class="btn-toolbar" role="toolbar">
	<div class="btn-group">
		<button type="button" class="btn btn-default" id="btnImportar"><i class="fa fa-upload"></i> Importar exámen</button>
	</div>
</div>
<br />
<div id="dvLista">
</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/examenes/importar.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/examenes/sustentantes.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>