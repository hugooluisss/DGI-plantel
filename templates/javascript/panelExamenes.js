$(document).ready(function(){
	getLista();
    
	$("#btnImportar").click(function(){
	    $("#winImportarExamen").modal();
	});
	
	$('#winImportarExamen #upload').fileupload({
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
		        		var obj = new TExamen;
		        		obj.importar({
			        		before: function(){
				        		btn.prop("disabled", true);
			        		},
			        		after: function(){
				        		getLista();
				        		
				        		$("#winImportarExamen").modal("hide");
				        		$('#upload .elementos').html("");
			        		}
		        		});
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
	
	function getLista(){
		$.get("?mod=listaExamenes", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=estado]").click(function(){
				if ("¿Seguro?")
					var obj = new TExamen;
					var el = $(this)
					obj.setEstado(el.attr("examen"), el.attr("estado"), {
						before: function(){
							el.disabled = true;
						},
						after: function(data){
							el.disabled = false;
							if (data.band)
								getLista();
							else
								alert("Upps... ocurrió un error y no se pudo actualizar el estado del examen");
						}
					});
			});
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TExamen;
					obj.del($(this).attr("examen"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=dashboard]").click(function(){
				window.location = "?mod=dashboard&id=" + $(this).attr("examen");
			});
			
			$("[action=resultados]").click(function(){
				window.location = "?mod=resultados&examen=" + $(this).attr("examen");
			});
			
			$("[action=sustentantes]").click(function(){
				$("#winSustentantes").modal();
			    var examen = $(this);
			    
				$.post("?mod=listaSustentantes", {
					"examen": examen.attr("examen")
				}, function( data ) {
					$("#winSustentantes .modal-body").html(data);
					
					$("#winSustentantes [type=checkbox]").change(function(){
						var el = $(this);
						var obj = new TExamen;
						if (el.is(":checked"))
							obj.addSustentante(el.attr("examen"), el.attr("usuario"), {
								before: function(){
									el.prop("disabled", true);
								},
								after: function(result){
									el.prop("disabled", false);
									if (!result.band)
										el.attr("checked", false);
								}
							});
						else
							obj.delSustentante(el.attr("examen"), el.attr("usuario"), {
								before: function(){
									el.prop("disabled", true);
								},
								after: function(result){
									el.prop("disabled", false);
									if (!result.band)
										el.attr("checked", true);
								}
							});
					});
					
					$("#tblSustentantes").DataTable({
						"responsive": true,
						"language": espaniol,
						"paging": true,
						"lengthChange": false,
						"ordering": true,
						"info": true,
						"autoWidth": false
					});
				});
				 
			});
			
						
			$("#tblExamenes").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	}
});