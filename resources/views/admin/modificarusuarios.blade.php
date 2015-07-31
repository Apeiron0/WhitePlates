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
            <li class="active">Modficar</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Usuario<small> Modificar</small></h1>
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
                        <h4 class="panel-title">Listado de usuarios</h4>
                    </div>
                    
                    <div class="panel-body">
                        <div class="alert alert-info fade in">
                            <i class="fa fa-info fa-2x pull-left"></i>
                            <p>Seleccione el registro para modificar usuario</p>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered table-hover">
                                <thead class="bg-orange-lighter">
                                    <tr>
                                        <th class="text-white"><small>#USUARIO</small></th>
                                        <th class="text-white"><small>NOMBRE DE USUARIO</small></th>
                                        <th class="text-white"><small>ROL</small></th>
                                        <th class="text-white"><small>ESTADO DE USUARIO</small></th>
                                        <th class="text-white"><small>NOMBRE</small></th>
                                        <th class="text-white"><small>APELLIDO PATERNO</small></th>
                                        <th class="text-white"><small>APELLIDO MATERNO</small></th>
                                        <th class="text-white"><small>SEXO</small></th>
                                    </tr>
                                </thead>
                                <tbody id="datos">
                                @foreach($users as $user)
                                    @if($user->username!=Auth::user()->username)
                                        <tr class="gradeA">
                                            <td class="id">{{$user->id}}</td>
                                            <td class="username">{{$user->username}}</td>
                                            <td class="rol">{{$user->rol->tipo}}</td>
                                            @if($user->active==1)
                                                <td class="activ">Activo</td>
                                            @else
                                                <td class="activ">Inactivo</td>
                                            @endif
                                            <td>{{$user->personal->nombre}}</td>
                                            <td>{{$user->personal->apaterno}}</td>
                                            <td>{{$user->personal->amaterno}}</td>
                                            <td>{{$user->personal->sexo}}</td>
                                        </tr>
                                     @endif
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
                            <h4 class="modal-title">Modificar usuario</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal form-bordered" id="frmUsuario" onsubmit="return false;">
                                <input type="hidden" class="form-control" name="user_id">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Rol</label>
                                    <div class="col-md-8">
                                        <select class="form-control" id="select" name="roles_id">
                                            <option value="" selected="">Seleccionar Puesto</option>
                                            @foreach($roles as $rol)
                                                <option value="{{$rol->id}}">{{$rol->tipo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Estado de usuario</label>
                                    <div class="col-md-4">
                                        <label class="radio-inline">
                                            <input type="radio" name="active" value="1" >
                                            Activo
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="active" value="0">
                                            Inactivo
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Contraseña <br><small>Solo si desea modificarla</small></label>
                                    <div class="col-md-8">
                                        <input type="password" name="password" id="password-indicator-default" class="form-control m-b-5" />
                                        <div id="passwordStrengthDiv" class="is0 m-t-5"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Confirmar contraseña</label>
                                    <div class="col-md-8">
                                        <input type="password2" class="form-control" name="password2">
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
            $("#password-indicator-default").passwordStrength();
            $('#modal-usuario').on('hide.bs.modal', function (e) {
                frmUsuario.data('formValidation').resetForm();
                frmUsuario.each(function(){
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
                if(dats[3]==="Activo")
                        $("input[name=active][value=1]").prop('checked', true);
                    else
                        $("input[name=active][value=0]").prop('checked', true);
                    $("[name=user_id]").val(dats[0]);
                    $("#select option:contains("+dats[2]+")").attr('selected', true);
               /* var customerId = $(this).find(".id").html();  
                if(ban){
                    if($(this).find(".activ").html()==="Activo")
                        $("input[name=active][value=1]").prop('checked', true);
                    else
                        $("input[name=active][value=0]").prop('checked', true);
                    $("[name=user_id]").val(customerId);
                    $("#select option:contains("+$(this).find(".rol").html()+")").attr('selected', true);

                }else{
                    var index=$(this).index(".gradeA");
                    $("[name=user_id]").val(arreglo[index].id);
                    if(arreglo[index].active===1)
                        $("input[name=active][value=1]").prop('checked', true);
                    else
                        $("input[name=active][value=0]").prop('checked', true);
                    $("#select option:contains("+arreglo[index].rol.tipo+")").attr('selected', true);
                }*/
                
                // alert($("[name=user_id]").val());
                $("#modal-usuario").modal('toggle');
            });
            var frmUsuario=$("#frmUsuario");
            $("#registrar").click(function(){
                frmUsuario.data('formValidation').validate();
                if(frmUsuario.data('formValidation').isValid()){
                    llamarajax(frmUsuario.serialize(), "/usuarios/modificar", "JSON").success(function(data){
                        console.log(data.Users);
                        if(data.Bandera){
                            ban=false;
                            cargartabla(data.Users,data.Nombre);
                            arreglo=data.Users;
                            frmUsuario.data('formValidation').resetForm();
                            frmUsuario.each(function(){
                                this.reset();
                            });
                            toastr["success"]("Usuario modificado exitosamente");
                            $("#modal-usuario").modal('toggle');

                        }else{
                            toastr["error"](data.Codigo);
                        }
                    }).fail(function(datas){

                         toastr["error"](regresarajaxerrors(datas));
                    });

                }else{
                    var arrerr=frmUsuario.data('formValidation').getInvalidFields();
                    var inp=arrerr[0];
                    $(inp).focus();
                    toastr["error"]("Verificar campos");
                    
                }
            });
            function cargartabla(datos,nombre){
                    var renglon;
                    table.clear().draw();
                    var datasource=[
                    
                    ];
                    $.each(datos, function(index, val) {
                        if(val.username!=nombre)
                        {
                            var activ="";
                        if(val.active===1)
                            activ="Activo"
                        else
                            activ="Inactivo"
                        console.log(val)
                        datasource.push([val.id,val.username,val.rol.tipo,activ,val.personal.nombre,val.personal.apaterno,val.personal.amaterno,val.personal.sexo])
                        /*renglon+='<tr class="gradeA">\
                        <td>'+val.id+'</td>\
                        <td>'+val.username+'</td>\
                        <td>'+val.rol.tipo+'</td>\
                        <td>'+activ+'</td>\
                        <td>'+val.personal.nombre+'</td>\
                        <td>'+val.personal.apaterno+'</td>\
                        <td>'+val.personal.amaterno+'</td>\
                        <td>'+val.sexo+'</td>\
                        </tr>';*/
                        }
                    });
                        table.rows.add(datasource)
                        .draw()
                        .nodes()
                        .to$()
                        .addClass( 'gradeA' );
                    /*$("#datos").html(renglon);*/
                    
                }

             frmUsuario.formValidation({
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
                    active:{
                        validators:{
                            notEmpty:{
                                message:'Estado de usuario requerido.'
                            }
                        }
                    },
                    password: {
                        validators: {
                            identical: {
                                field: 'password2',
                                message: 'Las contraseñas no coinciden.'
                            }
                        }
                    },
                    password2: {
                        validators: {
                            identical: {
                                field: 'password',
                                message: 'Las contraseñas no coinciden.'
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