<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Resultados</h1>
	</div>
</div>


<div class="box">
	<div class="box-body">
		<table id="tblResultados" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Sección</th>
					<th>Nombre</th>
					<th>Sustentante</th>
					<th>Inicio</th>
					<th>Fin</th>
					<th>Puntaje</th>
					<th>Cal</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row->seccion->getNombre()}</td>
						<td>{$row->getId()}</td>
						<td>{$row->usuario->getNombre()}</td>
						<td>{$row->getInicio()}</td>
						<td>{$row->getFin()}</td>
						<td class="text-right">{$row->getPuntosAcumulados()} / {$row->seccion->getPuntos()}</td>
						<td class="text-right">{$row->getPuntosAcumulados()*10/$row->seccion->getPuntos()}</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>