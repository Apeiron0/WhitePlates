@extends('index2')
    @section('styles2')
        <link href="/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
        <link href="/plugins/password-indicator/css/password-indicator.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="\plugins\bootstrap-datepicker\css\datepicker.css">
        <style type="text/css">
        #installationForm .tab-content {
            margin-top: 20px;
        }
        </style>
    @endsection
    @section('content')
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Cuentas</a></li>
            <li><a href="javascript:;">Personal</a></li>
            <li class="active">Registro</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Personal<small> Registro</small></h1>
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
                        <h4 class="panel-title">Registro personal</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal form-bordered" id="frmPersonal" onsubmit="return false;">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Puesto</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="puesto_id">
                                            <option value="" selected="">Seleccionar puesto</option>
                                            @foreach($puestos as $puesto)
                                                <option value="{{$puesto->id}}">{{$puesto->nombre}}</option>
                                            @endforeach

                                            
                                        </select>
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nombre(s)</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="nombre">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Apellido Paterno</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="apaterno">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Apellido Materno</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="amaterno">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Fecha de Nacimiento</label>
                                    <div class="col-md-4">
                                        <div class="input-group date" id="fechanac" >
                                            <input type="text" class="form-control" name="fechanac" >
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Telefono</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="telefono">
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-4 control-label">Sexo</label>
                                        <div class="col-md-3">
                                            <label class="radio-inline">
                                                <input type="radio" name="sexo" value="M" >
                                                Masculino
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sexo" value="F">
                                                Femenino
                                            </label>
                                        </div>
                                    </div>
                            


                            </form>
                            <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-5">
                                <button id="btnRegistrar" class="btn btn-md btn-success btn-block">Registrar</button>
                            </div>
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
        <script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script>
        
        $(document).ready(function() {
            App.init();
            $.fn.datepicker.dates['es'] = {
            days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Sunday"],
            daysShort: ["Dom", "Lu", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"],
            daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
            months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"],
            today: "Hoy",
            clear: "Clear"
            };
            
            $("#fechanac").datepicker({
                autoclose:true,
                language: 'es',
                format:'yyyy-mm-dd',
                endDate:'2005-31-12'}).on('changeDate', function(e) {
                    // Revalidate the date field
                    frmPersonal.formValidation('revalidateField', 'fechanac');
                });
            $('#fechanac').change(function () {
                frmPersonal.formValidation('validateField', $("[name=fechanac]"));

            });
            var frmPersonal=$("#frmPersonal");
            frmPersonal.formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                 /*err: {
                    // You can set it to popover
                    // The message then will be shown in Bootstrap popover
                    container: 'tooltip'
                },*/
                // This option will not ignore invisible fields which belong to inactive panels
                
                fields: {
                    nombre: {
                        validators: {
                            notEmpty: {
                                message: 'Nombre requerido.'
                            },
                            stringLength: {
                                min: 3,
                                max: 80,
                                message: 'Rango de caracteres entre 3 y 80 como maximo.'
                            }
                        }
                    },
                    apaterno: {
                        validators: {
                            notEmpty: {
                                message: 'Apellido paterno requerido.'
                            },
                            stringLength: {
                                min: 3,
                                max: 80,
                                message: 'Rango de caracteres entre 3 y 80 como maximo.'
                            }
                        }
                    },
                    amaterno: {
                        validators: {
                            notEmpty: {
                                message: 'Apellido materno requerido.'
                            }
                        },
                        stringLength: {
                                min: 5,
                                max: 80,
                                message: 'Rango de caracteres entre 5 y 80 como maximo.'
                            }
                    },
                    fechanac: {
                        validators: {
                            notEmpty:{
                                message:'Fecha de nacimiento requerida.'

                            },
                            date: {
                                format: 'YYYY-MM-DD',
                                message: 'Formato incorrecto para fecha.'
                            }
                        }
                    },
                    sexo:{
                        validators:{
                            notEmpty:{
                                message:'Sexo requerido.'
                            }
                        }
                    },
                    puesto:{
                        validators:{
                            notEmpty:{
                                message:'Puesto requerido.'
                            }
                        }
                    },
                    telefono:{
                        validators:{
                            notEmpty:{
                                message:'Telefono requerido.'
                            },
                            stringLength:{
                                min: 7,
                                max: 35,
                                message: 'Rango de caracteres entre 7 y 35 como maximo. Ej:8711234567'
                            },
                            integer:{
                                message:"Formato incorrecto para telefono. Ej:8711234567"

                            }
                        }
                    },
                    puesto_id:{
                        validators:{
                            notEmpty:{
                                message:'Rol requerido.'
                            }
                        }

                    }
                }
            });
            /*End validate*/
            /*click start*/
            $("#btnRegistrar").click(function(){
                frmPersonal.data('formValidation').validate();
                if(frmPersonal.data('formValidation').isValid()){
                    llamarajax(frmPersonal.serialize(), "/personal/registrarpersonal", "JSON").success(function(data){
                        console.log(data);
                        if(data.Bandera){
                            frmPersonal.data('formValidation').resetForm();
                            frmPersonal.each(function(){
                                this.reset();
                            })
                            toastr["success"]("Personal guardado exitosamente");


                        }else{
                            toastr["error"](data.Codigo);
                        }
                    }).error(function(data){
                        toastr["error"](regresarajaxerrors(data));
                    });

                }else{
                    var arrerr=frmPersonal.data('formValidation').getInvalidFields();
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