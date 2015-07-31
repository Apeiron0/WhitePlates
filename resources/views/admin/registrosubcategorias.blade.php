@extends('index2')
    @section('styles2')
    @endsection
    @section('content')
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Platillo</a></li>
            <li><a href="javascript:;">Sub-categoria</a></li>
            <li class="active">Registro</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Sub-categoria<small> Registro</small></h1>
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
                        <h4 class="panel-title">Registro sub-categoria</h4>
                    </div>
                    <!-- end panel heading -->
                    <!-- start panel body -->
                    <div class="panel-body">
                        <form class="form-horizontal" id="formSub" onsubmit="return false;">
                            <fieldset>
                                <legend>Nueva sub-categoria</legend>
                                 <div class="form-group">
                                    <label class="col-xs-4 control-label">Seleccione categoria</label>
                                    <div class="col-xs-5">
                                        <select class="form-control" name="idcategoria">
                                        <option value="">Seleccione una opción</option>
                                        option
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>}
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Nombre de sub-categoria</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control" name="nombre" />
                                    </div>
                                </div>
                                <div class="form-group" id="errors">
                                    
                                </div>                               
                            </fieldset>
                        </form>
                        <div class="row">
                            <div class="col-xs-4"></div>
                            <div class="col-xs-5">
                                <button id="btnRegistrarSub" class="btn btn-block btn-md btn-primary m-r-5">Registrar</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        
                    </div>
                    <!-- end panel body -->
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-12 -->
        </div>
        <!-- end row -->
    @endsection
    @section('scripts2')
        <script src="/js/apps.min.js"></script>
        <script src="/owns/admin/registrosubcategorias.js"></script>
    @endsection