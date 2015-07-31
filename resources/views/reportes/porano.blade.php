@extends('index2')
	@section('styles2')
		<link href="/plugins/DataTables/css/data-table.css" rel="stylesheet" />
        <script src="/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
		<link href="/css/styleWP1.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="\plugins\bootstrap-datepicker\css\datepicker.css">
	@endsection
	@section('content')
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li><a href="javascript:;">Reportes</a></li>
			<li class="active">Ganancias años</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Ganancias<small> por años</small></h1>
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
                                    Año
                                </a>
                            </h3>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <!-- |####################| Panel-body |####################| -->
                                <form class="form-horizontal form-bordered" id="frmOrden">
                                   <div class="form-group">
                                    <label class="col-md-4 control-label">Año</label>
                                    <div class="col-md-3">
                                        <div class="input-group date" id="datepicker" >
                                            <input type="text" class="form-control" name="datepicker" value="2013" readonly>
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                </form><br>
                            <div class="col-md-5">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                            <th>MES</th>
                                            <th>GANANCIA</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datos">
                                    </tbody>
                                </table>
                            </div>
                            {{-- Grafica --}}
                            <div class="col-md-7">
                                <div id="container">
                                    
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
            $("#datepicker").datepicker( {
                format: " yyyy", // Notice the Extra space at the beginning
                viewMode: "years", 
                minViewMode: "years",
                autoclose:true,
                endDate:' 2015',
                startDate:'2013',
                disableDateToggle:false
              }).on('changeDate', function(e) {
            // Revalidate the date field
            loadtable()
            });
            loadtable()
            loadchart()
            function loadchart(){
                $('#container').highcharts({
                    chart: {
                        type: 'column',
                        margin: 75,
                        options3d: {
                            enabled: true,
                            alpha: 10,
                            beta: 25,
                            depth: 70
                        }
                    },
                    title: {
                        text: 'Ganancias por año'
                    },
                    subtitle: {
                        text: ''
                    },
                    lang: {
                        decimalPoint: ',',
                        thousandsSep: '.'
                    },
                    tooltip: {
                        valueDecimals: 2 
                    },
                    plotOptions: {
                        column: {
                            depth: 25
                        }
                    },
                    xAxis: {
                        categories:[]
                    },
                    yAxis: {
                        title: {
                            text: null
                        }
                    },
                    series: [{
                        name: 'Ganancias',
                        data: []
                    }]
                });
            }
            
            function loadtable(){
                var meses=[];
                var valores=[];
                var datos={fecha:$("[name=datepicker]").val()};
                llamarajax(datos, "/reportes/porano", "JSON").success(function(data){
                    if(data.length===0){

                    }else{
                        var renglon;
                        var valor=0;
                        $.each(data[0], function(index, val) {
                            if(val===null)
                                valor=0
                            else
                                valor=parseFloat(val)
                        valores.push([valor]);
                        meses.push([index]);
                        renglon+='<tr>\
                        <td>'+index+'</td>\
                        <td>$'+valor+'</td>\
                        </tr>'

                        });
                        $("#datos").html(renglon);
                        console.log(valores)
                        var dada=['1','2','3','4','5','6','7','8','9','10']
                        var chart = $('#container').highcharts();
                        chart.series[0].setData(valores);
                        
                        chart.xAxis[0].setCategories(meses, true, true);
                        
                    }

                });
            }
            
            
		});
		</script>
	@endsection