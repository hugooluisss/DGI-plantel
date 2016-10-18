$(document).ready(function(){

	function getListaAplicaciones(){
		$.get("?mod=listaSeccionesIniciadas&examen=" + $("#examen").val(), function( data ) {
			$("#dvExamenes .panel-body").html(data);
			
			$("[action=exportar]").click(function(){
				var el = $(this);
				var aplicacion = new TAplicacion;
				aplicacion.exportar(el.attr("aplicacion"), $("#examen").val(), {
					after: function(resp){
						location.href = resp.archivo;
					}
				});
				
			});
		});
	}
	
	getListaAplicaciones();
	
	$("#exportarTodos").click(function(){
		if(confirm("El sistema exportará en un solo archivo a todos los estudiantes, ¿seguro?")){
			var aplicacion = new TAplicacion;
			aplicacion.exportar("", $("#examen").val(), {
				after: function(resp){
					location.href = resp.archivo;
				}
			});
		}
	});
	
	$("#btnImportar").click(function(){
	    $("#winImportarDatos").modal();
	});
	
	$('#winImportarDatos #upload').fileupload({
		// This function is called when a file is added to the queue
		add: function (e, data) {
			var fileType = data.files[0].name.split('.').pop(), allowdtypes = 'zip';
			
	        if (allowdtypes.indexOf(fileType) < 0) {
	            alert('El tipo es inválido, solo se permiten archivo zip');
	            return false;
	        }else{
	        	$('#upload .elementos').html("");
				var tpl = $('<li class="working list-group-item text-center">'+'<input type="text" value="0" data-width="48" data-height="48" data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" />'+'<p></p><span></span>' );
				            
				tpl.find('p').text(data.files[0].name);
				data.context = tpl.appendTo($('#upload .elementos'));
				tpl.find('input').knob();
				// Listen for clicks on the cancel icon
				tpl.find('span').click(function(){
					if(tpl.hasClass('working')){
						jqXHR.abort();
					}
					tpl.fadeOut(function(){
						tpl.remove();
					});
				});
				
				// Automatically upload the file once it is added to the queue
				var jqXHR = data.submit();
			}
		},
		progress: function(e, data){
		    // Calculate the completion percentage of the upload
		    var progress = parseInt(data.loaded / data.total * 100, 10);
		
		    // Update the hidden input field and trigger a change
		    // so that the jQuery knob plugin knows to update the dial
		    data.context.find('input').val(progress).change();
		
		    if(progress == 100){
		        data.context.removeClass('working');
		        var btn = $("<btn />", {
		        	"html": "Importar",
		        	"class": "btn btn-success"
		        });
		        
		        btn.click(function(){
		        	if(confirm("¿Seguro?")){
		        		$.get('?mod=cDashboard&action=importar', function(data){
		        			if (data.band == true){
								$("#winImportarDatos").modal("hide");
				        		$('#upload .elementos').html("");
				        		getListaAplicaciones();
				        		alert("Se importaron " + data.importados + " secciones de exámenes");
				        		if (data.noImportados.length > 0)
				        			alert("Algunos elementos no se importaron: " + data.noImportados.length);
							}else
								alert("Ocurrió un error importar los datos");
							
						}, "json");
		        	}
		        });
		        data.context.append(btn);
		    }
		},
		fail: function(){
			alert("Ocurrió un problema en el servidor, contacta al administrador del sistema");
			
			console.log("Error en el servidor al subir el archivo, checa permisos de la carpeta repositorio");
		},
	});
	
	
	$("#btnSubirInformacion").click(function(){
		$("#winExportacionModal .modal-body").html("Se está generando la exportación, espera un momento");
		
		$.get("?mod=exportacionOficinas&id=" + $("#examen").val(), function(data){
			$("#winExportacionModal .modal-body").html(data);
			$("#winExportacionModal .alert").hide();
			$("#winExportacionModal").modal();
			
			$("#winExportacionModal #btnMail").click(function(){
				var exa = new TExamen;
				exa.exportarPorMail($("#examen").val(), $("#winExportacionModal #btnMail").attr("archivo"), {
					before: function(){
						$("#winExportacionModal #btnMail").attr("disabled", true);
						$("#winExportacionModal .alert").show(100);
					},
					after: function(result){
						$("#winExportacionModal #btnMail").attr("disabled", false);
						
						if (result.band == true)
							alert("La información se envió con éxito");
						
						$("#winExportacionModal .alert").hide(100);
					}
				});
			});
		});
	});
});