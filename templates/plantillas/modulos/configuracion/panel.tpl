<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Panel de configuración del sistema</h1>
	</div>
</div>

<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">
			<div class="form-group">
				<label for="selPlantel" class="col-lg-2">Plantel</label>
				<div class="col-lg-6">
					<select class="form-control" id="selPlantel" name="selPlantel">
						<option value="">
						{foreach key=key item=item from=$planteles}
						<option value="{$item->clave}" {if $item->clave eq $configuracion->plantel}selected{/if}>{$item->clave} - {$item->nombre}
						{/foreach}
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="selInternet" class="col-lg-2">Internet</label>
				<div class="col-lg-1">
					<select class="form-control" id="selInternet" name="selInternet">
						<option value="No" {if $configuracion->internet eq 'No'}selected{/if}>No
						<option value="Si" {if $configuracion->internet eq 'Si'}selected{/if}>Si
					</select>
				</div>
			</div>
			<h3>Correo electrónico</h3>
			<div class="form-group">
				<label for="txtUsuarioMail" class="col-lg-2">Usuario</label>
				<div class="col-lg-6">
					<input class="form-control" id="txtUsuarioMail" name="txtUsuarioMail" value="{$configuracion->correo->usuario}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtContraseñaMail" class="col-lg-2">Contraseña</label>
				<div class="col-lg-6">
					<input class="form-control" type="password" id="txtContrasenaMail" name="txtContrasenaMail" value="{$configuracion->correo->contrasena}"/>
				</div>
			</div>
		</div>
		<div class="box-footer text-right">
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</div>
</form>