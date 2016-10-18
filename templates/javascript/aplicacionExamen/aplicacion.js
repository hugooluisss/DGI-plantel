$(document).ready(function(){
	var bandTiempo = true;
	aplicacion = new TAplicacion;
	
	$("#lnkOpenReactivos").click(function(){
		$("#winReactivos").modal();
	});
	
	$(".alert").hide();
	$("#FinSeccion").show();
	
	$("#btnSiguiente").click(function(){
		aplicacion.siguiente();
		
		aplicacion.getPregunta({
			after: function(resp){
				$(".pregunta").html(resp);
				
				
					
				setGuardarRespuesta();
			}
		});
	});
	
	$("#btnAnterior").click(function(){
		aplicacion.anterior();
		
		aplicacion.getPregunta({
			after: function(resp){
				$(".pregunta").html(resp);
					
				setGuardarRespuesta();
			}
		});
	});
		
	function traerDatos(){
		aplicacion.getData($("#seccion").val(), {
			after: function(data){
				if (data.resta <= 0){
					alert("El tiempo para contestar esta sección a finalizado, te mostraremos las secciones faltantes");
					aplicacion.finalizar({
						after: function(){
							window.location = "?mod=instruccionesExamen&id=" + data.examen;
						}
					});
				}else{
					aplicacion.setTiempo(data.resta);
					aplicacion.setReactivos(data.reactivos);
					aplicacion.setExamen(data.examen);
					
					if (bandTiempo){
						setInterval(function(){
							aplicacion.calcularTiempo({
								after: function(horas, minutos, segundos){
									if (horas <= 0 && minutos <= 0 && segundos <= 0){
										alert("El tiempo para contestar esta sección a finalizado, te mostraremos las secciones faltantes");
										aplicacion.finalizar({
											after: function(){
												window.location = "?mod=instruccionesExamen&id=" + data.examen;
											}
										});
									}else
										$("#tiempo").html("Tiempo restante: " + horas + ":" + minutos + ":" + segundos);
								}
							});
						}, 1000);
						bandTiempo = false;
					}				
					
					if(aplicacion.getNumPreguntaSinContestar() == 0)
						alert("Todos los reactivos tienen ya una respuesta");
						
					aplicacion.getPregunta({
						after: function(resp){
							$(".pregunta").html(resp);
							setGuardarRespuesta();
						}
					});
					
					/*A poner los reactivos*/
					$("#menuPreguntas").empty();
					cont = 1;
					$.each(aplicacion.preguntas, function(i, reactivo){
						var a = $("<button />", {
							href: "#",
							class: "getReactivo btn col-md-2 " + (reactivo.estado == 1?"btn-primary":"btn-default"),
							html: "Reactivo " + cont,
							indice: i
						});
						
						a.click(function(){
							aplicacion.setIndice($(this).attr('indice'));
							aplicacion.getPregunta({
								after: function(resp){
									$(".pregunta").html(resp);
									$("#winReactivos").modal("hide");
									setGuardarRespuesta();
								}
							});
						});
						
						cont++;
						//$("#menuPreguntas").append($("<li />").append(a));
						$("#winReactivos .modal-body .dos").append(a);
					});
					
					$("#btnTerminarSeccion").click(function(){
						if (confirm("¿Estás seguro? Al terminar ninguna respuesta puede ser cambiada, de ser así, da clic en el botón 'Aceptar'")){
							aplicacion.finalizar({
								after: function(){
									window.location = "?mod=instruccionesExamen&id=" + aplicacion.examen;
								}
							});
						}
					});
				}
			}
		});
	}
	
	function setGuardarRespuesta(){
		$("#dvContestados").html((aplicacion.preguntas.length - aplicacion.getNumPreguntaSinContestar()) + " reactivos contestados");	
		$("#dvNumeracion").html("Reactivo <b>" + (parseInt(aplicacion.indice)+1) + "</b> de "+ aplicacion.preguntas.length);	
						
		$("#btnGuardar").click(function(){
			if ($(".list-group input[type=radio]:checked").val() == '' || $(".list-group input[type=radio]:checked").length < 1)
				alert("Indica tu respuesta");
			else{
				aplicacion.guardarRespuesta($(".list-group input[type=radio]:checked").attr("value"), $("#mostrado").val(), {
					after: function(resp){
						if (resp.band == true){
							$(".getReactivo[indice=" + aplicacion.indice + "]").addClass("btn-primary");
							
							$(".alert").html("Respuesta guardada... cargando siguiente pregunta");
							$(".alert").show();
							
							setTimeout(function(){
								$(".alert").html("");
								$(".alert").hide();
							}, 5000);
							
							if(aplicacion.nextIndice())
								aplicacion.getPregunta({
									after: function(resp){
										$(".pregunta").html(resp);
											
										setGuardarRespuesta();
									}
								});
							else{
								alert("¡¡ Felicidades !! \nHaz concluido la sección, si deseas puedes corroborar tus respuestas y para salir da clic en el botón 'Terminar Seccion'.");
							}
						}else
							alert("Ocurrió un error, reportalo con el administrador del sistema");
					}
				});
			}
		});
		
		$("#btnSaltarSinContestar").click(function(){
			var indice = aplicacion.indice;
			aplicacion.nextIndice();
			
			if (indice == aplicacion.indice)
				alert("Este es el último reactivo sin contestar");
			else{
				aplicacion.getPregunta({
					after: function(resp){
						$(".pregunta").html(resp);
							
						setGuardarRespuesta();
					}
				});
			}
		});
	}
	
	traerDatos();
});