<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>.:: EVA - IEBO ::.</title>
		{if $PAGE.debug}
		<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/less/AdminLTE.less" />
		<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/less/skins/_all-skins.less" />
		{else}
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/AdminLTE.css">
		<link rel="stylesheet" type="text/css" href="{$PAGE.ruta}dist/css/skins/_all-skins.css" />
		{/if}

		<link rel="stylesheet" href="{$PAGE.ruta}bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/ionicons.min.css">
		<link rel="shortcut icon" href="favicon.ico">
		
		<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/less/skins/_all-skins.less" />
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/iCheck/flat/blue.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/morris/morris.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/datepicker/datepicker3.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/daterangepicker/daterangepicker-bs3.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/upload/css/jquery.fileupload.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="{$PAGE.ruta}templates/dist/html5shiv.min.js"></script>
		<script src="{$PAGE.ruta}templates/dist/respond.min.js"></script>
	<![endif]-->
	</head>
	<body class="hold-transition skin-green layout-top-nav">
		<div class="wrapper">
			<header class="main-header">
				<nav class="navbar navbar-static-top">
					<div class="container">
						<div class="navbar-header">
							<a href="#" class="navbar-brand"><b>EV</b>A</a>
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
								<i class="fa fa-bars"></i>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
						<ul class="nav navbar-nav">
							{if $PAGE.modulo neq 'sustentante'}
								{if isset($seccion) eq true}
								<li class="dropdown">
									<a href="#winReactivos" id="lnkOpenReactivos">Reactivos de {$seccion->getNombre()}</a>
								</li>
								
								<!--<li><a href="?mod=instruccionesExamen&id={$seccion->getExamen()}">Seleccionar otra sección</a></li>-->
								{/if}
							{/if}
						</ul>
					</div><!-- /.navbar-collapse -->
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- User Account Menu -->
							<li class="dropdown user user-menu">
								<!-- Menu Toggle Button -->
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<!-- hidden-xs hides the username on small devices so only the image appears. -->
									<span class="hidden-xs">{$PAGE.usuario->getNombre()}</span>
								</a>
								<ul class="dropdown-menu">
									<!-- The user image in the menu -->
									<li class="user-header">
										<img src="http://www.iebo.edu.mx/interno/sip-web/fotos/{$PAGE.usuario->getFoto()}" onerror="javascript: this.src='{$PAGE.ruta}img/logo.jpg'" alt="User Image"/>
										<p>
											{$PAGE.usuario->getNombre()}
											<small>{$PAGE.usuario->getUser()}</small>
										</p>
									</li>
									<!-- Menu Body -->
									<li class="user-body">
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-right">
											<a href="?mod=logout" class="btn btn-default btn-flat">Salir</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-custom-menu -->
				</nav>
			</header>
			<!-- Full Width Column -->
			<div class="content-wrapper">
				<div class="container">
					<!-- Main content -->
					<section class="content">
						{if $PAGE.vista neq ''}
							{include file=$PAGE.vista}
						{/if}
					</section><!-- /.content -->
				</div>
			</div>
		</div><!-- /.container -->
	</div><!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="container">
			<div class="pull-right hidden-xs">
            <b>Version</b> {$PAGE.version}
          </div>
          <strong>Copyright &copy; {date("Y")} <a href="http://iebo.edu.mx">IEBO</a>.</strong> Todos los derechos reservados
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{$PAGE.ruta}plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{$PAGE.ruta}plugins/jQueryUI/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="{$PAGE.ruta}plugins/jQueryUI/jquery-ui.css">
    <!-- Bootstrap 3.3.5 -->
    <script src="{$PAGE.ruta}bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="{$PAGE.ruta}dist/js/raphael-min.js"></script>
    <script src="{$PAGE.ruta}plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="{$PAGE.ruta}plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="{$PAGE.ruta}plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{$PAGE.ruta}plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{$PAGE.ruta}plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="{$PAGE.ruta}dist/js/moment.min.js"></script>
    <script src="{$PAGE.ruta}plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="{$PAGE.ruta}plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="{$PAGE.ruta}plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{$PAGE.ruta}plugins/fastclick/fastclick.min.js"></script>
    <script type="text/javascript" src="{$PAGE.ruta}plugins/validate/validate.js"></script>
    
    <link rel="stylesheet" href="{$PAGE.ruta}plugins/datatables/dataTables.bootstrap.css">
    <script src="{$PAGE.ruta}plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{$PAGE.ruta}plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="{$PAGE.ruta}plugins/datatables/lenguaje/ES-mx.js"></script>
    
    <script src="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="{$PAGE.ruta}plugins/upload/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="{$PAGE.ruta}plugins/upload/js/jquery.fileupload.js"></script>
    
    <script type="text/javascript" src="{$PAGE.ruta}plugins/datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="{$PAGE.ruta}plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
    <link rel="stylesheet" href="{$PAGE.ruta}plugins/datepicker/datepicker3.css" />
     
    <script src="{$PAGE.ruta}plugins/input-mask/jquery.inputmask.js"></script>
    <script src="{$PAGE.ruta}plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="{$PAGE.ruta}plugins/input-mask/jquery.inputmask.extensions.js"></script>
    
    <script src="{$PAGE.ruta}dist/js/app.js" type="text/javascript"></script>
    
    <script src="{$PAGE.ruta}plugins/upload/js/jquery.iframe-transport.js"></script>
	<script src="{$PAGE.ruta}plugins/upload/js/jquery.fileupload.js"></script>
    
    {foreach from=$PAGE.scriptsJS item=script}
		<script type="text/javascript" src="{$script}"></script>
	{/foreach}
    
    {if $PAGE.debug}
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.3.1/less.min.js" type="text/javascript"></script>
    {else}
    
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    {/if}
  </body>
</html>
