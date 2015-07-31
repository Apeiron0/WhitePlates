@extends('index2')
	@section('styles2')
		<link href="/plugins/DataTables/css/data-table.css" rel="stylesheet" />
        <script src="/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
		<link href="/css/styleWP1.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="\plugins\bootstrap-datepicker\css\datepicker.css">
        <link href="/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
	@endsection
	@section('content')
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li><a href="javascript:;">Reportes</a></li>
			<li class="active">Cantidades platillos</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Cantidades<small> platillos</small></h1>
		<!-- end page-header -->

		<!-- begin row -->
		<div class="row">
		    <!-- begin col-6 -->
		    <div class="col-md-12">
		        <div class="panel-group" id="accordion">
                    <div class="panel panel-inverse overflow-hidden">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <i class="fa fa-plus-circle pull-right"></i> 
                                    Estadisticas
                                </a>
                            </h3>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <!-- |####################| Panel-body |####################| -->
                                <form class="form-horizontal form-bordered" id="frmFecha">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Seleccione rango</label>
                                        <div class="col-md-8">

                                            <div class="input-group input-daterange">
                                                <input type="text" class="form-control" name="start" placeholder="Fecha Inicio" />
                                                <span class="input-group-addon">a</span>
                                                <input type="text" class="form-control" name="end" placeholder="Fecha Termino" />
                                            </div>
                                        </div>
                                    </div>
                                </form><br>
                               <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-3">
                                        <button id="btnGenerar" class="btn  btn-success btn-block">Generar</button>
                                    </div>
                                </div>
                                <br>
                            <div id="results">
                                <div class="note note-info">
                                    <h4>¡Seleccione el rango de la grafica!</h4>
                                    <p>
                                    Cuando lo seleccione de click en generar.</p>
                                </div>
                            </div>
                            {{-- Grafica end --}}
                                <!-- |######################################################| -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end row -->
	@endsection
	@section('scripts2')
		<script src="/plugins/DataTables/js/jquery.dataTables.js"></script>
        <script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script>
		$(document).ready(function() {
			App.init();
            var frmFecha=$("#frmFecha");
            $("#btnGenerar").click(function(){
                
                frmFecha.data('formValidation').validate();
                if(frmFecha.data('formValidation').isValid()){
                    loadtable()
                }
                else{
                    var arrerr=frmFecha.data('formValidation').getInvalidFields();
                    var inp=arrerr[0];
                    $(inp).focus();
                    toastr["error"]("Verificar campos");
                }
                    
            });
            
          
            $(".input-daterange").datepicker({autoclose:true,todayHighlight:true,format:'yyyy-mm-dd'}).on('changeDate', function(e) {
                    // Revalidate the date field
                    
                    frmFecha.formValidation('revalidateField', 'start');
                });
            $("#datepicker-disabled-past").datepicker({autoclose:true,todayHighlight:true,format:'yyyy-mm-dd'}).on('changeDate', function(e) {
                    // Revalidate the date field
                    
                    frmFecha.formValidation('revalidateField', 'end');
                });
            function loadchart(){
                $('#container').highcharts({
                    chart: {

                        type: 'column',
                        margin: 100,
                        spacingBottom: 300,
                        options3d: {
                            enabled: true,
                            alpha: 10,
                            beta: 25,
                            depth: 70
                        }
                    },
                     colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
                    title: {
                        text: 'Platillos'
                    },
                    subtitle: {
                        text: 'Cantidad de platillos vendidos'
                    },
                    plotOptions: {
                        column: {
                            depth: 25,
                            colorByPoint: true
                        }
                    },
                    xAxis: {
                          y: 100,
                        categories:[]
                    },
                    yAxis: {
                        title: {
                            text: null
                        }
                    },
                    series: [{
                        name: 'Platillos',
                        data: []
                    }]
                });
            }
            
            function loadtable(){
                var platillos=[];
                var valores=[];
                var datos={fecha1:$("[name=start]").val(),fecha2:$("[name=end]").val()};
                
                llamarajax(datos, "/reportes/totalplatillos", "JSON").success(function(data){
                    if(data.length===0){
                          $("#results").html('<div class="note note-warning">\
                <h4>¡Lo sentimos!</h4>\
                <p>\
                No se encontraron datos del rango seleccionado.</p></div>');

                    }else{
                        $("#results").html('<div class="col-md-5"><table class="table table-striped">\
                            <thead>\
                            <tr>\
                            <th>Platillo</th>\
                            <th>Cantdad vendido</th>\
                            </tr>\
                            </thead>\
                            <tbody id="datos">\
                            </tbody>\
                            </table>\
                            </div>\
                            <div class="col-md-7">\
                            <div id="container">\
                            </div></div>');
                        loadchart()
                        var renglon;
                        var valor=0;
                        $.each(data, function(index, val) {
                        valores.push([parseFloat(val.Cantidad)]);
                        platillos.push([val.nombre]);
                        renglon+='<tr>\
                        <td>'+val.nombre+'</td>\
                        <td>'+val.Cantidad+'</td>\
                        </tr>'

                        });
                        $("#datos").html(renglon);
                        console.log(valores)

                        var chart = $('#container').highcharts();
                        chart.series[0].setData(valores);
                        
                        chart.xAxis[0].setCategories(platillos, true, true);
                        
                    }

                });
            }
            
            frmFecha.formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                 err: {
                    // You can set it to popover
                    // The message then will be shown in Bootstrap popover
                    container: 'tooltip'
                },
                // This option will not ignore invisible fields which belong to inactive panels
                
                fields: {
                    end: {
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
                    start: {
                        validators: {
                            notEmpty:{
                                message:'Fecha de nacimiento requerida.'

                            },
                            date: {
                                format: 'YYYY-MM-DD',
                                message: 'Formato incorrecto para fecha.'
                            }
                        }
                    }
                }
            });
            
            
		});
		</script>
	@endsection