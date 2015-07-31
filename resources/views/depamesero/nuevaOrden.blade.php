@extends('index2')
	@section('styles2')
		<link href="/plugins/DataTables/css/data-table.css" rel="stylesheet" />
		<link href="/css/styleWP1.css" rel="stylesheet">
	@endsection
	@section('content')
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li><a href="javascript:;">Orden</a></li>
			<li class="active">Registrar</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Registrar <small>orden</small></h1>
		<!-- end page-header -->

		<!-- begin row -->
		<div class="row">
			<div class="col-md-7">
		        <div class="panel-group" id="accordion">
					<div class="panel panel-inverse overflow-hidden">
						<div class="panel-heading">
							<h3 class="panel-title">
								<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
								    <i class="fa fa-plus-circle pull-right"></i> 
									Datos de orden
								</a>
							</h3>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in">
							<div class="panel-body">
								<form class="form-horizontal" id="frmOrden">
									<div class="form-group">
	                                    <label class="col-md-3 control-label">Mesero:</label>
	                                    <div class="col-md-9">
	                                        <select class="form-control" id="personal_id" name="personal_id">
	                                        	<option value="">Seleccione mesero</option>}
	                                        	@foreach($personal as $persona)
	                                        	<option value="{{$persona->id}}">{{$persona->nombre}} {{$persona->apaterno}} {{$persona->amaterno}}</option>}
	                                        	@endforeach
	                                        </select>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="col-md-3 control-label">Comentarios</label>
	                                    <div class="col-md-9">
	                                    	<textarea class="form-control" name="comentarios"  style="resize:none" placeholder="" rows="5"></textarea>
	                                    </div>
                                	</div>
                                </form>
							</div>
						</div>
					</div>
					<div class="panel panel-inverse overflow-hidden">
						<div class="panel-heading">
							<h3 class="panel-title">
								<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
								    <i class="fa fa-plus-circle pull-right"></i> 
									Seleccionar del menu
								</a>
							</h3>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="table-responsive">
				                    <table id="data-table" class="table table-striped table-bordered">
				                        <thead class="bg-orange-lighter">
				                            <tr>
				                            	<th class="text-white"><small>+</small></th>
				                            	<th class="text-white"><small>ID</small></th>
				                                <th class="text-white"><small>PLATILLO</small></th>
				                                <th class="text-white"><small>PRECIO</small></th>
				                                <th class="text-white"><small>CATEGORIA</small></th>
				                                <th class="text-white"><small>SUBCATEGORIA</small></th>
				                            </tr>
				                        </thead>
				                        <tbody id="datos">
					                        @foreach($platillos as $platillo)
					                        <tr class="gradeA">
					                        	<td ><button class="btn no-bg text-success btn-icon btn-sm btn-circle btnaddplat"><i class="fa fa-plus"></td>
					                        	<td class="text-success id">{{$platillo->id}}</td>
					                            <td class="nombreplat">{{$platillo->nombre}}</td>
				                                <td class="text-success precio">{{$platillo->precio}}</td>
				                                <td class="nombrecategoria">{{$platillo->subcategoria->categoria->nombre}}</td>
				                                <td>{{$platillo->subcategoria->nombre}}</td>
					                        </tr>
					                        @endforeach
				                        </tbody>
				                    </table>
				                </div>
							</div>
						</div>
					</div>
					
				</div>
		    </div>
		    <!-- end col-6 -->

		    <div class="col-md-5">
			    <div class="panel panel-inverse">
		            <div class="panel-heading">
		                <div class="panel-heading-btn">
		                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
		                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
		                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		                </div>
		                <h4 class="panel-title">Registro de orden</h4>
		            </div>
		            <div class="panel-body panel-color">

		            	<div class="table-responsive">
		            		<table class="col-sm-12">
		            			<thead class="tabla-cabecera">
		            				<th class="col-sm-1 table-titles"><small>ID</small></th>
		            				<th class="col-sm-6 table-titles"><small>PRODUCTO</small></th>
		            				<th class="col-sm-1 table-titles"><small>CANTIDAD</small></th>
		            				<th class="col-sm-2 table-titles"><small>PRECIO UNITARIO</small></th>
		            				<th class="col-sm-2 row-precio"><small>TOTAL</small></th>
		            			</thead>
		            			<tbody class="contendedor" id="ticket">
		            	

		            			</tbody>
		            		</table>
		            	</div>
		            	<div class="row">
		            		<h4 class="col-sm-4"></h4>
		            		<h4 class="col-sm-3"></h4>
		            		<h4 class="col-sm-5 text-success"><span class="precio f-s-12">Total:</span> <span>$</span><span id="TotalPagar">0</span></h4>
		            	</div>
				    </div>
				    <div class="panel-footer panel-footer-color">
				    	<button class="btn btn-block bg-orange-lighter text-inverse" id="sendCocina" disabled>Mandar orden a cocina</button>
				    </div>
			    	<!-- end panel -->
				</div>
			</div>
		        
		</div>
		
		<!-- end row -->
	@endsection
	@section('scripts2')
		<script src="/plugins/DataTables/js/jquery.dataTables.js"></script>
		<script>
		$(document).ready(function() {
			App.init();
			$("#data-table").DataTable();
			var frmOrden=$("#frmOrden");
			var inicial=false;
			/*var platillos=new Object();*/
			var platillos = {
			    idplatillo:"",
			    cantidad:"",
			    total:"",
			};
			$("#sendCocina").click(function(){
				$("#collapseOne").collapse("show");
				$("#collapseTwo").collapse("hide");
				frmOrden.data('formValidation').validate();
                if(frmOrden.data('formValidation').isValid()){
                	var arreglocantidad=new Array();
					var arreglogeneral=new Array();
					var count=0;
					$('#ticket tr').each(function(){
						platillos.idplatillo=parseFloat($(this).find('.id').html());
						platillos.cantidad=parseFloat($(this).find('.cantidad').html());
						platillos.total=parseFloat($(this).find('.total').html());
						arreglogeneral.push({idplatillo:parseFloat($(this).find('.id').html()),cantidad:parseFloat($(this).find('.cantidad').html()),total:parseFloat($(this).find('.total').html())});
						count++;
					});
                	var datos={platillos:arreglogeneral,id_personal:$("#personal_id").val(),comentarios:$("[name=comentarios]").val()};
					llamarajax(datos, "/encargadomeseros/registrarorden", "JSON").success(function(datosajax){
						console.log(datosajax)
					}).success(function(data){
						if(data.Bandera){
                            frmOrden.data('formValidation').resetForm();
                            frmOrden.each(function(){
                                this.reset();
                            })
                            $("#sendCocina").attr('disabled',true);
                            toastr["success"]("Orden enviada a cocina exitosamente");
                            $('#ticket').html("");
                            $("#TotalPagar").html("0");


                        }else{
                            toastr["error"](data.Codigo);
                        }

					}).error(function(data){
						toastr["error"](regresarajaxerrors(data));
					});
                }else{
                    var arrerr=frmOrden.data('formValidation').getInvalidFields();
                    
                    var inp=arrerr[0];
                    $(inp).focus();
                    toastr["error"]("Verificar campos");
                }
			});
			$("#ticket").on("click", ".btnquitar", function(e){
				 var general=($(this).parent()).parent();
				 var id=general.find('.id').html();
				 var cantidad=parseInt(general.find('.cantidad').html());
				 cantidad=cantidad-1;
				 var precio=parseInt(general.find('.precio').html());
				 var total=0;
				 console.log(cantidad);
				 var banderai=false;
				 if(cantidad===0){
				 	console.log(general)
				 	general.remove();
				 	/*general.html(""dd);*/
				 	
				 	banderai=true;
				 	/*alert("should be null");*/
				 }else{
				 		general.find('.cantidad').html(cantidad);
				 		general.find('.total').html(precio*(cantidad));
				 }
				 var count=0;
				 $('#ticket tr').each(function(){
						total=total+parseFloat($(this).find('.total').html());
						count++;			
						/*alert("Por cada platillo "+$(this).find('.total').html());
						alert("Sub total "+total);*/
						
						/*alert(total)*/
					});
				 if(count==0){
				 	$("#sendCocina").attr('disabled',true);
				 }
				 $("#TotalPagar").html(total);
			});
			 $("#datos").on("click", ".btnaddplat", function(e){
			 		var arreglo=new Array();
			 		var nombre=$(this).parent().parent().find('.nombreplat').html();
			 		var precio1=$(this).parent().parent().find('.precio').html();
			 		var id=$(this).parent().parent().find('.id').html();
			 		var count=0;
			 		var bandera=false;
			 		var total=0;
			 		$("#sendCocina").attr('disabled',false);
			 		if(inicial===false){

			 			/*total=total+parseFloat(precio1);*/
			 		}
			 		inicial=true;
			 		$('#ticket tr').each(function(){
			 			if($(this).find('.id').html()!=id){
			 				

			 			}else{
				 			if($(this).find('.id').html()==id){
				 				/*alert("Existe")*/
				 				bandera=true;
				 				var cantidad=parseInt($(this).find('.cantidad').html());
				 				$(this).find('.cantidad').html(parseInt(cantidad)+1);
				 				
				 				var precio=parseFloat($(this).find('.precio').html());
				 				$(this).find('.total').html(precio*(cantidad+1));
				 				return true;

				 			}
				 		}
			 			
					});
					if(bandera==false){
						$('#ticket').append('<tr class="row-row">\
			 					<td class="row-cantidad id col-sm-2">'+id+'</td>\
			 					<td class="row-producto nombre col-sm-6"><button class="btn no-bg text-danger btn-icon btn-circle btn-xs btnquitar"><i class="fa fa-minus"></i></button>'+nombre+'</td>\
			 					<td class="row-cantidad cantidad col-sm-2">1</td>\
			 					<td class="row-cantidad precio col-sm-2">'+precio1+'</td>\
			 					<td class="row-precio total col-sm-2">'+precio1+'</td>\
			 					</tr>')
					}else{
						

					}

					$('#ticket tr').each(function(){
						total=total+parseFloat($(this).find('.total').html());
					});
					$("#TotalPagar").html(total);
					console.log($(".btnquitar"));
					/*each end*/
                
            });
		frmOrden.formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                // This option will not ignore invisible fields which belong to inactive panels
                fields: {
                    personal_id:{
                        validators:{
                            notEmpty:{
                                message:'Mesero requerido.'
                            }
                        }
                    },
                    comentarios:{
                        validators:{
                            stringLength: {
                                min: 4,
                                max: 60,
                                message: 'Rango de caracteres entre 4 y 60 como maximo.'
                            }
                        }
                    }
                }
            });
		});
	</script>
	@endsection