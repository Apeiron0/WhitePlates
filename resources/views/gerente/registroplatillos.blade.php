@extends('index2')
    @section('styles2')
    <link rel="stylesheet" type="text/css" href="/owns/jquery-multi-select/css/multi-select.css" />
    @endsection
    @section('content')
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Platillos</a></li>
            <li class="active">Registro</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Platillos<small> Registro</small></h1>
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
                        <h4 class="panel-title">Registro de platillos</h4>
                    </div>
                    <!-- end panel heading -->
                    <!-- start panel body -->
                    <div class="panel-body">
                        <form class="form-horizontal" id="frmPlatillo" onsubmit="return false;">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Selecciona categoria</label>
                                    <div class="col-xs-5">
                                        <select class="form-control" name="id_categoria">
                                            @foreach($categoriasplatillos as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Selecciona sub-categoria</label>
                                    <div class="col-xs-5">
                                        <select class="form-control" name="id_subcategoria">
                                            @foreach($subcategorias as $categoria)
                                                <option value="{{$categoria->id}}">"{{$categoria->nombre}}"</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Nombre del platillo</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control" name="nombre" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Precio</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control" name="precio" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Descripción</label>
                                    <div class="col-xs-5">
                                        <textarea class="form-control" style="resize:none" name="descripcion" placeholder="" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Seleccione ingredientes</label>
                                    <div class="col-md-5">
                                        <select multiple="multiple" class="multi-select" id="my_multi_select2" name="my_multi_select2[]">
                                            @foreach($categorias as $cat)
                                                <optgroup label="{{$cat->nombre}}">
                                                    @foreach($cat->ingredientes as $ingrediente )
                                                        <option value="{{$ingrediente->id}}">{{$ingrediente->nombre}}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                        <small>De click sobre un ingrediente de la lista izquierda para agregarlo al platillo, y click sobre uno de la tabla derecha para quitarlo del platillo.</small>
                                    </div>
                                </div>
                               
                            </fieldset>
                        </form>
                         <div class="row">
                            <div class="col-xs-4"></div>
                            <div class="col-xs-5">
                                <button id="btnRegistrarSub" class="btn btn-md btn-success btn-block m-r-5">Registrar</button>
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
        <script type="text/javascript" src="/owns/jquery-multi-select/js/jquery.multi-select.js"></script>
        <script>
        $(document).ready(function() {
            App.init();
            $("[name=id_categoria]").change(function(){
                var datos={id:$("[name=id_categoria]").val()};
                llamarajax(datos, "/gerente/traersubcategorias", "JSON").success(function(data){
                    console.log(data);
                    $("[name=id_subcategoria]").html("");
                      $.each(data.SubCategorias, function(index, val) {
                        $("[name=id_subcategoria]").append('<option value="'+val.id+'">"'+val.nombre+'"</option>');
                        console.log(val);
                      });
                });

            });
            var frmPlatillo=$('#frmPlatillo');
            $('#my_multi_select2').multiSelect({
                selectableOptgroup: true,
                onChange: function(element, checked) {
                    frmPlatillo.formValidation('revalidateField', 'my_multi_select2[]');

                    adjustByScrollHeight();
                },
                onDropdownShown: function(e) {
                    adjustByScrollHeight();
                },
                onDropdownHidden: function(e) {
                    adjustByHeight();
                }
            });
            frmPlatillo.formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    id_categoria:{
                        validators:{
                            notEmpty:{
                                message:'Categoria requerida.'
                            }
                        }
                    },
                    id_subcategoria:{
                        validators:{
                            notEmpty:{
                                message:'Subcategoria requerida.'
                            }
                        }
                    },
                    precio:{
                        validators:{
                            notEmpty:{
                                message:'Precio requerido.'
                            },
                            numeric:{
                                message:'Fomrato incorrecto para precio. Ej:0000'
                            }
                        }
                    },
                    descripcion:{
                        validators:{
                            stringLength: {
                                min: 4,
                                message: 'Minimo de caracteres 4.'
                            },
                        }
                    },
                    'my_multi_select2[]': {
                        validators: {
                            callback: {
                                message: 'Escoge al menos un ingrediente.',
                                callback: function(value, validator, $field) {
                                    // Get the selected options
                                    var options = validator.getFieldElements('my_multi_select2[]').val();
                                    return (options != null
                                            && options.length >= 1);
                                }
                            }
                        }
                    },
                    nombre: {
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Nombre de platillo requerido.'
                            },
                            stringLength: {
                                min: 4,
                                max: 60,
                                message: 'Rango de caracteres entre 4 y 60 como maximo.'
                            },
                            remote: {
                                url: '/gerente/countplatillo',
                                type: 'POST',
                                message:'Este platillo ya existe.'
                            }
                        }
                    }
                }
            });
            /*End validator*/
            $("#btnRegistrarSub").click(function(){
               
                frmPlatillo.data('formValidation').validate();
                if(frmPlatillo.data('formValidation').isValid()){
                    llamarajax(frmPlatillo.serialize(), "/gerente/registrarplatillo", "JSON").success(function(data){
                    
                        if(data.Bandera){
                            $('#my_multi_select2').multiSelect('deselect_all');
                            frmPlatillo.data('formValidation').resetForm();
                            frmPlatillo.each(function(){
                                this.reset();
                            });
                            

                            toastr["success"]("Platillo guardado exitosamente.");

                        }else{
                            
                        }
                    }).fail(function(datas){

                         toastr["error"](regresarajaxerrors(datas));
                    });

                }else{
                    var arrerr=frmPlatillo.data('formValidation').getInvalidFields();
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