<table id="tblTrabajadores" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Plantel</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td class="text-right">{$row.num_personal}</td>
				<td><b>{$row.nombres}</b> {$row.apellido_p} {$row.apellido_m}</td>
				<td>{$row.id_plantel} - {$row.nombre_pl}</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-success" action="add" title="Agregar / Actualizar" json='{$row.json}'><i class="fa fa-plus"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>