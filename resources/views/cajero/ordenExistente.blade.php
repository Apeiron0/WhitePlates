@extends('index2')
	@section('styles2')
		<link href="/plugins/DataTables/css/data-table.css" rel="stylesheet" />
		<link href="/css/styleWP1.css" rel="stylesheet">
	@endsection
	@section('content')
		<div class="modal fade" id="Mdl">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Ordenes existentes</h4>
		      </div>
		      <div class="modal-body">
		      	<form class="form-horizontal">
					<div class="form-group">
                        <label class="col-md-4 control-label">Mesero que atendio orden:</label>
                        <div class="col-md-8">
                            <select class="form-control">
                                <option>Juan Carlos</option>
                                <option>Brenda Martell</option>
                                <option>Victor Martines</option>
                                <option>Damaris Abigail</option>
                                <option>Hector Angel</option>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="col-md-12 ods-cont-title">ORDENES</div>
                <div class="row">
				    <div class="col-sm-3"><!-- //Producto -->
				        <div class="ods-cont-orden ods-mouse">
				          	<div>12345</div>
				        </div>
				        <div class="ods-cont-precio">
				        	<small class="ods-mini-titulos">TOTAL:</small> <span id="PrecioProducto" class="product-price-title">$99999.99</span>
				        </div>
				    </div><!-- //Fin producto -->
				    <div class="col-sm-3"><!-- //Producto -->
				        <div class="ods-cont-orden ods-mouse">
				          	<div>3497842</div>
				        </div>
				        <div class="ods-cont-precio">
				        	<small class="ods-mini-titulos">TOTAL:</small> <span id="PrecioProducto" class="product-price-title">$342.39</span>
				        </div>
				    </div><!-- //Fin producto -->
				    <div class="col-sm-3"><!-- //Producto -->
				        <div class="ods-cont-orden ods-mouse">
				          	<div>145789</div>
				        </div>
				        <div class="ods-cont-precio">
				        	<small class="ods-mini-titulos">TOTAL:</small> <span id="PrecioProducto" class="product-price-title">$2344.00</span>
				        </div>
				    </div><!-- //Fin producto -->
				    <div class="col-sm-3"><!-- //Producto -->
				        <div class="ods-cont-orden ods-mouse">
				          	<div>4358034</div>
				        </div>
				        <div class="ods-cont-precio">
				        	<small class="ods-mini-titulos">TOTAL:</small> <span id="PrecioProducto" class="product-price-title">$94092.50</span>
				        </div>
				    </div><!-- //Fin producto -->
				    <div class="col-sm-3"><!-- //Producto -->
				        <div class="ods-cont-orden ods-mouse">
				          	<div>134553</div>
				        </div>
				        <div class="ods-cont-precio">
				        	<small class="ods-mini-titulos">TOTAL:</small> <span id="PrecioProducto" class="product-price-title">$99999.99</span>
				        </div>
				    </div><!-- //Fin producto -->
				</div>
		      </div>
		      <div class="modal-footer">
		        <button id="AceptarMesero" type="button" class="btn btn-primary">Aceptar</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
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
			<div class="col-md-6">
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
		            <div class="panel-body">
						<div class="table-responsive">
		                    <table id="data-table" class="table table-striped table-bordered">
		                        <thead class="bg-orange-lighter">
		                            <tr>
		                                <th class="text-white">Platillo</th>
		                                <th class="text-white"><small>PRECIO</small></th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            <tr class="gradeA">
		                                <td><button class="btn no-bg text-success btn-icon btn-sm btn-circle"><i class="fa fa-plus"></i></button> Huevos rancheros</td>
		                                <td class="text-success">$34.23</td>
		                            </tr>
		                            <tr class="gradeA">
		                                <td><button class="btn no-bg text-success btn-icon btn-sm btn-circle"><i class="fa fa-plus"></i></button> Frijoles refritos</td>
		                                <td class="text-success">$20.00</td>
		                            </tr>
		                            <tr class="gradeA">
		                                <td><button class="btn no-bg text-success btn-icon btn-sm btn-circle"><i class="fa fa-plus"></i></button> Enchiladas</td>
		                                <td class="text-success">15.87</td>
		                            </tr>
		                            <tr class="gradeA">
		                                <td><button class="btn no-bg text-success btn-icon btn-sm btn-circle"><i class="fa fa-plus"></i></button> Chiles rellenos de pollo</td>
		                                <td class="text-success">32.50</td>
		                            </tr>
		                            <tr class="gradeA">
		                                <td><button class="btn no-bg text-success btn-icon btn-sm btn-circle"><i class="fa fa-plus"></i></button> Huevos a la mexicana</td>
		                                <td class="text-success">10.67</td>
		                            </tr>
		                        </tbody>
		                    </table>
		                </div>
				    </div>
				</div>
			</div>

		    <div class="col-md-6">
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
		            				<th class="col-sm-6 table-titles">Producto</th>
		            				<th class="col-sm-2 table-titles">Cantidad</th>
		            				<th class="col-sm-2 table-titles">Precio Unitario</th>
		            				<th class="col-sm-2 row-precio">Total</th>
		            			</thead>
		            			<tbody class="contendedor">
		            				<tr class="row-row">
			            				<td class="row-producto col-sm-6"><button class="btn no-bg text-danger btn-icon btn-circle btn-xs"><i class="fa fa-minus"></i></button> Chiles rellenos de pollo</td>
			            				<td class="row-cantidad col-sm-2">3</td>
			            				<td class="row-cantidad col-sm-2">4.34</td>
			            				<td class="row-precio col-sm-2">12.54</td>
		            				</tr>
		            				<tr class="row-row">
			            				<td class="row-producto col-sm-6"><button class="btn no-bg text-danger btn-icon btn-circle btn-xs"><i class="fa fa-minus"></i></button> Chilaquiles verdes</td>
			            				<td class="row-cantidad col-sm-2">2</td>
			            				<td class="row-cantidad col-sm-2">25.32</td>
			            				<td class="row-precio col-sm-2">54.67</td>
		            				</tr>
		            				<tr class="row-row">
			            				<td class="row-producto col-sm-6"><button class="btn no-bg text-danger btn-icon btn-circle btn-xs"><i class="fa fa-minus"></i></button> Gorditas con guiso</td>
			            				<td class="row-cantidad col-sm-2">5</td>
			            				<td class="row-cantidad col-sm-2">4.25</td>
			            				<td class="row-precio col-sm-2">23.43</td>
		            				</tr>
		            			</tbody>
		            		</table>
		            	</div>
		            	<div class="row">
		            		<h4 class="col-sm-4"></h4>
		            		<h4 class="col-sm-3"></h4>
		            		<h4 class="col-sm-5 text-success"><span class="precio f-s-12">Total:</span> <span>$</span><span id="TotalPagar">200.45</span></h4>
		            	</div>
				    </div>
				    <div class="panel-footer panel-footer-color">
				    	<button class="btn btn-block bg-orange-lighter text-inverse">Mandar orden a cocina</button>
				    </div>
			    	<!-- end panel -->
				</div>
			</div> 
		</div>
		<!-- end row -->
	@endsection
	@section('scripts2')
		<script src="/plugins/DataTables/js/jquery.dataTables.js"></script>
		<script src="/js/table-manage-default.demo.min.js"></script>
		<script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="/js/form-plugins.demo.min.js"></script>
		<script>
		$(document).ready(function() {
			App.init();
			TableManageDefault.init();
			$("#datepicker-autoClose").datepicker({todayHighlight:true,autoclose:true});
			$("#Mdl").modal("show");
		});
	</script>
	@endsection