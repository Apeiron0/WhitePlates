@extends('index2')
	@section('styles2')
		<link href="/plugins/DataTables/css/data-table.css" rel="stylesheet" />
		<link href="/css/styleWP1.css" rel="stylesheet">
		<!-- Switchery -->
		<link href="/plugins/switchery/switchery.min.css" rel="stylesheet" />
		<!-- ######### -->
		<style>
		.estilo-estado{
			border-radius: 20px;
			border-top-right-radius: 5px;
			border-bottom-right-radius: 5px;
		}
		</style>
	@endsection
	@section('content')
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li><a href="javascript:;"></a>Orden</li>
			<li class="active">Platillos</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Platillos a preparar <small> de orden</small></h1>
		<!-- end page-header -->

		<div id="Ordenes">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Ordenes</h4>
				</div>
				<div class="alert alert-info fade in">
                    <i class="fa fa-info fa-2x pull-left"></i>
                    <p>De clic sobre "Ver orden" para consultar los platillos de esa orden.</p>
                </div>
				<div class="panel-body">
					<!-- Contenedor ordenes -->
					<div class="row row-space-6" id="contOrdenes">
					@if (count($ordenes) > 0)
						@foreach($ordenes as $orden)
							<div class="col-md-2 col-sm-6">
								<div class="widget widget-stats" style="background-color: #E29969;">
									<div class="stats-icon"><i class="glyphicon glyphicon-cutlery fa-2x"></i></div>
									<div class="stats-info" style="color: #5C534E;">
										<small>ORDEN</small>
										<p><strong>{{$orden->id}}</strong></p>	
										<small>PLATILLOS:</small><span class="f-s-14"><strong> {{$orden->platillo_count}}</strong></span>
									</div>
									<div class="stats-link">
										<a href="{{ $orden->id }}" id="orden{{ $orden->id }}" class="VerOrden">Ver orden <i class="fa fa-arrow-circle-o-right"></i></a>
									</div>
								</div>
							</div>
						@endforeach
					@else
						<div class="note note-warning">
							<h4>¡Sin ordenes pendientes por el momento!</h4>
							<p>
							    Espere a que llegue alguna orden.
                            </p>
						</div>
					@endif

					</div>
				</div>
			</div>
		</div>
		<div class="cont-cocina" id="PlatillosOrden">
			<div class="cont-header-platillo">
				<div class="row row-space-6">
					<div class="col-sm-6">
						<span class="text-muted m-l-5 f-s-15" style="color: #FFE099">ORDEN: <strong id="contIDOrden"><!-- ... --></strong></span>
					</div>
					<!-- Switchery -->
					<div class="col-sm-6">
						<div class="pull-right bg-silver-lighter p-2 estilo-estado" id="contCkeck">
							<input id="ChkEstado" type="checkbox" class="js-switch">
							<span class="text-muted m-l-5 m-r-5"><strong>Estado:</strong> <span id="LblEstado">Orden en proceso</span></span>
						</div>
					</div>
					<!-- ######### -->
				</div>
			</div>
			<div class="cont-platillo">
				<!-- Contenedor platillos -->
				<div class="row row-space-6" id="contPlatillos">
					<!-- ... -->
				</div>
			</div>
			<div class="cont-recetario">
				<div class="note note-warning">
					<strong class="f-s-15">Comentarios</strong>
					<div id='contComentarios' class="f-s-13">
						<!-- ... -->
                    </div>
				</div>
				<div id="Recetario">
					<strong class="f-s-20" style="color: #E29969;" id="contNomPlatillo"><!-- ... --></strong>  <strong class="f-s-15" style="color: #FABB7C;">( Ingredientes )</strong>
					<div class="borde-inferior col-sm-12"></div>
					<div id="contIngredientes">
						<!-- ... -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-7">
					<button id="VolverOrdenes" class="btn bg-orange-lighter text-white btn-circle" id="Volver"><span class="fa fa-chevron-left"></span></button>
					<span>
						<span> Volver a ordenes </span>
						<strong id="contAlertOrden"><!-- ... --></strong>
						<i class="fa fa-comment"></i>
					</span>
				</div>
			</div>
		</div>
	@endsection
	@section('scripts2')
		<!--<script src="plugins/DataTables/js/jquery.dataTables.js"></script>-->
		<!--<script src="js/table-manage-default.demo.min.js"></script>-->
		<!-- Switchery -->
		<script src="/plugins/pace/pace.min.js"></script>
		<script src="/plugins/switchery/switchery.min.js"></script>
		<!--<script src="/plugins/powerange/powerange.min.js"></script>-->
		<!--<script src="/js/form-slider-switcher.demo.min.js"></script>-->
		<!-- ######### -->
		<script>
		$(document).ready(function() {
			// |#############| Librerias |##############| //
			App.init();
			var elem = document.querySelector('.js-switch');
			var init = new Switchery(elem);
			var banderaclick=false;

			defaults = {
			    color          : '#64bd63'
			  , secondaryColor : '#dfdfdf'
			  , jackColor      : '#fff'
			  , className      : 'switchery'
			  , disabled       : false
			  , disabledOpacity: 0.5
			  , speed          : '0.1s'
			  , size           : 'default'
			}
			// |########################################| //
			var banEstado = 0;
			var idOrden;

			$("#PlatillosOrden").hide();

			// |############################| Traer platillos de una orden |############################| //
			var banBtn = true;
			$("#contOrdenes").on('click', '.VerOrden', function(e){

				e.preventDefault();
				var href = $(this).attr('href');
				//Poner disabled
				LlamarOrdenes(href);
				//$('.js-switch').click();
			})
			$(".VerOrden").click(function(e){
				e.preventDefault();
				var href = $(this).attr('href');
				LlamarOrdenes(href);
				//$('.js-switch').click();
			})
			function LlamarOrdenes(href){
				//$('.js-switch').click();
				idOrden = href;
				banderaclick=true;

				
				$("#contIDOrden").html(href);
				//Llamar ajax para traer datos de la orden
				llamarajax({'id':href}, 'platillos', 'JSON').success(function(data){
					var comentarios;
					var idPlatillos;
					$("#contPlatillos").html('');
					$.each(data, function(index, objeto1){
	                    comentarios = objeto1.comentarios;
	                    idPlatillos = objeto1.platillos[0].id;
	                    $.each(objeto1.platillos, function(index, objeto2){
	                    	
	                    	//Aregar los platillos de la orden
	                    	$("#contPlatillos").append("<div class='col-md-3 col-sm-6'>\
                					<div href='"+objeto2.id+"' class='platillo mouse-sobre idPlatillo'>\
                						<strong class='f-s-14'>"+objeto2.nombre+"</strong><br>\
                						Cantidad: "+objeto2.pivot['cantidad']+"\
                					</div>\
                				</div>");
	                    })
	                });

	                $("#contComentarios").html(comentarios);

	                // |########|Traer ingredientes del primer platillo de una ordden |########| //
	                llamarajax({'id':idPlatillos}, 'ingredientes', 'JSON').success(function(data1){
	                	$("#contIngredientes").html('');
						$("#contNomPlatillo").html(data1[0].nombre);
						$.each(data1[0].ingredientes, function(index, objeto1){
							//alert(objeto1.nombre);
							$("#contIngredientes").append('- '+objeto1.nombre+'<br>')
						})
	                })
	                // |#######################################################################| //

	                //Ocultar ordenes y mostrar platillos
					$("#Ordenes").hide(400, function(){
						banBtn = true;
						banEstado = 0;
						$("#PlatillosOrden").show(500);
						//$('.js-switch').click();
					})
				});
			}
			// |########################################################################################| //

			//Boton volver a ordenes
			$("#VolverOrdenes").click(function(e){
				
				$("#PlatillosOrden").hide(500, function(){
					if(banEstado==1){
						llamarajax({'id':idOrden}, 'cambiarestado', 'JSON').success(function(data1){
							if(data1.Bandera){
								/*llamarajax('', 'ordenes', 'JSON').success(function(data2){*/
									toastr["success"]("Orden "+idOrden+" finalizada.");
									$("#contOrdenes").html('');
									if(data1.Orden.length > 0){
										$.each(data1.Orden, function(index, objeto1){
											$("#contOrdenes").append('<div class="col-md-2 col-sm-6">\
												<div class="widget widget-stats" style="background-color: #E29969;">\
													<div class="stats-icon"><i class="glyphicon glyphicon-cutlery fa-2x"></i></div>\
													<div class="stats-info" style="color: #5C534E;">\
														<small>ORDEN</small>\
														<p><strong>'+objeto1.id+'</strong></p>\
														<small>PLATILLOS: </small><span class="f-s-14"><strong>'+objeto1.platillo_count+'</strong></span>\
													</div>\
													<div class="stats-link">\
														<a href="'+objeto1.id+'" id="orden'+objeto1.id+'" class="VerOrden">Ver orden <i class="fa fa-arrow-circle-o-right"></i></a>\
													</div>\
												</div>\
											</div>');
											
										})
									}else{
										$('#contOrdenes').html('<div class="note note-warning">\
											<h4>¡Sin ordenes pendientes por el momento!</h4>\
											<p>\
											    Espere a que llegue alguna orden.\
			                                </p>\
										</div>');
										
									}
								$("#Ordenes").show(500);
							}
						});
						$('.js-switch').click();
					}else{
						$("#Ordenes").show(500);
					}
					
				})
			})

			//Traer ingredientes del platillo
			$('#contPlatillos').on('click', '.idPlatillo', function(e){
				var hrefPlatillo = $(this).attr('href');
				// alert(hrefPlatillo);

				llamarajax({'id':hrefPlatillo}, 'ingredientes', 'JSON').success(function(data){
					//alert(data[0].descripcion);
					$("#contIngredientes").html('');
					$("#contNomPlatillo").html(data[0].nombre);
					$.each(data[0].ingredientes, function(index, objeto1){
						//alert(objeto1.nombre);
						$("#contIngredientes").append('- '+objeto1.nombre+'<br>')
					})
				});
			})

			//Cambiar el estado de la orden
			$("#ChkEstado").change(function() {
		        if($(this).attr("checked")) {
		            $("#LblEstado").html('Orden terminada');
		            $("#contAlertOrden").html('¡Si vuelves, esta orden sera dada de baja!');
		            banEstado = 1;
		        }
		        else {
		            $("#LblEstado").html('Orden en proceso');
		            $("#contAlertOrden").html('');
		            banEstado = 0;
		        }
		    });
		});
		</script>
	@endsection