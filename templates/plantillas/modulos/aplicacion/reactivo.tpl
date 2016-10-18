<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Reactivo</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12">
				{$reactivo->getInstrucciones()}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<ul class="list-group">
					{foreach from=$reactivo->getOpciones() item="row"}
						<div class="checkbox list-group-item">
							<label>
								<input type="radio" value="{$row->getId()}" {if $respuesta eq $row->getId()}checked{/if} name="respuestaReactivo">{$row->getTexto()}
							</label>
						</div>
					{/foreach}
				</ul>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 text-right">
				<button id="btnGuardar" class="btn btn-success">Guardar</button>
				<button id="btnSaltarSinContestar" class="btn btn-danger">Siguiente sin contestar</button>
			</div>
		</div>
		<!--
		<br />
		<div class="row">
			<div class="col-xs-12 text-left">
				<button id="btnAnterior" class="btn btn-default">Anterior</button>
				<button id="btnSiguiente" class="btn btn-default">Siguiente</button>
			</div>
		</div>
		-->
	</div>
</div>

<input type="hidden" id="mostrado" name="mostrado" value="{$smarty.now|date_format:"%G-%m-%d %I:%M:%S"}"/>