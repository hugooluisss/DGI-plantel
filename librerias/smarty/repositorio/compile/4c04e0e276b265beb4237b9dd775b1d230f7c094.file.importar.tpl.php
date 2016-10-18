<?php /* Smarty version Smarty-3.1.11, created on 2016-02-11 11:58:35
         compiled from "templates/plantillas/modulos/examenes/dashboard/importar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75917954056bcc9abd44e84-77297250%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c04e0e276b265beb4237b9dd775b1d230f7c094' => 
    array (
      0 => 'templates/plantillas/modulos/examenes/dashboard/importar.tpl',
      1 => 1455213415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75917954056bcc9abd44e84-77297250',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_56bcc9abd47da4_39545471',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56bcc9abd47da4_39545471')) {function content_56bcc9abd47da4_39545471($_smarty_tpl) {?><div class="modal fade" id="winImportarDatos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Importar aplicaciones</h1>
			</div>
			<div class="modal-body">
				<form id="upload" method="post" action="?mod=cDashboard&action=upload" enctype="multipart/form-data">
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