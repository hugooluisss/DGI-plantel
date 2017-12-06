<?php /* Smarty version Smarty-3.1.11, created on 2017-07-31 10:04:07
         compiled from "templates/plantillas/modulos/aplicacion/reactivo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:402531969597f46e7ace608-11585569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e0ebab0e3cb1341944f598708c4b6bc6a4248a4' => 
    array (
      0 => 'templates/plantillas/modulos/aplicacion/reactivo.tpl',
      1 => 1477419938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '402531969597f46e7ace608-11585569',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'reactivo' => 0,
    'row' => 0,
    'respuesta' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_597f46e7cff008_64597689',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_597f46e7cff008_64597689')) {function content_597f46e7cff008_64597689($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/proyectoDGI/plantel/librerias/smarty/plugins/modifier.date_format.php';
?><div class="panel panel-default">
	<div class="panel-heading">
		<h3>Reactivo</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12">
				<?php echo $_smarty_tpl->tpl_vars['reactivo']->value->getInstrucciones();?>

			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<ul class="list-group">
					<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reactivo']->value->getOpciones(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<div class="checkbox list-group-item">
							<label>
								<input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
" <?php if ($_smarty_tpl->tpl_vars['respuesta']->value==$_smarty_tpl->tpl_vars['row']->value->getId()){?>checked<?php }?> name="respuestaReactivo"><?php echo $_smarty_tpl->tpl_vars['row']->value->getTexto();?>

							</label>
						</div>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 text-right">
				<span class="text-danger" id="msgGuardando"><i class="fa fa-circle-o-notch fa-spin fa-fw"></i> Estamos guardado tu respuesta, espera...</span>
				<button id="btnGuardar" class="btn btn-success">Guardar</button>
				<button id="btnSaltarSinContestar" class="btn btn-danger">Siguiente sin contestar</button>
			</div>
		</div>
		<!--
		<br />
		<div class="row">
			<div class="col-xs-12 text-left">
				<button id="btnAnterior" class="btn btn-default">Anterior</button>
				<button id="btnSiguiente" class="btn btn-default">Siguiente</button>
			</div>
		</div>
		-->
	</div>
</div>

<input type="hidden" id="mostrado" name="mostrado" value="<?php echo smarty_modifier_date_format(time(),"%G-%m-%d %I:%M:%S");?>
"/><?php }} ?>