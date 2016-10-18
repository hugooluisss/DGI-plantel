$(document).ready(function(){
	$("#frmAdd").submit(function(){
		$.post("?mod=cconfiguracion&action=save", $("#frmAdd").serialize(), function(resp){
			if(resp.band == true){
				alert("Datos guardados");
			}else
				alert(resp.mensaje);
		}, "json");
	});
});