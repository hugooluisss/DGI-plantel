$(document).ready(function(){
	$("[action=detalle]").click(function(){
		$("#winDetalle").modal();
		el = $(this);
		$.post("?mod=detalleUsuario", {
			"id": el.attr("usuario")
		}, function(resp){
			$("#winDetalle").find(".modal-body").html(resp);
			
			$("[action=getData]").click(function(){
				var el = $(this);
				alert("USUARIO: " + el.attr("user") + " \nCONTRASEÑA: " + el.attr("pass"));
				
				try{
					if (otros.correo != ''){
						if(confirm("¿Deseas enviarle los datos a su correo? ")){
							var obj = new TUsuario;
							obj.sendMail(el.attr("idUsuario"), "datosAcceso", {
								before: function(){
									btn.prop("disabled", true);
								}, after: function(resp){
									btn.prop("disabled", false);
									if (!resp.band)
										alert("No se pudo enviar el correo a ");
								}
							});
						}
					}
				}catch(e){
					console.log("No tiene correo");
				}
			});
		});
	});
	
	$("#tblSustentantes").DataTable({
		"responsive": true,
		"language": espaniol,
		"paging": false,
		"lengthChange": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});
	
	
	$('#winDetalle').on('show.bs.modal', function (e) {
		$("#winDetalle").find(".modal-body").html('<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i> Espera mientras obtenemos los datos');
	});
});