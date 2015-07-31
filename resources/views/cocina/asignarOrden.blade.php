@extends('index2')
	@section('styles2')
		<link href="/plugins/DataTables/css/data-table.css" rel="stylesheet" />
        <script src="/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
		<link href="/css/styleWP1.css" rel="stylesheet">
	@endsection
	@section('content')
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li><a href="javascript:;">Venta</a></li>
			<li class="active">Asignar orden</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Asignar orden<small> a venta</small></h1>
		<!-- end page-header -->

		<!-- begin row -->
		<div class="row">
		    <!-- begin col-6 -->
		    <div class="col-md-8">
		        <div class="panel-group" id="accordion">
                    <div class="panel panel-inverse overflow-hidden">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <i class="fa fa-plus-circle pull-right"></i> 
                                    Ordenes
                                </a>
                            </h3>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <!-- |####################| Panel-body |####################| -->
                                <form class="form-horizontal form-bordered" id="frmOrden">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Mesero</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="personal_id" name="personal_id">
                                                <option value="">Seleccione mesero</option>}
                                                <option value="1">??? ????? ???</option>}
                                            </select>
                                        </div>
                                    </div>
                                </form><br>
                                <div class="row row-space-6">
                                    <div class="col-sm-6 col-lg-4"><!-- //Producto -->
                                        <div class="ods-cont-orden">
                                            <div class="f-s-20 text-center"><b>12345</b></div>
                                            <small><center style="color: #8D5E3F;">- - - - - - MESERO - - - - - -</center></small>
                                            <div class="text-center"><b>Hector Angel Camacho Favela</b></div>
                                        </div>
                                        <div class="ods-cont-precio">
                                            <button class="btn btn-xs" style="background-color: #8D5E3F; color: #E29969;"><small><i class="fa fa-info"></i> DETALLES</small></button>
                                            <button class="btn btn-xs" style="background-color: #8D5E3F; color: #E29969;"><small><i class="fa fa-plus"></i> AGREGAR</small></button>
                                            <!-- <small class="ods-mini-titulos">TOTAL:</small> <span id="PrecioProducto" class="product-price-title">$99999.99</span> -->
                                        </div>
                                    </div><!-- //Fin producto -->
                                </div>
                                <!-- |######################################################| -->
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-inverse overflow-hidden">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <i class="fa fa-plus-circle pull-right"></i> 
                                    Detalles de orden
                                </a>
                            </h3>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <strong class="f-s-20" style="color: #E29969;">Orden</strong><strong class="f-s-15" style="color: #FABB7C;"> ( numero: <span id="NumOrden">9</span> )</strong>
                                <!-- <div class="borde-inferior col-sm-12"></div> -->
                                <div class='row'>
                                    <div class="col-sm-6">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th><small>PLATILLO</small></th>
                                                    <th><small>CANTIDAD</small></th>
                                                </tr>
                                            </thead>
                                            <tbody id="TblListPlatillos">
                                                <tr>
                                                    <td>Chiles rellenos</td>
                                                    <td>1</td>
                                                </tr>
                                                <tr>
                                                    <td>Hamburguesa c/queso y papas</td>
                                                    <td>2</td>
                                                </tr>
                                                <tr>
                                                    <td>Enchiladas</td>
                                                    <td>1</td>
                                                </tr>
                                                <tr>
                                                    <td>Huevos rancheros</td>
                                                    <td>2</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="note note-warning" style="margin-top: 30px;">
                                            <strong class="f-s-15">Comentarios</strong>
                                            <div id='contComentarios' class="f-s-13">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert bg-silver-lighter fade in m-b-15 text-right text-success">
                                    <small class="f-s-13">TOTAL: </small class="f-s-13">
                                    <strong class="f-s-18">$<span id="TotalOrden">0</span></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col-6 -->
            <div class="col-md-4">
            	<div class="panel panel-inverse" data-sortable-id="table-basic-4">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                        </div>
                        <h4 class="panel-title">Ordenes de venta</h4>
                    </div>
                    <div class="panel-body panel-color">
                        <form class="form-horizontal form-bordered">    
                            <div class="form-group">
                                <label class="col-md-3 control-label">Fecha</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="datepicker-autoClose" placeholder="Fecha de venta" />
                                </div>
                            </div>
                        </form><br>

                        <div class="table-responsive">
                            <table class="col-sm-12">
                                <thead class="tabla-cabecera">
                                    <th class="col-sm-1 table-titles"><small>ORDEN</small></th>
                                    <th class="col-sm-1 table-titles"><small>N° PLATILLOS</small></th>
                                    <th class="col-sm-2 row-precio"><small>TOTAL</small></th>
                                </thead>
                                <tbody class="contendedor" id="ticket">
                                    <tr class="row-row">
                                        <td class="row-cantidad id col-sm-2">124</td>
                                        <td class="row-cantidad cantidad col-sm-2">3</td>
                                        <td class="row-precio total col-sm-2">$12415</td>
                                    </tr>
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
                        <button class="btn btn-block bg-orange-lighter text-inverse" id="FinalizarOrden" disabled>Finalizar orden / Imprimir ticket</button>
                    </div>
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
			
		});
		</script>
	@endsection