{if $fin eq ''}
<input type="hidden" id="seccion" name="seccion" value="{$seccion->getId()}" />
<input type="hidden" id="aplicacion" name="aplicacion" value="{$sesion.aplicacion}" />

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
{else}
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="alert alert-warning text-center" id="FinSeccion">
			<p>Esta sección se encuentra finalizada</p> <br />
			<a href="?mod=instruccionesExamen&id={$examen}" class="btn btn-danger">Aceptar</a>
			
		</div>
	</div>
</div>
{/if}