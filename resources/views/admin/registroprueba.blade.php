@extends('index2')
    @section('styles2')
        <link href="/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
        <link href="/plugins/password-indicator/css/password-indicator.css" rel="stylesheet" />
        <style type="text/css">
        #installationForm .tab-content {
            margin-top: 20px;
        }
        </style>
    @endsection
    @section('content')
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Usuarios</a></li>
            <li class="active">Registro</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Usuarios<small> Registro</small></h1>
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
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Registro Usuarios</h4>
                    </div>
                    <div class="panel-body">
                        <form id="installationForm" class="form-horizontal form-bordered">
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#basic-tab" data-toggle="tab">Información Personal</a></li>
                                <li><a href="#database-tab" data-toggle="tab">Otra Información</a></li>
                            </ul>

                            <div class="tab-content">
                                <!-- First tab -->
                                <div class="tab-pane active" id="basic-tab">
                                    <div class="form-group">
                                        <label class="col-xs-3 control-label">Nombre</label>
                                        <div class="col-xs-5">
                                            <input type="text" class="form-control" name="nombre" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-xs-3 control-label">Apellido Paterno</label>
                                        <div class="col-xs-5">
                                            <input type="text" class="form-control" name="apaterno" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-xs-3 control-label">Apellido Materno</label>
                                        <div class="col-xs-5">
                                            <input type="text" class="form-control" name="amaterno" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-xs-3 control-label">Fecha de Nacimiento</label>
                                        <div class="col-xs-5">
                                            <input type="text" class="form-control" id="datepicker-autoClose" placeholder="DD/MM/YYYY" name="fechanac" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Sexo</label>
                                        <div class="col-md-3">
                                            <label class="radio-inline">
                                                <input type="radio" name="optionSexo" value="1" >
                                                Masculino
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionSexo" value="0">
                                                Femenino
                                            </label>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-xs-3 control-label">Telefono</label>
                                        <div class="col-xs-4">
                                            <input type="text" class="form-control" name="telefono" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Second tab -->
                                <div class="tab-pane" id="database-tab">
                                    <div class="form-group">
                                        <label class="col-xs-3 control-label">Selecciona el rol</label>
                                        <div class="col-xs-5">
                                            <select class="form-control" name="roles_id">
                                            <option value="">Selecciona un rol</option>
                                                @foreach ($roles as $rol)
                                                    <option value="{{ $rol->id }}">{{ $rol->tipo }}</option>}
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">¿Desea registrar usuario?</label>
                                        <div class="col-md-9">
                                            <label class="radio-inline">
                                                <input type="radio" name="optionUsu" value="1" checked="true" id="rsbu1">
                                                Si
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionUsu" value="0" id="rsbu2">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-xs-3 control-label">Nombre de Usuario</label>
                                        <div class="col-xs-5">
                                            <input type="text" class="form-control" name="nombreusuario"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-3 control-label">Contraseña</label>
                                        <div class="col-xs-5">
                                            <input type="password" name="pass" id="password-indicator-default" class="form-control m-b-5" />
                                            <div id="passwordStrengthDiv" class="is0 m-t-5"></div>
                                        </div>
                                    </div>
                                      <div class="form-group">
                                        <label class="col-xs-3 control-label">Confirmar contraseña</label>
                                        <div class="col-xs-5">
                                            <input type="password" name="passconfirm" class="form-control m-b-5" />
                                        </div>
                                    </div>
                                    <div class="form-group"  id="failError">
                                        
                                    </div>

                                  

                                   
                                </div>

                                <!-- Previous/Next buttons -->
                                <ul class="pager wizard">
                                    <li class="previous"><a href="javascript: void(0);">Anterior</a></li>
                                    <li class="next"><a href="javascript: void(0);">Siguiente</a></li>
                                </ul>
                            </div>
                        </form>

                        <div class="modal fade" id="completeModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Complete</h4>
                                    </div>

                                    <div class="modal-body">
                                        <p class="text-center">The installation is completed</p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Visit the website</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <script src="/owns/jquery.bootstrap.wizard.js"></script>
        <script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="/plugins/password-indicator/js/password-indicator.js"></script>
        <script src="/owns/admin/registrousuarios.js"></script>
        
    @endsection