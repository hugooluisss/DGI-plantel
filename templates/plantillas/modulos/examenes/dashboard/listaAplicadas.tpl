<table id="tblSecciones" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Sección</th>
			<th>Nombre</th>
			<th>Inicio</th>
			<th>Fin</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.seccion}</td>
				<td>{$row.nombre}</td>
				<td>{$row.inicio}</td>
				<td>{$row.fin }</td>
				<td class="text-right">
					<button type="button" class="btn btn-danger" action="eliminar" title="Limpiar aplicación" aplicacion={$row.idAplicacion}><i class="fa fa-times"></i></button>
					<button type="button" class="btn btn-info" action="exportar" title="Exportar" aplicacion={$row.idAplicacion}><i class="fa fa-file"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>