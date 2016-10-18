<div class="page-header">
  <h1>Bienvenid{if $otrosDatos->sexo eq 'M'}o{else}a{/if} {$nombre}</h1>
</div>

<div class="alert alert-info">Selecciona un examen de la lista para continuar</div>
	<ul class="list-group">
{foreach from=$examenes item="row"}
		<li class="list-group-item">
			<div class="row">
				<div class="col-md-8">
					{$row->getNombre()}
				</div>
				<div class="col-md-4 text-center">
					<a class="btn btn-success" href="?mod=instruccionesExamen&id={$row->getId()}">Ingresar</a>
				</div>
			</div>
		</li>
{foreachelse}
	<li class="list-group-item">No tienes exámenes asignados</li>
{/foreach}

</ul>