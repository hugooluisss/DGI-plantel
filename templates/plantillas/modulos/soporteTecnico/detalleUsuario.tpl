<center><img src="http://www.iebo.edu.mx/interno/sip-web/fotos/{$usuario->getFoto()}" style="width: 150px;" onerror="javascript: this.src='{$PAGE.ruta}img/logo.jpg'" alt="User Image" class="img-thumbnail"/></center>
<br />
<form class="form-horizontal">
	<div class="form-group">
		<label class="control-label col-sm-2">Nombre:</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" disabled readonly value="{$usuario->getNombre()}">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Usuario:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" disabled readonly value="{$usuario->getUser()}">
		</div>
		<label class="control-label col-sm-2">Contraseña:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" disabled readonly value="{$usuario->getPass()}">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Archivo foto:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" disabled readonly value="{$usuario->getFoto()}">
		</div>
		<label class="control-label col-sm-2">No Plantel:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" disabled readonly value="{$usuario->getDecodeOtro()->plantel}">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Sexo:</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" disabled readonly value="{$usuario->getDecodeOtro()->sexo}">
		</div>
		<div class="col-sm-2">
			<a href="#" accion="getData2" class="btn btn-danger" user="{$usuario->getUser()}" pass="{$usuario->getPass()}" correo="{$usuario->getDecodeOtro()->correo}">Enviar Datos</a>
		</div>
	</div>
</form>

<div class="box">
	<div class="box-body">
		<table id="tblAplicaciones" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Examen</th>
					<th>Sección</th>
					<th>Inicio</th>
					<th>Fin</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$aplicaciones item="row"}
					<tr>
						<td style="background:{if $row.fin eq ''}red{else}green{/if}">{$row.idAplicacion}</td>
						<td>{$row.examen}</td>
						<td>{$row.seccion}</td>
						<td>{if $row.inicio eq ''}<b>Sin iniciar</b>{else}{$row.seccion}{/if}</td>
						<td>{if $row.fin eq ''}<b>Sin finalizar</b>{else}{$row.fin}{/if}</td>
						<td style="text-align: right">
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>