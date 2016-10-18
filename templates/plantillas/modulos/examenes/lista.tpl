<div class="box">
	<div class="box-body">
		<table id="tblExamenes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Periodo</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idExamen}</td>
						<td>{$row.nombre}</td>
						<td>{$row.periodo}</td>
						<td style="text-align: right">
							{if $row.estado eq 'C'}
								<!--<button type="button" class="btn btn-success" action="email" title="Enviar invitación a sustentantes" examen="{$row.idExamen}"><i class="fa fa-envelope-o"></i></button>-->
								<button type="button" class="btn btn-info" action="sustentantes" title="Sustentantes" examen="{$row.idExamen}"><i class="fa fa-users"></i></button>
								<button type="button" class="btn btn-danger" action="estado" title="Publicar" estado="P" examen="{$row.idExamen}"><i class="fa fa-external-link"></i></button>
								<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" examen="{$row.idExamen}"><i class="fa fa-times"></i></button>
							{/if}
							{if $row.estado eq 'P'}
								<!--<button type="button" class="btn btn-success" action="email" title="Enviar invitación a sustentantes" examen="{$row.idExamen}"><i class="fa fa-envelope-o"></i></button>-->
								<button type="button" class="btn btn-default" action="dashboard" title="Panel de control" examen="{$row.idExamen}"><i class="fa fa-tachometer"></i></button>
								<button type="button" class="btn btn-info" action="sustentantes" title="Sustentantes" examen="{$row.idExamen}"><i class="fa fa-users"></i></button>
								<button type="button" class="btn btn-danger" action="estado" title="Finalizar aplicación" estado="T" examen="{$row.idExamen}"><i class="fa fa-hand-paper-o"></i></button>
							{/if}
							{if $row.estado eq 'T'}
								<button type="button" class="btn btn-default" action="dashboard" title="Panel de control" examen="{$row.idExamen}"><i class="fa fa-tachometer"></i></button>
								<button type="button" class="btn btn-default" action="resultados" title="Resultados" examen="{$row.idExamen}"><i class="fa fa-file-excel-o"></i></button>
							{/if}
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>