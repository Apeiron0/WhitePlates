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
            <li><a href="javascript:;">Ingredientes</a></li>
            <li><a href="javascript:;">Categorias</a></li>
            <li class="active">Modficar</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Categorias<small> Modificar</small></h1>
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
                        <h4 class="panel-title">Modificar categoria</h4>
                    </div>
                    
                    <div class="panel-body">
                        <div class="alert alert-info fade in">
                            <i class="fa fa-info fa-2x pull-left"></i>
                            <p>Seleccione el registro para modificar categoria</p>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered table-hover">
                                <thead class="bg-orange-lighter">
                                    <tr>
                                        <th class="text-white"><small>#ID</small></th>
                                        <th class="text-white"><small>NOMBRE</small></th>
                                    </tr>
                                </thead>
                                <tbody id="datos">
                                @foreach($categorias as $categoria)
                                    <tr class="gradeA">
                                        <td class="id">{{$categoria->id}}</td>
                                        <td class="nombre">{{$categoria->nombre}}</td>
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
            <div class="modal fade " id="modal-usuario" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Modificar categoria</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal form-bordered" id="frmCategoria" onsubmit="return false;">
                                <input type="hidden" class="form-control" name="categoria_id">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nombre</label>
                                    <div class="col-md-5">
                                        <input type="password2" class="form-control" name="nombre">
                                    </div>
                                </div>
                            


                            </form>
                        
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cerrar</a>
                            <button id="registrar" class="btn btn-sm btn-success">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    @endsection
    @section('scripts2')
        <script src="/js/apps.min.js"></script>      
        <script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="/plugins/DataTables/js/jquery.dataTables.js"></script>
        <script src="/plugins/password-indicator/js/password-indicator.js"></script>
        
        
        <script>

        $(document).ready(function() {
            App.init();
            $('#modal-usuario').on('hide.bs.modal', function (e) {
                frmCategoria.data('formValidation').resetForm();
                frmCategoria.each(function(){
                    this.reset();
                });
            });
            var table=$("#data-table").DataTable();
            var ban=true;
            var arreglo=new Array();
            $("#datos").on("click", ".gradeA", function(e){
                 var dats=table.row( this ).data()
                console.log(dats);
                console.log(dats[0])
                $("[name=categoria_id]").val(dats[0]);
                $("[name=nombre]").val(dats[1]);
                /*var customerId = $(this).find(".id").html();  
                if(ban){
                    $("[name=categoria_id]").val(customerId);
                    $("[name=nombre]").val($(this).find(".nombre").html());
                }else{
                    var index=$(this).index(".gradeA");
                    $("[name=categoria_id]").val(arreglo[index].id);
                    $("[name=nombre]").val(arreglo[index].nombre);
                }*/
                
                // alert($("[name=categoria_id]").val());
                $("#modal-usuario").modal('toggle');
            });
            var frmCategoria=$("#frmCategoria");
            $("#registrar").click(function(){
                frmCategoria.data('formValidation').validate();
                if(frmCategoria.data('formValidation').isValid()){
                    llamarajax(frmCategoria.serialize(), "/gerente/modificarcategoriaingredi", "JSON").success(function(data){
                        if(data.Bandera){
                            ban=false;
                            cargartabla(data.Categorias);
                            arreglo=data.Categorias;
                            frmCategoria.data('formValidation').resetForm();
                            frmCategoria.each(function(){
                                this.reset();
                            });
                            toastr["success"]("La categoria se ha sido modificado exitosamente");
                            $("#modal-usuario").modal('toggle');

                        }else{
                            toastr["error"](data.Codigo);
                        }
                    }).fail(function(datas){

                         toastr["error"](regresarajaxerrors(datas));
                    });

                }else{
                    var arrerr=frmCategoria.data('formValidation').getInvalidFields();
                    var inp=arrerr[0];
                    $(inp).focus();
                    toastr["error"]("Verificar campos");
                    
                }
            });
            function cargartabla(datos,nombre){
                    /*$("#datos").html("");*/
                    var renglon;
                    table.clear().draw();
                    var datasource=[
                    
                    ];
                    $.each(datos, function(index, val) {
                        /*renglon+='<tr class="gradeA">\
                        <td>'+val.id+'</td>\
                        <td>'+val.nombre+'</td>\
                        </tr>';*/
                        datasource.push([val.id,val.nombre])
                    });
                    /*$("#datos").html(renglon);*/
                    table.rows.add(datasource)
                        .draw()
                        .nodes()
                        .to$()
                        .addClass( 'gradeA' );
                    
                }

             frmCategoria.formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                // This option will not ignore invisible fields which belong to inactive panels
                exclude: ':disabled',
                fields: {
                    nombre: {
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'El nombre de la categoria es requerido'
                            },
                            stringLength: {
                                min: 4,
                                max: 60,
                                message: 'La subcategoria tener un rango entre 4 y 60 caracteres como maximo'
                            },
                            remote: {
                                url: '/gerente/countcategoria',
                                type: 'POST',
                                message:'La categoria ya existe o es la misma que la seleccionada'
                            }
                        }
                    }
                }
            });
            /*End validate*/
           
        });
        //End document ready
        </script>
    @endsection