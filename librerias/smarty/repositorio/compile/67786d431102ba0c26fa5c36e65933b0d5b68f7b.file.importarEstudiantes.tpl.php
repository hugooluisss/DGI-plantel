<?php /* Smarty version Smarty-3.1.11, created on 2016-10-26 12:13:28
         compiled from "templates/plantillas/modulos/usuarios/importarEstudiantes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1589719725810e438f0ad15-53642491%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67786d431102ba0c26fa5c36e65933b0d5b68f7b' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/importarEstudiantes.tpl',
      1 => 1464805256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1589719725810e438f0ad15-53642491',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5810e438f0e036_90820180',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5810e438f0e036_90820180')) {function content_5810e438f0e036_90820180($_smarty_tpl) {?><div class="modal fade" id="winImportarEstudiantes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Importar estudiantes</h1>
			</div>
			<div class="modal-body">
				<p>La importación de estudiantes se hace a través de un archivo generado por el SIGEI, para mayor información consulte el manual de usuario del SIGEI</p>
				<form id="upload" method="post" action="?mod=cusuarios&action=upload" enctype="multipart/form-data">
					<input type="file" name="upl" multiple />
					<br />
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
			</div>
		</div>
	</div>
</div><?php }} ?>