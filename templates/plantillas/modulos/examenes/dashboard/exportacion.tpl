<div class="alert alert-info">
  <strong>Información</strong> El correo se está enviando, espere un momento...
</div>

<p>Se exportaron {$datos.sustentantes|@count} respuestas del examen</p>
<br />
<p>
	<a href="{$archivo}" class="btn btn-success"><i class="fa fa-download"></i> Descargar</a>
	{if $configuracion->internet eq "Si"}
		<button id="btnMail" archivo="{$archivo}" class="btn btn-success"><i class="fa fa-envelope"></i> Enviar por correo</button>
	{/if}
</p>