<div class="row">
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

{include file=$PAGE.rutaModulos|cat:"modulos/examenes/importar.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/examenes/sustentantes.tpl"}