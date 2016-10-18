<div class="page-header">
  <h1>{$examen->getNombre()}</h1>
  <small>Datos generales del examen</small>
</div>
<div class="row">
	<div class="callout callout-success">
	  	<p>Instrucciones:</p>
	  	<p>{$examen->getDescripcion()|nl2br}</p>
  	</div>
</div>

<div class="row">
	<div class="well">
		<h3>Detalles del exámen</h3>
		<ul class="list-group">
			<li class="list-group-item">
				<div class="row">
					<div class="col-md-2"><b>Periodo</b></div>
					<div class="col-md-8">{$examen->getPeriodo()}</div>
				</div>
			</li>
			<li class="list-group-item">
				<div class="row">
					<div class="col-md-2"><b>Duración</b></div>
					<div class="col-md-8">{$examen->getDuracion()} horas</div>
				</div>
			</li>
		</ul>
		<br />
		{if $finalizados eq false}
			<h3>Secciones</h3>
			<div class="callout callout-default">
			  	<p>Selecciona la sección a la que deseas ingresar</p>
		  	</div>
		  	
			<table id="tblSecciones" class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Duración</th>
						<th>Tiempo restante</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$secciones item="row"}
						<tr>
							<td>{$row.nombre}</td>
							<td>{$row.tiempoTexto}</td>
							{if $row.fin eq ''}
								<td>{$row.tiempoRestanteTexto}</td>
							{else}
								<td>Finalizada</td>
							{/if}
							{if $row.fin eq ''}
								<td class="text-center">
									{if $row.tiempoRestante > 0 or $row.tiempoRestante eq ''}<a href="?mod=panelExamen&seccion={$row.idSeccion}" class="btn btn-primary">Iniciar ahora</a>{/if}
								</td>
							{else}
								<td>&nbsp;</td>
							{/if}
						</tr>
					{/foreach}
				</tbody>
			</table>
		{else}
			<h3>¡¡¡ Felicidades !!!</h3>
			<p>Haz terminado el proceso de evaluación "EVA 2016", tus resultados los podrás consultar en fechas posteriores. Te pedimos estar atento a los comunicados que se emitirán en la página institucional del IEBO.</p>
			<p>¡Por tu activa participación, Muchas Gracias!</p>
			
			<table id="tblSecciones" class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th style="text-align: center">Total de puntos</th>
						<th style="text-align: center">Puntos acumulados</th>
<!--						<th style="text-align: center">Calificación</th>-->
					</tr>
				</thead>
				<tbody>
					{foreach from=$secciones item="row"}
						<tr>
							<td>{$row.nombre}</td>
							<td style="text-align: right">{$row.puntos}</td>
							<td style="text-align: right">{$row.acumulados}</td>
							<!--<td style="text-align: right">{($row.acumulados/$row.puntos * 10)|string_format:"%.1f"}</td>-->
						</tr>
					{/foreach}
				</tbody>
			</table>
		{/if}
	</div>
</div>