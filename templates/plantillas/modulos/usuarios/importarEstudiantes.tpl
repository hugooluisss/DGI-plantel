<div class="modal fade" id="winImportarEstudiantes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Importar estudiantes</h1>
			</div>
			<div class="modal-body">
				<p>La importación de estudiantes se hace a través de un archivo generado por el SIGEI, para mayor información consulte el manual de usuario del SIGEI</p>
				<form id="upload" method="post" action="?mod=cusuarios&action=upload" enctype="multipart/form-data">
					<input type="file" name="upl" multiple />
					<br />
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>