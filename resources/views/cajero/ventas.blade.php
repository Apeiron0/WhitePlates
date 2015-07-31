@extends('layouts.index')
	@section('styles1')
		<link href="plugins/DataTables/css/data-table.css" rel="stylesheet" />
	@endsection
	
	@section('content')
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li><a href="javascript:;">Home</a></li>
			<li><a href="javascript:;">Tables</a></li>
			<li class="active">Managed Tables</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Managed Tables <small>header small text goes here...</small></h1>
		<!-- end page-header -->

		<!-- begin row -->
		<div class="row">
		    <!-- begin col-12 -->
		    <div class="col-md-6">
		        <!-- begin panel -->
		        <div class="panel panel-inverse">
		            <div class="panel-heading">
		                <div class="panel-heading-btn">
		                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
		                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
		                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		                </div>
		                <h4 class="panel-title">Data Table - Default</h4>
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table id="data-table" class="table table-striped table-bordered table-hover">
		                        <thead class="bg-orange-lighter">
		                            <tr>
		                                <th class="text-white">Platillo</th>
		                                <th class="text-white"><small>PRECIO</small></th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            <tr class="gradeA">
		                                <td>Huevos rancheros</td>
		                                <td class="text-success">$34.23</td>
		                            </tr>
		                            <tr class="gradeA">
		                                <td>Frijoles refritos</td>
		                                <td class="text-success">$20.00</td>
		                            </tr>
		                            <tr class="gradeA">
		                                <td>Enchiladas</td>
		                                <td class="text-success">15.87</td>
		                            </tr>
		                            <tr class="gradeA">
		                                <td>Chiles rellenos de pollo</td>
		                                <td class="text-success">32.50</td>
		                            </tr>
		                            <tr class="gradeA">
		                                <td>Huevos a la mexicana</td>
		                                <td class="text-success">10.67</td>
		                            </tr>
		                        </tbody>
		                    </table>
		                </div>
		            </div>
		        </div>
		        <!-- end panel -->
		    </div>
		    <!-- end col-12 -->
		    <div class="col-md-6">
		    <div class="panel panel-inverse">
		            <div class="panel-heading">
		                <div class="panel-heading-btn">
		                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
		                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
		                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		                </div>
		                <h4 class="panel-title">Data Table - Default</h4>
		            </div>
		            <div class="panel-body">
		                BLBLABLABALBALBALBALBALABLABA
		                HOLIWIS
		                </div>
		            </div>
		        </div>
		        <!-- end panel -->

		        
		    </div>
		
		<!-- end row -->
	@stop
	@section('scripts2')
	<script src="plugins/DataTables/js/jquery.dataTables.js"></script>
		<script src="js/table-manage-default.demo.min.js"></script>
		<script>
		$(document).ready(function() {
			App.init();
			TableManageDefault.init();
		});
	</script>
	@endsection