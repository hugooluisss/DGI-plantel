$(document).ready(function(){
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
	});
	
	getLista();
	$("#txtTrabajador").autocomplete({
		source: "index.php?mod=cusuarios&action=autocomplete",
		minLength: 2,
		select: function(e, el){
			var obj = new TUsuario;
			var band = true;
			
			if (!el.item.nip)
				band = confirm("Este trabajador no tiene NIP asignado, no tendrá acceso al sistema, ¿aún así deseas agregarlo?");
			
			if (band)
				obj.add(el.item.identificador, {
					after: function(data){
						if(!data.band)
							alert("Upps No se agregó el usuario");
							
						$("#txtTrabajador").val("");
					}
				});
		}
	});
	
	$("#frmAdd").validate({
		debug: false,
		rules: {
			txtUser: "required",
			txtPass: "required"
		},
		errorElement : 'span',
		errorLabelContainer: '.errorTxt',
		submitHandler: function(form){
			var obj = new TUsuario;
			obj.add(
				$("#id").val(), 
				$("#txtNombre").val(), 
				$("#selTipo").val(),
				$("#txtUser").val(),
				$("#txtPass").val(),
				{
					before: function(){
						$("#frmAdd").prop("disabled", true);
					},
					after: function(datos){
						$("#frmAdd").prop("disabled", false);
						
						if (datos.band){
							alert("Listo...");
							$("#frmAdd #id").val(datos.id);
							getLista();
						}else{
							alert("Upps... " + datos.mensaje);
						}
					}
				}
			);
        }

    });
	
	function getLista(){
		$.get("?mod=listaUsuarios", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TUsuario;
					obj.del($(this).attr("usuario"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				el = JSON.parse($(this).attr("datos"));
				$('#panelTabs a[href="#add"]').tab('show');
		
				$('#id').val(el.idUsuario);
				$('#txtNombre').val(el.nombre);
				$('#txtUser').val(el.user);
				$('#txtPass').val(el.pass);
				$('#selTipo').val(el.idTipo);
			});
			
			$("[action=getData]").click(function(){
				var btn = $(this);
				var el = JSON.parse($(this).attr("datos"));
				alert("USUARIO: " + el.user + " \nCONTRASEÑA: " + el.pass);
				
				try{
					var otros = JSON.parse(el.otro);
					if (otros.correo != ''){
						if(confirm("¿Deseas enviarle los datos a su correo? " + otros.correo)){
							var obj = new TUsuario;
							obj.sendMail(el.idUsuario, "datosAcceso", {
								before: function(){
									btn.prop("disabled", true);
								}, after: function(resp){
									btn.prop("disabled", false);
									if (!resp.band)
										alert("No se pudo enviar el correo a " + otros.correo);
								}
							});
						}
					}
				}catch(e){
					console.log("No tiene correo");
				}
			});
			
			$(".tipo").change(function(){
				if (confirm("¿Seguro de hacer el cambio de perfil de usuario?")){
					var obj = new TUsuario;
					var el = $(this);
					obj.setPerfil(el.attr("user"), el.val(), {
						before: function(){
							el.disabled = true;
						},
						after: function(data){
							el.enabled = false;
							if (data.band){
								getLista();
								alert("Perfil de usuario modificado");
							}
						}
					});
				}
			});
			
			$("#tblUsuarios").DataTable({
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
	
	$("#btnImportar").click(function(){
	    $("#winImportarEstudiantes").modal();
	});
	
	$('#winImportarEstudiantes #upload').fileupload({
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
		        		var obj = new TUsuario;
		        		obj.importar({
			        		before: function(){
				        		btn.prop("disabled", true);
			        		},
			        		after: function(){
				        		getLista();
				        		
				        		$("#winImportarEstudiantes").modal("hide");
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
	
	$("#btnImportarSIP").click(function(){
	    $("#winImportarSIP").modal();
	    if ($("#winImportarSIP").find(".modal-body").html() == ''){
		    $("#winImportarSIP").find(".modal-body").html('<center><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i> Estamos actualizando la lista de trabajadores</center>');
		    
		    $.get('?mod=listaTrabajadoresSip', function(data){
		    	$("#winImportarSIP").find(".modal-body").html(data);
		    	
		    	$("#tblTrabajadores").find("[action=add]").click(function(){
		    		var el = $(this);
		    		var usuario = new TUsuario;
		    		trabajador = jQuery.parseJSON(el.attr("json"));
		    		
		    		usuario.importarTrabajador(trabajador.num_personal, trabajador.nombres + " " + trabajador.apellido_p + " " + trabajador.apellido_m, trabajador.curp, trabajador.nip, trabajador.sexo, trabajador.id_plantel, trabajador.correo_pers, {
		    			before: function(){
			    			el.prop("disabled", true);
		    			},
		    			after: function(resp){
			    			el.prop("disabled", false);
			    			
			    			if(!resp.band)
			    				alert("Ocurrió un error al agregar al trabajador");
			    			else{
				    			trabajador = jQuery.parseJSON(el.attr("json"));
				    			getLista();
				    			alert(trabajador.nombres + " ha sido agregado como usuario");
			    			}
		    			}
		    		});
		    	});
		    	
		    	$("#tblTrabajadores").DataTable({
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
});