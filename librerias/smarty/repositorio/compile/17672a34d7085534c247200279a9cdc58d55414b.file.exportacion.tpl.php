<?php /* Smarty version Smarty-3.1.11, created on 2016-02-18 11:42:05
         compiled from "templates/plantillas/modulos/examenes/dashboard/exportacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107531817656c360fe2efe30-08410066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17672a34d7085534c247200279a9cdc58d55414b' => 
    array (
      0 => 'templates/plantillas/modulos/examenes/dashboard/exportacion.tpl',
      1 => 1455817323,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107531817656c360fe2efe30-08410066',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_56c360fe37caa3_86775697',
  'variables' => 
  array (
    'datos' => 0,
    'archivo' => 0,
    'configuracion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c360fe37caa3_86775697')) {function content_56c360fe37caa3_86775697($_smarty_tpl) {?><div class="alert alert-info">
  <strong>Información</strong> El correo se está enviando, espere un momento...
</div>

<p>Se exportaron <?php echo count($_smarty_tpl->tpl_vars['datos']->value['sustentantes']);?>
 respuestas del examen</p>
<br />
<p>
	<a href="<?php echo $_smarty_tpl->tpl_vars['archivo']->value;?>
" class="btn btn-success"><i class="fa fa-download"></i> Descargar</a>
	<?php if ($_smarty_tpl->tpl_vars['configuracion']->value->internet=="Si"){?>
		<button id="btnMail" archivo="<?php echo $_smarty_tpl->tpl_vars['archivo']->value;?>
" class="btn btn-success"><i class="fa fa-envelope"></i> Enviar por correo</button>
	<?php }?>
</p><?php }} ?>