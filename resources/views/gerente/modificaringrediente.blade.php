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
            <li><a href="javascript:;">Ingredientes</a></li>
            <li class="active">Modficar</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Ingredientes<small> Modificar</small></h1>
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
                        <h4 class="panel-title">Modificar ingrediente</h4>
                    </div>
                    
                    <div class="panel-body">
                        <div class="alert alert-info fade in">
                            <i class="fa fa-info fa-2x pull-left"></i>
                            <p>Seleccione el ingrediente para modificar.</p>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered table-hover">
                                <thead class="bg-orange-lighter">
                                    <tr>
                                        <th class="text-white"><small>#ID</small></th>
                                        <th class="text-white"><small>NOMBRE</small></th>
                                        <th class="text-white"><small>CATEGORIA</small></th>
                                    </tr>
                                </thead>
                                <tbody id="datos">
                                @foreach($ingredientes as $ingrediente)
                                    <tr class="gradeA">
                                        <td class="id">{{$ingrediente->id}}</td>
                                        <td class="nombre">{{$ingrediente->nombre}}</td>
                                        <td class="categoria">{{$ingrediente->categoria->nombre}}</td>
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
                            <h4 class="modal-title">Modificar ingrediente</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal form-bordered" id="frmIngrediente" onsubmit="return false;">
                                <input type="hidden" class="form-control" name="ingrediente_id">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Categoria</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="select" name="categoria_id">
                                            <option value="" selected="">Seleccionar categoria</option>
                                            @foreach($categorias as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">¿Desea modificar nombre?</label>
                                    <div class="col-md-4">
                                        <label class="radio-inline">
                                            <input type="radio" name="nosino" id="rbdsi" value="Si" checked >
                                            Si
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="nosino" value="No">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nombre</label>
                                    <div class="col-md-6">
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
        
        
        
        <script>

        $(document).ready(function() {
            App.init();
            $('#modal-usuario').on('hide.bs.modal', function (e) {
                frmIngrediente.data('formValidation').resetForm();
                frmIngrediente.each(function(){
                    this.reset();
                });
                frmIngrediente.formValidation('revalidateField', 'nosino');
                $('#rbdsi').click()
                $("[name=nombre]").attr('disabled',false);
            });
            $("[name=nosino]").click(function(){
                
                switch($('input[name="nosino"]:checked').val()){
                  case"Si":
                  $("[name=nombre]").attr('disabled',false);
                  break;
                  case"No":
                  frmIngrediente.formValidation('revalidateField', 'nombre');
                  $("[name=nombre]").attr('disabled',true);
                  
                  break;
                };
            });
            var table=$("#data-table").DataTable();
            var ban=true;
            var arreglo=new Array();
            $("#datos").on("click", ".gradeA", function(e){
                var dats=table.row( this ).data()
                console.log(dats);
                console.log(dats[0])
                $("[name=ingrediente_id]").val(dats[0]);
                $("[name=nombre]").val(dats[1]);
                $("#select option:contains("+dats[2]+")").attr('selected', true);

                /*var customerId = $(this).find(".id").html();  
                if(ban){
                    $("[name=ingrediente_id]").val(customerId);
                    $("[name=nombre]").val($(this).find(".nombre").html());
                    $("#select option:contains("+$(this).find(".categoria").html()+")").attr('selected', true);

                }else{
                    var index=$(this).index(".gradeA");
                    $("[name=ingrediente_id]").val(arreglo[index].id);
                    $("#select option:contains("+arreglo[index].categoria.nombre+")").attr('selected', true);
                    $("[name=nombre]").val(arreglo[index].nombre);
                }*/
                
                // alert($("[name=ingrediente_id]").val());
                $("#modal-usuario").modal('toggle');
            });
            var frmIngrediente=$("#frmIngrediente");
            $("#registrar").click(function(){
                frmIngrediente.data('formValidation').validate();
                if(frmIngrediente.data('formValidation').isValid()){
                    llamarajax(frmIngrediente.serialize(), "/gerente/modificaringrediente", "JSON").success(function(data){
                        console.log(data.Users);
                        if(data.Bandera){
                            ban=false;
                            cargartabla(data.Ingredientes);
                            arreglo=data.Ingredientes;
                            frmIngrediente.data('formValidation').resetForm();
                            frmIngrediente.each(function(){
                                this.reset();
                            });

                            toastr["success"]("Ingrediente modificado exitosamente");
                            $("[name=nombre]").attr('disabled',false);
                            $("#modal-usuario").modal('toggle');

                        }else{
                            toastr["error"](data.Codigo);
                        }
                    }).fail(function(datas){

                         toastr["error"](regresarajaxerrors(datas));
                    });

                }else{
                    var arrerr=frmIngrediente.data('formValidation').getInvalidFields();
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
                        renglon+='<tr class="gradeA">\
                        <td>'+val.id+'</td>\
                        <td>'+val.nombre+'</td>\
                        <td>'+val.categoria.nombre+'</td>\
                        </tr>';
                        datasource.push([val.id,val.nombre,val.categoria.nombre]);
                    });
                    table.rows.add(datasource)
                        .draw()
                        .nodes()
                        .to$()
                        .addClass( 'gradeA' );
                    /*$("#datos").html(renglon);*/
                    
                }

             frmIngrediente.formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                // This option will not ignore invisible fields which belong to inactive panels
                fields: {
                    categoria_id:{
                        validators:{
                            notEmpty:{
                                message:'Categoria requerida.'
                            }
                        }
                    },
                    nombre: {

                        validators: {
                            stringLength: {
                                min: 4,
                                max: 60,
                                message: 'Rango de caracteres entre 4 y 60 como maximo.'
                            },
                            remote: {
                                url: '/gerente/countingrediente',
                                type: 'POST',
                                message:'Este ingrediente ya existe.'
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