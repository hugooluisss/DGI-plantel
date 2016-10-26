TExamen = function(){
	var self = this;

	this.importar = function(fn){
		if (fn.before !== undefined) fn.before();
		
		$.get('?mod=cexamenes&action=importar', function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == 'false'){
				alert("Ocurrió un error importar el examen");
			}
		}, "json");
	}
	
	this.del = function(id, fn){
		$.post('?mod=cexamenes&action=del', {
			"id": id,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el examen");
			}
		}, "json");
	};
	
	this.setEstado = function(id, estado, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('?mod=cexamenes&action=setEstado', {
			"id": id,
			"estado": estado
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al cambiar el estado del examen");
			}
		}, "json");
	}
	
	this.addSustentante = function(examen, user, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('?mod=cexamenes&action=addSustentante', {
			"usuario": user,
			"examen": examen
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (!data.band){
				alert("Ocurrió un error al agregar al sustentante");
			}
		}, "json");
	}
	
	this.delSustentante = function(examen, user, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('?mod=cexamenes&action=delSustentante', {
			"usuario": user,
			"examen": examen
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (!data.band){
				alert("Ocurrió un error al quitar al sustentante");
			}
		}, "json");
	}
	
	this.addSustentanteByTipo = function(examen, tipo, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('?mod=cexamenes&action=addSustentanteByTipo', {
			"tipo": tipo,
			"examen": examen
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (!data.band){
				alert("Ocurrió un error al agregar a los sustentantes");
			}
		}, "json");
	}
	
	this.exportarPorMail = function(examen, archivo, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('?mod=cDashboard&action=exportarPorMail', {
			"examen": examen,
			"archivo": archivo
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (!data.band){
				alert("No se pudo enviar el correo electronico, comprueba tu conexión a internet");
			}
		}, "json");
	}
};