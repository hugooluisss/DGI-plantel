<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Soporte técnico</h1>
	</div>
</div>

<div class="box">
	<div class="box-body">
		<table id="tblSustentantes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Usuario</th>
					<th>Contraseña</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idUsuario}</td>
						<td>{$row.nombre}</td>
						<td>{$row.user}</td>
						<td>{$row.pass}</td>
						<td class="text-right">
							<button type="button" class="btn btn-success" action="detalle" title="Detalle" usuario="{$row.idUsuario}"><i class="fa fa-tasks"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="winDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
			</div>
		</div>
	</div>
</div>