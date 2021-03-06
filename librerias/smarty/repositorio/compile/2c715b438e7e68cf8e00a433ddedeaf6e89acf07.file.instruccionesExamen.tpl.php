<?php /* Smarty version Smarty-3.1.11, created on 2017-12-05 10:34:36
         compiled from "templates/plantillas/modulos/aplicacion/instruccionesExamen.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1839854612597f46dfb02864-83397871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c715b438e7e68cf8e00a433ddedeaf6e89acf07' => 
    array (
      0 => 'templates/plantillas/modulos/aplicacion/instruccionesExamen.tpl',
      1 => 1512491675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1839854612597f46dfb02864-83397871',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_597f46dfcafa29_24155891',
  'variables' => 
  array (
    'examen' => 0,
    'finalizados' => 0,
    'secciones' => 0,
    'row' => 0,
    'puntos' => 0,
    'acumulados' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_597f46dfcafa29_24155891')) {function content_597f46dfcafa29_24155891($_smarty_tpl) {?><div class="page-header">
  <h1><?php echo $_smarty_tpl->tpl_vars['examen']->value->getNombre();?>
</h1>
  <small>Datos generales del examen</small>
</div>
<div class="row">
	<div class="callout callout-success">
	  	<p>Instrucciones:</p>
	  	<p><?php echo nl2br($_smarty_tpl->tpl_vars['examen']->value->getDescripcion());?>
</p>
  	</div>
</div>

<div class="row">
	<div class="well">
		<h3>Detalles del exámen</h3>
		<ul class="list-group">
			<li class="list-group-item">
				<div class="row">
					<div class="col-md-2"><b>Periodo</b></div>
					<div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['examen']->value->getPeriodo();?>
</div>
				</div>
			</li>
			<li class="list-group-item">
				<div class="row">
					<div class="col-md-2"><b>Duración</b></div>
					<div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['examen']->value->getDuracion();?>
 horas</div>
				</div>
			</li>
		</ul>
		<br />
		<?php if ($_smarty_tpl->tpl_vars['finalizados']->value==false){?>
			<h3>Secciones</h3>
			<div class="callout callout-default">
			  	<p>Selecciona la sección a la que deseas ingresar</p>
		  	</div>
		  	
			<table id="tblSecciones" class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Duración</th>
						<th>Tiempo restante</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['secciones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['row']->value['tiempoTexto'];?>
</td>
							<?php if ($_smarty_tpl->tpl_vars['row']->value['fin']==''){?>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['tiempoRestanteTexto'];?>
</td>
							<?php }else{ ?>
								<td>Finalizada</td>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['row']->value['fin']==''){?>
								<td class="text-center">
									<?php if ($_smarty_tpl->tpl_vars['row']->value['tiempoRestante']>0||$_smarty_tpl->tpl_vars['row']->value['tiempoRestante']==''){?><a href="?mod=panelExamen&seccion=<?php echo $_smarty_tpl->tpl_vars['row']->value['idSeccion'];?>
" class="btn btn-primary">Iniciar ahora</a><?php }?>
								</td>
							<?php }else{ ?>
								<td>&nbsp;</td>
							<?php }?>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php }else{ ?>
			<h3>¡¡¡ Felicidades !!!</h3>
			<p>Haz terminado el proceso de evaluación "EVA 2016", tus resultados los podrás consultar en fechas posteriores. Te pedimos estar atento a los comunicados que se emitirán en la página institucional del IEBO.</p>
			<p>¡Por tu activa participación, Muchas Gracias!</p>
			
			<table id="tblSecciones" class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th style="text-align: center">Total de puntos</th>
						<th style="text-align: center">Puntos acumulados</th>
						<th style="text-align: center">Calificación</th>
					</tr>
				</thead>
				<tbody>
					<?php $_smarty_tpl->tpl_vars["puntos"] = new Smarty_variable("0", null, 0);?>
					<?php $_smarty_tpl->tpl_vars["acumulados"] = new Smarty_variable("0", null, 0);?>
					<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['secciones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
							<td style="text-align: right"><?php echo $_smarty_tpl->tpl_vars['row']->value['puntos'];?>
</td>
							<td style="text-align: right"><?php echo $_smarty_tpl->tpl_vars['row']->value['acumulados'];?>
</td>
							<td style="text-align: right"><?php echo sprintf("%.1f",($_smarty_tpl->tpl_vars['row']->value['acumulados']/$_smarty_tpl->tpl_vars['row']->value['puntos']*10));?>
</td>
						</tr>
						
						<?php $_smarty_tpl->tpl_vars["puntos"] = new Smarty_variable($_smarty_tpl->tpl_vars['puntos']->value+$_smarty_tpl->tpl_vars['row']->value['puntos'], null, 0);?>
						<?php $_smarty_tpl->tpl_vars["acumulados"] = new Smarty_variable($_smarty_tpl->tpl_vars['acumulados']->value+$_smarty_tpl->tpl_vars['row']->value['acumulados'], null, 0);?>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>Calificación</th>
						<th class="text-right"><?php echo $_smarty_tpl->tpl_vars['puntos']->value;?>
</th>
						<th class="text-right"><?php echo $_smarty_tpl->tpl_vars['acumulados']->value;?>
</th>
						<th class="text-right"><?php echo sprintf("%.1f",($_smarty_tpl->tpl_vars['acumulados']->value/$_smarty_tpl->tpl_vars['puntos']->value*10));?>
</th>
					</tr>
				</tfoot>
			</table>
			
		<?php }?>
	</div>
</div><?php }} ?>