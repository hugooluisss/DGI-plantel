<?php /* Smarty version Smarty-3.1.11, created on 2016-06-01 12:47:52
         compiled from "templates/plantillas/modulos/examenes/importar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1362872969569532c9aee3f2-46781092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b27f197c4f8a8411cb96799195b331efd1fd13f1' => 
    array (
      0 => 'templates/plantillas/modulos/examenes/importar.tpl',
      1 => 1464803269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1362872969569532c9aee3f2-46781092',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_569532c9aef657_60119943',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569532c9aef657_60119943')) {function content_569532c9aef657_60119943($_smarty_tpl) {?><div class="modal fade" id="winImportarExamen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Importar examen</h1>
			</div>
			<div class="modal-body">
				<p>Este es un archivo que se obtiene del sistema en oficinas centrales, puedes solicitarlo por correo electrónico</p>
				<form id="upload" method="post" action="?mod=cexamenes&action=upload" enctype="multipart/form-data">
					<input type="file" name="upl" multiple />
					<br />
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
				<ul class="errores list-group">
				</ul>
			</div>
		</div>
	</div>
</div><?php }} ?>