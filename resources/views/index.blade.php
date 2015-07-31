<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.6/admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2015 04:07:36 GMT -->
<head>
	<meta charset="utf-8" />
	<title>Restaurante | Copa de Leche</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="/css/animate.min.css" rel="stylesheet" />
	<link href="/css/style.min.css" rel="stylesheet" />
	<link href="/css/style-responsive.min.css" rel="stylesheet" />
	<link href="/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
	<link href="/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
	<link href="/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
    <link href="/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	@yield('styles2')
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	<style>
	.imglogo{
		padding-top: 10px;
		width: 160px;
	}
	</style>
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<img class="imglogo" src="/img/logowp.png">
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							@if(Auth::administrador())
								<img src="/img/Users/User-admin.png" alt="" /> 
							@elseif(Auth::cajero())
								<img src="/img/Users/User-cajera.png" alt="" />
							@elseif(Auth::cocina())
								<img src="/img/Users/User-cocinero.png" alt="" />
							@elseif(Auth::gerente())
								<img src="/img/Users/User-gerente.png" alt="" />
							@elseif(Auth::mesero())
								<img src="/img/Users/User-mesero.png" alt="" />
							@elseif(Auth::depamesero())
								<img src="/img/Users/User-mesero.png" alt="" />
							@endif
							<span class="hidden-xs">{{ Auth::user()->username }}</span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<!-- <li class="arrow"></li>
							<li><a href="javascript:;">Edit Profile</a></li>
							<li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
							<li><a href="javascript:;">Calendar</a></li>
							<li><a href="javascript:;">Setting</a></li>
							<li class="divider"></li> -->
							<li><a href="/usuario/logout">Cerrar sesión</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							@if(Auth::administrador())
								<img src="/img/Users/User-admin.png" alt="" /> 
							@elseif(Auth::cajero())
								<img src="/img/Users/User-cajera.png" alt="" />
							@elseif(Auth::cocina())
								<img src="/img/Users/User-cocinero.png" alt="" />
							@elseif(Auth::gerente())
								<img src="/img/Users/User-gerente.png" alt="" />
							@elseif(Auth::mesero())
								<img src="/img/Users/User-mesero.png" alt="" />
							@elseif(Auth::depamesero())
								<img src="/img/Users/User-mesero.png" alt="" />
							@endif
						</div>
						<div class="info">
							@if(Auth::depamesero())
								<span class="f-s-12">Encargada de {{ Auth::user()->username }}</span>
							@else
								{{ Auth::user()->username }}
							@endif
							<small>
								{{ Auth::user()->Personal->nombre }}
								{{ Auth::user()->Personal->apaterno }}
								<!-- {{ Auth::user()->Personal->amaterno }} -->
							</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navegación</li>
					@if (Auth::administrador())
						<li class="has-sub">
							<a href="javascript:;">
						    	<b class="caret pull-right"></b>
						    	<i class="fa fa-user"></i>
						    	<span>Cuenta</span>
							</a>
							<ul class="sub-menu">
								<li class="has-sub">
						    		<a href="javascript:;"><b class="caret pull-right"></b>Personal</a>
						    		<ul class="sub-menu">
							        	<li><a href="/administrador/registrarpersonal">Registrar</a></li>
							        	<li><a href="/administrador/modificarpersonal">Modificar</a></li>
							        	<li><a href="/administrador/listadopersonal">Listado</a></li>
						    		</ul>
						    		<a href="javascript:;"><b class="caret pull-right"></b>Usuario</a>
							    	<ul class="sub-menu">
							        	<li><a href="/administrador/registrarusuario">Registrar</a></li>
							        	<li><a href="/administrador/modificarusuario">Modificar</a></li>
							        	<li><a href="/administrador/listadoususario">Listado</a></li>
							    	</ul>
								</li>
							</ul>
						</li>
						<!-- </li> -->
						<li class="has-sub">
							<a href="javascript:;">
							    <b class="caret pull-right"></b>
							    <i class="fa fa-line-chart"></i>
							    <span>Reportes</span>
						    </a>
						    <ul class="sub-menu">
							    <li class=""><a href="/administrador/reporteshoy">Listado</a></li>
							    <li class=""><a href="/administrador/reportesano">Ganancias años</a></li>
							    <li class=""><a href="/administrador/reporteplatillo">Ganancias platllos</a></li>
							    <li class=""><a href="/administrador/reportepersonal">Ganancias meseros</a></li>
							    
							</ul>
						</li>
					@elseif(Auth::cajero())
						<li class="has-sub">
							<a href="javascript:;">
							    <b class="caret pull-right"></b>
							    <i class="fa fa-calendar-o"></i>
							    <span>Orden</span>
						    </a>
						    <ul class="sub-menu">
							    <li class=""><a href="/cajero/registrar">Registrar</a></li>
							    <!-- <li class=""><a href="/cajero/registrarexistente">Agregar a existente</a></li> -->
							</ul>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
							    <b class="caret pull-right"></b>
							    <i class="fa fa-shopping-cart"></i>
							    <span>Venta</span>
						    </a>
						    <ul class="sub-menu">
							    <li class=""><a href="/cajero/registrarventa">Registrar</a></li>
							</ul>
						</li>
					@elseif(Auth::cocina())
						<li class="has-sub">
							<a href="javascript:;">
							    <b class="caret pull-right"></b>
							    <i class="fa fa-book"></i>
							    <span>Ordenes</span>
						    </a>
						    <ul class="sub-menu">
							    <li class=""><a href="/cocina/ver">Ver ordenes</a></li>
							    <!-- <li class=""><a href="/cocina/table">Ver</a></li> -->
							</ul>
						</li>
					@elseif(Auth::gerente())
						<li class="has-sub">
							<a href="javascript:;">
							    <b class="caret pull-right"></b>
							    <i class="fa fa-database"></i>
							    <span>Platillo</span>
						    </a>
						    <ul class="sub-menu">
							    <li class=""><a href="/gerente/registrarplatillo">Registrar</a></li>
							    <li class=""><a href="/gerente/platilloslistado">Listado</a></li>
							    <!-- <li class=""><a href="/administrador/registroubcategoria">SubCategorias</a></li> -->
							    <li class=""><a href="/gerente/registroubcategoria">Registrar sub-categoria</a></li>
							</ul>
						</li>

						<li class="has-sub">
							<a href="javascript:;">
							    <b class="caret pull-right"></b>
							    <i class="fa fa-leaf"></i>
							    <span>Ingrediente</span>
							</a>
							<ul class="sub-menu">
								<li class="has-sub">
								    <a href="javascript:;"><b class="caret pull-right"></b>Categoria</a>
								    <ul class="sub-menu">
								        <li><a href="/gerente/categoriaregistro">Registrar</a></li>
								        <li><a href="/gerente/ingredientescategoriamodificar">Modificar</a></li>
								        <li><a href="/gerente/categoriaslistado">Listado</a></li>
								    </ul>
								    <a href="javascript:;"><b class="caret pull-right"></b>Ingrediente</a>
								    <ul class="sub-menu">
								        <li><a href="/gerente/ingredienteregistro">Registrar</a></li>
								        <li><a href="/gerente/modificaringrediente">Modificar</a></li>
								        <li><a href="/gerente/ingredienteslistado">Listado</a></li>
								    </ul>
								</li>
							</ul>
						</li>
					@elseif(Auth::mesero())
						<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-calendar-o"></i>
						    <span>Orden</span>
					    </a>
					    <ul class="sub-menu">
						    <li class=""><a href="/mesero/registrar">Nueva orden</a></li>
						</ul>
					@elseif(Auth::depamesero())
						<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-calendar-o"></i>
						    <span>Orden</span>
					    </a>
					    <ul class="sub-menu">
						    <li class=""><a href="/encargadomeseros/registrar">Nueva Orden</a></li>
						</ul>
					@endif
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
			        </li>
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			@yield('content')
			<!-- begin scroll to top btn -->
			<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
			<!-- end scroll to top btn -->
		</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="/crossbrowserjs/html5shiv.js"></script>
		<script src="/crossbrowserjs/respond.min.js"></script>
		<script src="/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="/plugins/flot/jquery.flot.min.js"></script>
	<script src="/plugins/flot/jquery.flot.time.min.js"></script>
	<script src="/plugins/flot/jquery.flot.resize.min.js"></script>
	<script src="/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			
		});
	</script>
    @yield('scripts2')
</body>

<!-- Mirrored from seantheme.com/color-admin-v1.6/admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2015 04:09:51 GMT -->
</html>

