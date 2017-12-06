TAplicacion = function(tiempo){
	var self = this;
	this.tiempo = tiempo === undefined?5000:tiempo;
	this.preguntas = new Array;
	this.indice = 0;
	
	this.setExamen = function(id){
		this.examen = id;
	}
	
	this.setTiempo = function(tiempo){
		this.tiempo = tiempo;
	}
	
	this.setReactivos = function(preguntas){
		this.preguntas = preguntas;
		this.indice = -1;
		this.nextIndice();
		
		$.each(this.preguntas, function(indice, reactivo){
			self.preguntas[indice].estado = self.preguntas[indice].estado != 0;
		});
		
		if (this.indice < 0)
			this.indice = 0;
	}
	
	this.setIndice = function(val){
		if (val === undefined) this.indice = 0;
		else{
			if (val >= this.preguntas.length)
				this.indice = this.preguntas.length - 1;
			else
				this.indice = val;
		}
		
		console.log("Estableciendo indice en " + this.indice);
	}
	
	this.siguiente = function(){
		this.indice++;
		this.indice = this.indice >= this.preguntas.length?0:this.indice;
	}
	
	this.anterior = function(){
		this.indice--;
		this.indice = this.indice < 0?(this.preguntas.length-1):this.indice;
	}
	
	this.getData = function(seccion, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('?mod=cAplicacionExamen&action=getData', {
			"seccion": seccion
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
		}, "json");
	}
	
	this.calcularTiempo = function(fn){
		if (fn.berfore != undefined) fn.before();
		self.tiempo--;
		var tiempo2 = self.tiempo;
		
		var segundos = parseInt(tiempo2%60);
		tiempo2 -= segundos;
		var horas = parseInt(tiempo2 / 3600);
		tiempo2 -= parseInt(horas * 3600);
		var minutos = parseInt(tiempo2/60);
		if (horas < 10) horas = "0" + horas.toString();
		if (minutos < 10) minutos = "0" + minutos.toString();
		if (segundos < 10) segundos = "0" + segundos.toString();
		
		if (fn.after !== undefined) fn.after(horas, minutos, segundos);
	}
	
	this.guardarRespuesta = function(respuesta, mostrado, fn){
		if (fn.before !== undefined)
			fn.before();
		
		$.post('?mod=cAplicacionExamen&action=guardarRespuesta', {
			"respuesta": respuesta,
			"mostrado": mostrado
		}, function(data){
			self.preguntas[self.indice].estado = true;
			
			if (fn.after != undefined)
				fn.after(data);
			
		}, "json");
	}
	
	this.getPregunta = function(fn){
		if (fn.before !== undefined) fn.before();
		
		console.log("Obteniendo pregunta con indice " + self.indice + " con id " + self.preguntas[self.indice].idReactivo);
		
		$.get("?mod=getReactivo&id=" + self.preguntas[self.indice].idReactivo, function(resp){
			if (fn.after !== undefined) fn.after(resp);
		});
	}
	
	this.getNumPreguntaSinContestar = function(){
		var sinContestar = 0;
		$(this.preguntas).each(function(i, el){
			if (!el.estado)
				sinContestar++;
		});
		
		return sinContestar;
	}
	
	this.nextIndice = function(){
		if (this.getNumPreguntaSinContestar() > 0){
			var aux = self.indice++;
			
			if (self.indice >= self.preguntas.length)
				self.indice = 0;
				
			console.log("Indice " + self.indice + " sobre " + self.preguntas.length + " reactivos");
			while(this.preguntas[this.indice].estado && this.indice != aux ){
				self.indice++;
				
				if (self.indice >= self.preguntas.length)
					self.indice = 0;
					
				console.log("Indice " + self.indice + " sobre " + self.preguntas.length + " reactivos");
			}
			
			return true;
		}else
			return false;
	}
	
	this.finalizar = function(fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=cAplicacionExamen&action=finalizar', {}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			
		}, "json");
	}
	
	this.exportar = function(id, examen, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=cDashboard&action=exportarAplicacion', {
			"aplicacion": id,
			"examen": examen
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			
		}, "json");
	}
	
	this.borrar = function(id, examen, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=cDashboard&action=eliminar', {
			"aplicacion": id,
			"examen": examen
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			
		}, "json");
	}
};