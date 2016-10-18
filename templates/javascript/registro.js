$(document).ready(function(){
	$("#frmRegistro").validate({
		debug: true,
		rules: {
			txtNombre: "required",
			txtUsuario: "required",
			txtPass: "required"
		},
		wrapper: 'span', 
		messages: {
			txtNombre: "El nombre es necesario",
			txtUsuario: "La CURP es necesaria",
			txtPass: "Tu contraseña o NIP es necesario"
		},
		submitHandler: function(form){
			var obj = new TUsuario;
			obj.add('', $("#txtNombre").val(), 1, $("#txtUsuario").val(), $("#txtPass").val(), {
				before: function(){
					$("#frmRegistro").prop("disabled", true);
				},
				after: function(resp){
					$("#frmRegistro").prop("disabled", false);
					
					if (resp.band)
						obj.login($("#txtUsuario").val(), $("#txtPass").val(), {
							after: function(datos){
								if (datos.band)
									location.href = "?mod=panel";
								else{
									alert("El sistema trató de registrar tus datos y no se pudo iniciar sesión en el sistema");
								}
							}
						});
					else
						alert("Ocurrió un error en el registro");
				}
			});
        }

    });
});