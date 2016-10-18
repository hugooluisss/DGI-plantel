TUsuario = function(){
	var self = this;
	
	this.add = function(id, nombre, tipo, usuario, pass, fn){
		$.post('?mod=cusuarios&action=add', {
				"id": id,
				"nombre": nombre,
				"tipo": tipo,
				"usuario": usuario,
				"pass": pass
			}, function(data){
				if (data.band == 'false')
					console.log("Upps. Ocurrió un error al agregar al usuario " + data.mensaje);
					
				if (fn.after != undefined)
					fn.after(data);
			}, "json");
	};
	
	this.setPass = function(usuario, pass, fn){
		$.post('?mod=cusuarios&action=setPass', {
			"usuario": usuario,
			"pass": pass
		}, function(data){
			if (data.band == 'false'){
				fn.error(data);
			}else{
				fn.ok(data);
			}
		}, "json");
	};
	
	this.setPerfil = function(usuario, perfil, fn){
		if (fn.before != undefined)
			fn.before();
			
		$.post('?mod=cusuarios&action=setPerfil', {
			"usuario": usuario,
			"tipo": perfil
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == 'false')
				alert("Ocurrió un error al modificar el perfil del usuario");
				
		}, "json");
	};
	
	this.del = function(usuario, fn){
		$.post('?mod=cusuarios&action=del', {
			"usuario": usuario,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar al usuario");
			}
		}, "json");
	};
	
	this.login = function(usuario, pass, fn){
		$.post('?mod=clogin&action=login', {
			"usuario": usuario,
			"pass": pass
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == 'false'){
				console.log("Los datos del usuario no son válidos");
			}
		}, "json");
	}
	
	this.importar = function(fn){
		if (fn.before !== undefined) fn.before();
		
		$.get('?mod=cusuarios&action=importar', function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == 'false'){
				alert("Ocurrió un error importar el examen");
			}
		}, "json");
	}
	
	this.importarTrabajador = function(num_personal, nombre, usuario, pass, sexo, plantel, correo, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=csip&action=importar', {
			"num_personal": num_personal,
			"nombre": nombre,
			"usuario": usuario,
			"pass": pass,
			"sexo": sexo,
			"plantel": plantel,
			"correo": correo
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == 'false'){
				alert("Ocurrió un error al importar al trabajador");
			}
		}, "json");
	}
	
	this.sendMail = function(id, accion, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=cmail&action=' + accion, {
			"id": id
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == 'false'){
				alert("Ocurrió un error al enviar el correo");
			}
		}, "json");
	}
};