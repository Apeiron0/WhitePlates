@extends('index2')
    @section('styles2')
        <link href="/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
        <link href="/plugins/password-indicator/css/password-indicator.css" rel="stylesheet" />
        <link href="/plugins/DataTables/css/data-table.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="/plugins/bootstrap-datepicker/css/datepicker.css">
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
            <li><a href="javascript:;">Cuentas</a></li>
            <li><a href="javascript:;">Personal</a></li>
            <li class="active">Modficar</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Personal<small> Modificar</small></h1>
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
                        <h4 class="panel-title">Modificar Personal</h4>
                    </div>

                    <div class="panel-body">
                    <div class="alert alert-info fade in">
                            <i class="fa fa-info fa-2x pull-left"></i>
                            <p>Seleccione el registro para modificar persona</p>
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
                                        <th class="text-white"><small>FECHA DE NACIMIENTO</small></th>
                                        <th class="text-white"><small>TELEFONO</small></th>
                                    </tr>
                                </thead>
                                <tbody id="datos">
                                @foreach($personal as $persona)
                                    <tr class="gradeA">
                                        <td class="id">{{$persona->id}}</td>
                                        <td class="nombre">{{$persona->nombre}}</td>
                                        <td class="apaterno">{{$persona->apaterno}}</td>
                                        <td class="amaterno">{{$persona->amaterno}}</td>
                                        <td class="puesto">{{$persona->puesto->nombre}}</td>
                                        <td class="sexo">{{$persona->sexo}}</td>
                                        <td class="fechanac">{{$persona->fechanac}}</td>
                                        <td class="telefono">{{$persona->telefono}}</td>
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
                            <h4 class="modal-title">Modificar personal</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal form-bordered" id="frmPersonal" onsubmit="return false;">
                                <input type="hidden" class="form-control" name="personal_id">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Puesto</label>
                                    <div class="col-md-8">
                                        <select class="form-control" id="select" name="puesto_id">
                                            <option value="" selected="">Seleccionar Puesto</option>
                                            @foreach($puestos as $puesto)
                                                <option value="{{$puesto->id}}">{{$puesto->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nombre</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="nombre">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Apellido Paterno</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="apaterno">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Apellido Materno</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="amaterno">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Fecha de Nacimiento</label>
                                    <div class="col-md-6">
                                        <div class="input-group" id="fecha" >
                                            <input type="text" class="form-control input-append date" name="fechanac" placeholder="YYYY-MM-DD" >
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Telefono</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="telefono">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Sexo</label>
                                    <div class="col-md-5">
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
            $.fn.datepicker.dates['es'] = {
            days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Sunday"],
            daysShort: ["Dom", "Lu", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"],
            daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Fr", "Sa", "Do"],
            months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"],
            today: "Hoy",
            clear: "Clear"
            };
            /*$("#fecha").datepicker({autoclose:true,language: 'es',format:'yyyy-mm-dd',endDate:'2005-31-12'});*/
            $('#modal-usuario').on('hide.bs.modal', function (e) {
                frmPersonal.data('formValidation').resetForm();
                frmPersonal.each(function(){
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
                $("[name=personal_id]").val(dats[0]);
                $("[name=nombre]").val(dats[1]);
                $("[name=apaterno]").val(dats[2]);
                $("[name=amaterno]").val(dats[3]);
                $("[name=fechanac]").val(dats[6]);
                $("[name=telefono]").val(dats[7]);
                $("input[name=sexo][value=" +dats[5]+ "]").prop('checked', true);
                $("#select option:contains("+dats[4]+")").attr('selected', true);
                /*var customerId = $(this).find(".id").html();  */
               /* if(ban){
                    $("[name=personal_id]").val($(this).find(".id").html());
                    $("[name=nombre]").val($(this).find(".nombre").html());
                    $("[name=apaterno]").val($(this).find(".apaterno").html());
                    $("[name=amaterno]").val($(this).find(".amaterno").html());
                    $("[name=fechanac]").val($(this).find(".fechanac").html());
                    $("[name=telefono]").val($(this).find(".telefono").html());
                    
                    $("input[name=sexo][value=" + $(this).find(".sexo").html() + "]").prop('checked', true);
                    $("#select option:contains("+$(this).find(".puesto").html()+")").attr('selected', true);

                }else{
                    var index=$(this).index(".gradeA");
                    $("[name=personal_id]").val(arreglo[index].id);
                    $("[name=nombre]").val(arreglo[index].nombre);
                    $("[name=apaterno]").val(arreglo[index].apaterno);
                    $("[name=amaterno]").val(arreglo[index].amaterno);
                    $("[name=fechanac]").val(arreglo[index].fechanac);
                    $("[name=telefono]").val(arreglo[index].telefono);
                    
                    $("input[name=sexo][value=" + arreglo[index].sexo + "]").prop('checked', true);
                    $("#select option:contains("+arreglo[index].puesto.nombre+")").attr('selected', true);
                }
                */
                /*alert($("[name=personal_id]").val());*/
                $("#modal-usuario").modal('toggle');
            });
            var frmPersonal=$("#frmPersonal");
            $("#registrar").click(function(){
                frmPersonal.data('formValidation').validate();
                if(frmPersonal.data('formValidation').isValid()){
                    llamarajax(frmPersonal.serialize(), "/personal/modifcarpersonal", "JSON").success(function(data){
                        console.log(data.Personal);
                        if(data.Bandera){
                            ban=false;
                            cargartabla(data.Personal);
                            arreglo=data.Personal;
                            frmPersonal.data('formValidation').resetForm();
                            frmPersonal.each(function(){
                                this.reset();
                            });
                            toastr["success"]("Personal modificado exitosamente");
                            $("#modal-usuario").modal('toggle');
                            // $("#data-table").DataTable().fnDestroy();
                            // $("#data-table").DataTable();

                        }else{
                            toastr["error"](data.Codigo);
                        }
                    }).fail(function(datas){

                         toastr["error"](regresarajaxerrors(datas));
                    });

                }else{
                    var arrerr=frmPersonal.data('formValidation').getInvalidFields();
                    var inp=arrerr[0];
                    $(inp).focus();
                    toastr["error"]("Verificar campos");
                    
                }
            });
            function cargartabla(datos){
                    /*table.rows.remove();*/
                    table.clear().draw();
                    /*$("#data-table").rows.remove()*/
                    /*var renglon;
                    var row;*/
                    /*$("#datos").html(renglon);*/
                    var datasource=[
                    
                    ];
                    $.each(datos, function(index, val) {
                        /*datasource.push(''+val.id+'',''+val.nombre+'',''+val.apaterno+'',''+val.amaterno+'',''+val.puesto.nombre+'',''+val.sexo+'',''+val.fechanac+'',''+val.telefono+'')*/
                        /*datasource.push(val.id.toString(),val.nombre.toString(),val.apaterno.toString(),val.amaterno.toString(),val.puesto.nombre.toString(),val.sexo.toString(),val.fechanac.toString(),val.telefono.toString());*/
                        /*datasource.push(""+val.id+"",""+val.nombre+"",""+val.apaterno+"",""+val.materno+"",""+val.puesto.nombre+"",""+val.sexo+"",""+val.fechanac+"",""+val.telefono+"")*/
                        /*datasource.push([1,2,3,2,3,6,7,3])*/
                        datasource.push([val.id,val.nombre,val.apaterno,val.amaterno,val.puesto.nombre,val.sexo,val.fechanac,val.telefono])

                        /*console.log(datos);
                        renglon+='<tr class="gradeA">\
                        <td>'+val.id+'</td>\
                        <td>'+val.nombre+'</td>\
                        <td>'+val.apaterno+'</td>\
                        <td>'+val.amaterno+'</td>\
                        <td>'+val.puesto.nombre+'</td>\
                        <td>'+val.sexo+'</td>\
                        <td>'+val.fechanac+'</td>\
                        <td>'+val.telefono+'</td>\
                        </tr>';*/

                        /*table.row.add( [ 1, 2, 3, 4 ,1,2,5,6] ).draw();*/
                        
                    });
                    console.log(datasource)
                    /*$("#datos").html(renglon)4;*/
                    table.rows.add(datasource)
                        .draw()
                        .nodes()
                        .to$()
                        .addClass( 'gradeA' );
                   /* $('#data-table').dataTable( {
                        "createdRow": function ( row, data, index ) {
                            if ( data[5].replace(/[\$,]/g, '') * 1 > 150000 ) {
                                $('td', row).eq(5).addClass('highlight');
                            }
                        }
                    } );
*/
                    
                    
                }
             frmPersonal.formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                 // err: {
                    // You can set it to popover
                    // The message then will be shown in Bootstrap popover
                    // container: 'popover'
                // },
                // This option will not ignore invisible fields which belong to inactive panels
                exclude: ':disabled',
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
                                message: 'Formato incorrecto para fecha.',
                                min: '1900-12-31',
                                max: '2005-12-31'
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
           
        });
        //End document ready
        </script>
    @endsection