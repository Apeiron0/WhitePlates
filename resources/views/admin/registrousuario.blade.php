@extends('index2')
    @section('styles2')
        <link href="/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
        <link href="/plugins/password-indicator/css/password-indicator.css" rel="stylesheet" />
        <link href="/plugins/DataTables/css/data-table.css" rel="stylesheet" />
        <style type="text/css">
        #installationForm .tab-content {
            margin-top: 20px;
        }
        </style>
    @endsection
    @section('content')
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Cuenta</a></li>
            <li><a href="javascript:;">Usuario</a></li>
            <li class="active">Registrar</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Usuario<small> Registro</small></h1>
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
                        <h4 class="panel-title">Lstado de personal sin usuarios</h4>
                    </div>
                   
                    <div class="panel-body">
                        <div class="alert alert-info fade in">
                            <i class="fa fa-info fa-2x pull-left"></i>
                            <p>Seleccione el registro para agregar usuario</p>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered table-hover">
                                <thead class="bg-orange-lighter">
                                    <tr>
                                        <th class="text-white"><small>#EMPLEADO</small></th>
                                        <th class="text-white"><small>NOMBRE</small></th>
                                        <th class="text-white"><small>APELLIDO PATERNO</small></th>
                                        <th class="text-white"><small>APELLIDO MATERNO</small></th>
                                        <th class="text-white"><small>PUESTO</small></th>
                                        <th class="text-white"><small>SEXO</small></th>
                                    </tr>
                                </thead>
                                <tbody id="datos">
                                @foreach($personal as $persona)
                                    <tr class="gradeA">
                                        <td class="id">{{$persona->id}}</td>
                                        <td>{{$persona->nombre}}</td>
                                        <td>{{$persona->apaterno}}</td>
                                        <td>{{$persona->amaterno}}</td>
                                        <td>{{$persona->puesto->nombre}}</td>
                                        <td>{{$persona->sexo}}</td>
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
                            <h4 class="modal-title">Registro de usuario</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal form-bordered" id="frmUsuario" onsubmit="return false;">
                                <input type="hidden" class="form-control" name="personal_id">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Rol</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="roles_id">
                                            <option value="" selected="">Seleccionar Rol</option>
                                            @foreach($roles as $rol)
                                                <option value="{{$rol->id}}">{{$rol->tipo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nombre de usuario</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                </div>
                              <div class="form-group">
                                    <label class="col-md-4 control-label">Contraseña</label>
                                    <div class="col-md-8">
                                        <input type="password" name="password" id="password-indicator-default" class="form-control m-b-5" />
                                        <div id="passwordStrengthDiv" class="is0 m-t-5"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Confirmar contraseña</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="password2">
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
        <script src="/plugins/DataTables/js/jquery.dataTables.js"></script>
        <script src="/plugins/password-indicator/js/password-indicator.js"></script>
        
        <script>

        $(document).ready(function() {
            App.init();
            $("#password-indicator-default").passwordStrength();
            $("#data-table").DataTable();
            var ban=true;
            var arreglo=new Array();
            $("#datos").on("click", ".gradeA", function(e){
                var customerId = $(this).find(".id").html();  
                if(ban){
                    $("[name=personal_id]").val($(this).find(".id").html());
                }else{
                    var index=$(this).index(".gradeA");
                    $("[name=personal_id]").val(arreglo[index].id);
                }
                
                /*alert($("[name=personal_id]").val());*/
                $("#modal-usuario").modal('toggle');
            });
            $('#modal-usuario').on('hide.bs.modal', function (e) {
                frmUser.data('formValidation').resetForm();
                frmUser.each(function(){
                    this.reset();
                });
            });
            var frmUser=$("#frmUsuario");
            $("#registrar").click(function(){
                frmUser.data('formValidation').validate();
                if(frmUser.data('formValidation').isValid()){
                    llamarajax(frmUser.serialize(), "/usuarios/registrar", "JSON").success(function(data){
                        console.log(data);
                        if(data.Bandera){
                            ban=false;
                            cargartabla(data.Personal);
                            arreglo=data.Personal;
                            frmUser.data('formValidation').resetForm();
                            frmUser.each(function(){
                                this.reset();
                            });
                            toastr["success"]("Usuario guardado exitosamente");
                            $("#modal-usuario").modal('toggle');

                        }else{
                            console.log(data);
                        }
                    }).fail(function(datas){

                         toastr["error"](regresarajaxerrors(datas));
                    });

                }else{
                    var arrerr=frmUser.data('formValidation').getInvalidFields();
                    var inp=arrerr[0];
                    $(inp).focus();
                    toastr["error"]("Verificar campos");
                    
                }
            });
            function cargartabla(datos){
                    $("#datos").html("");
                    var renglon;
                    $.each(datos, function(index, val) {
                        console.log(datos);
                        renglon+='<tr class="gradeA">\
                        <td>'+val.id+'</td>\
                        <td>'+val.nombre+'</td>\
                        <td>'+val.apaterno+'</td>\
                        <td>'+val.amaterno+'</td>\
                        <td>'+val.puesto.nombre+'</td>\
                        <td>'+val.sexo+'</td>\
                        </tr>';
                    });
                    $("#datos").html(renglon);
                    
                }
             frmUser.formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                // This option will not ignore invisible fields which belong to inactive panels
                exclude: ':disabled',
                fields: {
                    roles_id:{
                        validators:{
                            notEmpty:{
                                message:'Rol requerido.'
                            }
                        }
                    },
                    username: {
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Nombre requerido.'
                            },
                            stringLength: {
                                min: 4,
                                max: 60,
                                message: 'Rango de caracteres entre 4 y 60 como maximo.'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9-_\.]+$/,
                                message: 'Caracteres permitidos: A - Z, a - z, 0 - 9, guion medio y guion bajo.'
                            },
                            // Place the remote validator in the last
                            remote: {
                                url: '/usuarios/nomusuario',
                                type: 'POST',
                                message:'Este usuario ya existe.'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Contraseña requerida.'
                            },
                            identical: {
                                field: 'password2',
                                message: 'Las contraseñas no coinciden.'
                            }
                        }
                    },
                    password2: {
                        validators: {
                            notEmpty: {
                                message: 'Contraseña de confirmacion requerida.'
                            },
                            identical: {
                                field: 'password',
                                message: 'Las contraseñas no coinciden.'
                            }
                        }
                    }
                }
            });
           
        });
        //End document ready
        </script>
    @endsection