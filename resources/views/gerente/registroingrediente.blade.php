@extends('index2')
    @section('styles2')
    @endsection
    @section('content')
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Ingredientes</a></li>
            <li><a href="javascript:;">Ingredientes</a></li>
            <li class="active">Registro</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Ingrediente<small> Registro</small></h1>
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
                        <h4 class="panel-title">Registro de ingredientes</h4>
                    </div>
                    <!-- end panel heading -->
                    <!-- start panel body -->
                    <div class="panel-body">
                        <form class="form-horizontal" id="frmIngrediente" onsubmit="return false;">
                            <fieldset>
                              <div class="form-group">
                                    <label class="col-xs-4 control-label">Selecciona la categoria</label>
                                    <div class="col-xs-5">
                                        <select class="form-control" name="idcategoriaingrediente">
                                        <option value="">Seleccione una opción</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>}
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Nombre del ingrediente</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control" name="nombre" />
                                    </div>
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
        <script>
        $(document).ready(function() {
            App.init();
            var frmIngrediente=$('#frmIngrediente');
            frmIngrediente.formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    idcategoriaingrediente:{
                        validators:{
                            notEmpty:{
                                message:'Categoria requerida.'
                            }
                        }
                    },
                    nombre: {
                        required:false,
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Nombre de ingrediente requerido.'
                            },
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
                    },
                }
            });
            /*End validator*/
            $("#btnRegistrarSub").click(function(){
                frmIngrediente.data('formValidation').validate();
                if(frmIngrediente.data('formValidation').isValid()){
                    llamarajax(frmIngrediente.serialize(), "/gerente/registraringrediente", "JSON").success(function(data){
                        console.log(data);
                        if(data.Bandera){
                            frmIngrediente.data('formValidation').resetForm();
                            frmIngrediente.each(function(){
                                this.reset();
                            });
                            toastr["success"]("Ingrediente guardado exitosamente");

                        }else{
                            console.log(data);
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
            /*end click*/
        });
        //End document ready
        </script>
    @endsection