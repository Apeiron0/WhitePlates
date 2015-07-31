@extends('index2')
    @section('styles2')
        <link href="/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
        <link href="/plugins/password-indicator/css/password-indicator.css" rel="stylesheet" />
        <link href="/plugins/DataTables/css/data-table.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="\plugins\bootstrap-datepicker\css\datepicker.css">
        <style type="text/css">
        #installationForm .tab-content {
            margin-top: 20px;
        }
        #fechanac {z-index: 1151 !important;}
        </style>
    @endsection
    @section('content')
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Cuenta</a></li>
            <li><a href="javascript:;">Usuario</a></li>
            <li class="active">Listado</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Usuario<small> Listado</small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row">
            <!-- begin col-12 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Listado de usuario</h4>
                    </div>
                    
                    <div class="panel-body">
                        <div class="alert alert-info fade in">
                            <i class="fa fa-info fa-2x pull-left"></i>
                            <p>Listado global de todos los usuarios</p>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead class="bg-orange-lighter">
                                    <tr>
                                        <th class="text-white"><small>#USUARIO</small></th>
                                        <th class="text-white"><small>NOMBRE DE USUARIO</small></th>
                                        <th class="text-white"><small>ROL</small></th>
                                        <th class="text-white"><small>ESTADO DE USUARIO</small></th>
                                        <th class="text-white"><small>FECHA DE ALTA</small></th>
                                        <th class="text-white"><small>FECHA DE ULTIMA ATCUALIZACION</small></th>
                                    </tr>
                                </thead>
                                <tbody id="datos">
                                @foreach($users as $user)
                                    <tr class="gradeA">
                                        <td class="id">{{$user->id}}</td>
                                        <td class="nombre">{{$user->username}}</td>
                                        <td class="apaterno">{{$user->rol->tipo}}</td>
                                        @if($user->active==1)
                                            <td class="activ">Activo</td>
                                        @else
                                            <td class="activ">Inactivo</td>
                                        @endif
                                        <td class="telefono">{{$user->created_at->format('d/m/Y')}}</td>
                                        <td class="telefono">{{$user->updated_at->format('d/m/Y')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End panel body -->
                    <div class="panel-footer">
                        
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-12 -->
        </div>
        <!-- end row -->

    @endsection
    @section('scripts2')
        <script src="/js/apps.min.js"></script>      
        <script src="/plugins/DataTables/js/jquery.dataTables.js"></script>
        <script>

        $(document).ready(function() {
            App.init();
            $("#data-table").DataTable();
        });
        </script>
    @endsection