<div class="page-header">
  <h1>Panel del examen</h1>
</div>
<input type="hidden" id="examen" name="examen" value="{$examen}">

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

{include file=$PAGE.rutaModulos|cat:"modulos/examenes/dashboard/importar.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/examenes/dashboard/modalExportacion.tpl"}