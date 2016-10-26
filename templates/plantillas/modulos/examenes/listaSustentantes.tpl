<div class="row">
	<div class="col-md-12">
		{foreach from=$tipos item="row"}
			<button class="btn btn-success add" tipo="{$row.id}" total="{$row.total}">Agregar {$row.id} <span class="badge">{$row.total}</span></button> 
		{/foreach}
	</div>
</div>

<table id="tblSustentantes" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Usuario</th>
			<th>Nombre</th>
			<th>Pass</th>
			<th>Incluir</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.idUsuario}</td>
				<td>{$row.user}</td>
				<td>{$row.nombre}</td>
				<td>{$row.pass}</td>
				<td style="text-align: center">
					<input type="checkbox" autocomplete="off" usuario="{$row.idUsuario}" {if $row.agregado eq true}checked{/if} examen="{$examen}"/>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>