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
            <li><a href="javascript:;">Platillos</a></li>
            <li class="active">Listado</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Platillos<small> Listado</small></h1>
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
                        <h4 class="panel-title">Listado de platillos</h4>
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-info fade in">
                            <i class="fa fa-info fa-2x pull-left"></i>
                            <p>Listado global de todos los platillos</p>
                            <small>Para ver ingredientes da click en ver ingredientes!</small>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead class="bg-orange-lighter">
                                    <tr>
                                        <th class="text-white"><small>#PLATILLO</small></th>
                                        <th class="text-white"><small>NOMBRE</small></th>
                                        <th class="text-white"><small>CATEGORIA</small></th>
                                        <th class="text-white"><small>SUBCATEGORIA</small></th>
                                        <th class="text-white"><small>FECHA CREADO</small></th>
                                        <th class="text-white"><small>INGREDIENTES</small></th>
                                    </tr>
                                </thead>
                                <tbody id="datos">
                                @foreach($platillos as $platillo)
                                    <tr class="gradeA">
                                        <td class="id">{{$platillo->id}}</td>
                                        <td class="nombre">{{$platillo->nombre}}</td>
                                        <td class="apaterno">{{$platillo->subcategoria->categoria->nombre}}</td>
                                        <td class="amaterno">{{$platillo->subcategoria->nombre}}</td>
                                        <td class="amaterno">{{$platillo->created_at->format('d/m/Y')}}</td>
                                        
                                        <td class="amaterno"><a href="javascript:;" class="btn btningredi btn-info btn-xs btn-center m-r-5">Ver ingredientes</a></td>
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
            <div class="modal fade " id="modal-ingrediente" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" id="conte">
                    <!-- ... -->
                </div>
            </div>
        </div>
        <!-- end row -->

    @endsection
    @section('scripts2')
        <script src="/js/apps.min.js"></script>      
        <script src="/plugins/DataTables/js/jquery.dataTables.js"></script>
        <script>

        $(document).ready(function() {
            App.init();
            var table=$("#data-table").DataTable();
            $("#datos").on("click", ".btningredi", function(){
                var general=($(this).parent()).parent();
                var dats=table.row(general).data()
                console.log(dats[0])
                var data={id:dats[0]};
                llamarajax(data, "/gerente/ingredientes", "JSON").success(function(regresa){
                    $("#modal-ingrediente").modal('toggle');
                    var valor="";
                    if(regresa[0].ingredientes.length===0){
                        $("#conte").html('<div class="note note-warning">\
                                        <h4>¡Sin ingredientes!</h4>\
                                        <p>Este platillo no tiene ningún ingrediente.</p>\
                                        <a href="javascript:;" class="btn btn-sm btn-block btn-white" data-dismiss="modal">Cerrar</a></div>');
                    }
                    else{
                        $.each(regresa[0].ingredientes, function(index, val) {
                            valor+="<li>"+val.nombre+"</li>"
                         });

                        $("#conte").html('<div class="note note-info">\
                                        <h4>¡Listado de ingredientes!</h4>\
                                        <ul>'+valor+'</ul>\
                                        <a href="javascript:;" class="btn btn-block btn-sm bg-aqua-darker text-white" data-dismiss="modal">Cerrar</a></div>');
                        
                    }
                     

                });

            });
        });
        </script>
    @endsection