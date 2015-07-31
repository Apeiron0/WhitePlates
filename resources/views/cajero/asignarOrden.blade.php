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
			<li><a href="javascript:;">Venta</a></li>
			<li class="active">Asignar orden</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Asignar orden<small> a venta</small></h1>
		<!-- end page-header -->

		<!-- begin row -->
		<div class="row">
		    <!-- begin col-6 -->
		    <div class="col-md-8">
		        <div class="panel-group" id="accordion">
                    <div class="panel panel-inverse overflow-hidden">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <i class="fa fa-plus-circle pull-right"></i> 
                                    Ordenes
                                </a>
                            </h3>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <!-- |####################| Panel-body |####################| -->
                                <form class="form-horizontal form-bordered" id="frmOrden">
                                  
                                </form><br>
                                <div class="row row-space-6" id="ordenes">
                                    @if (count($ordenes) > 0)
                                        @foreach($ordenes as $orden)
                                            <div class="col-sm-6 col-lg-4"><!-- //Producto -->
                                                <div class="ods-cont-orden">
                                                    <div class="f-s-20 text-center">#<b class="idorden">{{$orden->id}}</b></div>
                                                    <small><center style="color: #8D5E3F;" class="mesero">- - - - - - MESERO - - - - - -</center></small>
                                                    <div class="text-center"><b class="nombre">{{$orden->personal->nombre}} {{$orden->personal->apaterno}} {{$orden->personal->amaterno}}</b></div>
                                                    <center class="">Total: $<b class="total">{{$orden->platillo_total}}</b></center>
                                                    <center class="">N° de platillos: <b class="platillos">{{$orden->platillo_count}}</b></center>
                                                </div>
                                                <div class="ods-cont-precio">
                                                    <button class="btn btn-xs verdetalles" style="background-color: #8D5E3F; color: #F0D2A8;"><small><i class="fa fa-info"></i> DETALLES</small></button>
                                                    <button class="btn btn-xs agregar" style="background-color: #8D5E3F; color: #F0D2A8;"><small><i class="fa fa-plus"></i> AGREGAR</small></button>
                                                    <!-- <small class="ods-mini-titulos">TOTAL:</small> <span id="PrecioProducto" class="product-price-title">$99999.99</span> -->
                                                </div>
                                            </div><!-- //Fin producto -->
                                        @endforeach
                                    @else
                                        <div class="note note-warning" id="notealert">
                                            <h4>¡Sin ordenes pendientes por el momento!</h4>
                                            <p>
                                                Espere a que llegue alguna orden.
                                            </p>
                                        </div>
                                @endif
                                </div>
                                <!-- |######################################################| -->
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-inverse overflow-hidden">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <i class="fa fa-plus-circle pull-right"></i> 
                                    Detalles de orden
                                </a>
                            </h3>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <strong class="f-s-20" style="color: #E29969;">Orden</strong><strong class="f-s-15" style="color: #FABB7C;"> ( numero: <span id="NumOrden">9</span> )</strong>
                                <!-- <div class="borde-inferior col-sm-12"></div> -->
                                <div class='row'>
                                    <div class="col-sm-6">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th><small>PLATILLO</small></th>
                                                    <th><small>PRECIO</small></th>
                                                    <th><small>CANTIDAD</small></th>
                                                    <th><small>TOTAL</small></th>

                                                </tr>
                                            </thead>
                                            <tbody id="TblListPlatillos">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="note note-warning" style="margin-top: 30px;">
                                            <strong class="f-s-15">Comentarios</strong>
                                            <div id='contComentarios' class="f-s-13">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert bg-silver-lighter fade in m-b-15 text-right text-success">
                                    <small class="f-s-13">TOTAL: </small class="f-s-13">
                                    <strong class="f-s-18">$<span id="TotalOrden">0</span></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col-6 -->
            <div class="col-md-4">
            	<div class="panel panel-inverse" data-sortable-id="table-basic-4">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            {{-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a> --}}
                            <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                        </div>
                        <h4 class="panel-title">Ordenes de venta</h4>
                    </div>
                    <div class="panel-body panel-color">
                        <form class="form-horizontal form-bordered" id="frmVenta">    
                            <div class="form-group">
                                <label class="col-md-3 control-label">Fecha</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="fechanac" placeholder="YYYY-MM-DD" name="fechanac" />
                                </div>
                            </div>
                        </form><br>

                        <div class="table-responsive">
                            <table class="col-sm-12">
                                <thead class="tabla-cabecera">
                                    <th class="col-sm-1 table-titles"><small>Regresar</small></th>
                                    <th class="col-sm-1 table-titles"><small>ORDEN</small></th>
                                    <th class="col-sm-1 table-titles"><small>N° PLATILLOS</small></th>
                                    <th class="col-sm-2 row-precio"><small>TOTAL</small></th>
                                    <th class="col-sm-2 row-precio" style="display:none;" ><small>Mesero</small></th>
                                    {{-- style="display:none; --}}
                                </thead>
                                <tbody class="contendedor" id="ticket">
                                    {{-- <tr class="row-row">
                                        <td class="row-cantidad id col-sm-2">124</td>
                                        <td class="row-cantidad cantidad col-sm-2">3</td>
                                        <td class="row-precio total col-sm-2">$12415</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <h4 class="col-sm-4"></h4>
                            <h4 class="col-sm-3"></h4>
                            <h4 class="col-sm-5 text-success"><span class="precio f-s-12">Total:</span> <span>$</span><span id="TotalPagar">0</span></h4>
                        </div>
                    </div>
                    <div class="panel-footer panel-footer-color">
                        <button class="btn btn-block bg-orange-lighter text-inverse" id="FinalizarOrden" disabled>Finalizar orden / Imprimir ticket</button>
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
            $.fn.datepicker.dates['es'] = {
            days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Sunday"],
            daysShort: ["Dom", "Lu", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"],
            daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
            months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"],
            today: "Hoy",
            clear: "Clear"
            };
            $("#fechanac").datepicker({todayHighlight:true,autoclose:true,language: 'es',format:'yyyy-mm-dd'}).on('changeDate', function(e) {
            // Revalidate the date field
            frmVenta.formValidation('revalidateField', 'fechanac');
            });;

            $("#FinalizarOrden").click(function(){
                 frmVenta.data('formValidation').validate();
            

                if(frmVenta.data('formValidation').isValid()){
                    var arreglogeneral=new Array();
                        $('#ticket tr').each(function(){
                        arreglogeneral.push({idorden:parseFloat($(this).find('.id').html())});
                        
                        
                    });
                        var total=parseFloat($("#TotalPagar").html());
                        var fecha=$("#fechanac").val()
                        var datos={total:total,fecha:fecha,ordenes:arreglogeneral};
                        llamarajax(datos, "/cajero/nuevaventa", "JSON").success(function(data){
                            if(data.Bandera){
                                frmVenta.data('formValidation').resetForm();
                                frmVenta.each(function(){
                                    this.reset();
                                });
                                $("#FinalizarOrden").attr('disabled',true);
                                toastr["success"]("La venta fue registrada exitosamente");
                                $('#ticket').html("");
                                $("#TotalPagar").html("0");
                                if(data.Ordenes.length==0){
                                    $("#ordenes").html('<div class="note note-warning">\
                                        <h4>¡Sin ordenes pendientes por el momento!</h4>\
                                        <p>Espere a que llegue alguna orden.</p></div>');
                                }else{
                                    loadordenes(data.Ordenes);
                                }


                            }else{
                                toastr["error"](data.Codigo);
                            }   

                        });
                }else{
                    var arrerr=frmVenta.data('formValidation').getInvalidFields();
                    var inp=arrerr[0];
                    $(inp).focus();
                    toastr["error"]("Verificar campos");

                }

            });
            function verpendiente(){
                var tot=$("#ordenes").children().length;
                if(tot===0){
                     $("#ordenes").html('<div class="note note-warning" id="alert">\
                                        <h4>¡Sin ordenes pendientes por el momento!</h4>\
                                        <p>Espere a que llegue alguna orden.</p></div>');
                }else{
                    $("#alert").remove();
                }
            }
            $("#ordenes").on("click", ".verdetalles", function(e){

                var general=($(this).parent()).parent();
                var id=general.find('.idorden').html();
                

                var datos={id:id}
                llamarajax(datos, "/cajero/platillos", "JSON").success(function(data){
                    console.log(data[0].comentarios);
                    console.log(data[0].id);
                    cargartabla(data[0]['platillos']);
                    $("#TotalOrden").html(data[0].platillo_total)
                    $("#contComentarios").html(data[0].comentarios)
                    $("#NumOrden").html(data[0].id)
                });
                $("#collapseTwo").collapse('show');
                $("#collapseOne").collapse('hide');

            });
             $("#ordenes").on("click", ".agregar", function(e){
                
                $("#FinalizarOrden").attr('disabled',false);
                var general=($(this).parent()).parent();
                var id=general.find('.idorden').html();
                
                var mesero=general.find('.nombre').html();
                var total=general.find('.total').html();
                var platillos=general.find('.platillos').html();
                general.remove();
                verpendiente();
                
                /*general.fadeOut( "slow",function(){
                    
                });*/
                /*alert(id+" "+mesero+" "+" "+total+" "+platillos);*/
                var renglon='<tr class="row-row">\
                <td class="row-cantidad col-sm-1"><button class="btn no-bg text-danger btn-icon btn-circle btn-xs\
                btnquitar"><i class="fa fa-minus"></i></button></td>\
                <td class="row-cantidad id col-sm-2">'+id+'</td>\
                <td class="row-cantidad platillos col-sm-2">'+platillos+'</td>\
                <td class="row-precio total col-sm-2">'+total+'</td>\
                <td class="row-precio nombre col-sm-2" style="display:none;">'+mesero+'</td>\
                </tr>'
                $("#ticket").append(renglon);
                
                calculartotal();
             });
            function calculartotal(){
                var total=0;
                var cont=0;

                $('#ticket tr').each(function(){
                        total=total+parseFloat($(this).find('.total').html());
                        cont++;
                        /*alert($(this).find('.total').html())*/
                    });
                
                
                $("#TotalPagar").html(total);
                return cont;
            }
            $("#ticket").on("click", ".btnquitar", function(e){
                /*$("#ordenes").html("");*/
                var general=($(this).parent()).parent();
                var id=general.find('.id').html();
                
                var mesero=general.find('.nombre').html();
                var total=general.find('.total').html();
                var platillos=general.find('.platillos').html();
                /*alert(id+" "+mesero+" "+" "+total+" "+platillos);*/
                general.remove();
                var contenorden='<div class="col-sm-6 col-lg-4"><!-- //Producto -->\
                                    <div class="ods-cont-orden">\
                                        <div class="f-s-20 text-center">#<b class="idorden">'+id+'</b></div>\
                                        <small><center style="color: #8D5E3F;" class="mesero">- - - - - - MESERO - - - - - -</center></small>\
                                        <div class="text-center"><b class="nombre">'+mesero+'</b></div>\
                                        <center class="">Total:$ <b class="total">'+total+'</b></center>\
                                        <center class="">N° de platillos: <b class="platillos">'+platillos+'</b></center>\
                                    </div>\
                                    <div class="ods-cont-precio">\
                                        <button class="btn btn-xs verdetalles" style="background-color: #8D5E3F; color: #F0D2A8;"><small><i class="fa fa-info"></i> DETALLES</small></button>\
                                        <button class="btn btn-xs agregar" style="background-color: #8D5E3F; color: #F0D2A8;"><small><i class="fa fa-plus"></i> AGREGAR</small></button>\
                                        <!-- <small class="ods-mini-titulos">TOTAL:</small> <span id="PrecioProducto" class="product-price-title">$99999.99</span> -->\
                                    </div>\
                                </div><!-- //Fin producto -->'

                  $("#ordenes").append(contenorden);
                  var cont=calculartotal();
                  verpendiente();
                  if(cont===0){
                    $("#FinalizarOrden").attr('disabled',true);

                  }
            });
          function cargartabla(datos){
            $("#datos").html("");
            var renglon;
            $.each(datos, function(index, val) {
                console.log(datos);
                renglon+='<tr class="gradeA">\
                <td>'+val.nombre+'</td>\
                <td>'+"$"+val.precio+'</td>\
                <td>'+val.pivot['cantidad']+'</td>\
                <td>'+"$"+parseFloat(val.precio)*parseFloat(val.pivot['cantidad'])+'</td>\
                </tr>';
            });
            $("#TblListPlatillos").html(renglon);
            
        }
        //Document ready end
        function loadordenes(data){
            $("#ordenes").html("")
            $.each(data,function(index,val){
                var contenorden='<div class="col-sm-6 col-lg-4"><!-- //Producto -->\
                <div class="ods-cont-orden">\
                <div class="f-s-20 text-center">#<b class="idorden">'+val.id+'</b></div>\<small><center style="color: #8D5E3F;" class="mesero">- - - - - -\
                 MESERO - - - - - -</center></small>\
                 <div class="text-center"><b class="nombre">'+val.personal['nombre']+" "+val.personal['apaterno']+" "+val.personal['amaterno']+'</b></div>\
                 <small><center style="color: #8D5E3F;" class="">Total:$<b\
                 class="total">'+val.platillo_total+'</b></center></small>\
                 <small><center style="color: #8D5E3F;" class="">N° platillos <b\
                 class="platillos">'+val.platillo_count+'</b></center></small>\
                 </div><div class="ods-cont-precio">\
                 <button class="btn btn-xs verdetalles" style="background-color: #8D5E3F;\
                 color: #E29969;"><small><i class="fa fa-info"></i> DETALLES</small>\
                 </button><button class="btn btn-xs agregar" style="background-color:#8D5E3F;\
                  color: #E29969;"><small><i class="fa fa-plus"></i> AGREGAR</small>\
                  </button><!-- <small class="ods-mini-titulos">TOTAL:</small> <span\
                  id="PrecioProducto" class="product-price-title">$99999.99</span> -->\
                  </div>\
                  </div><!-- //Fin producto -->'
                  $("#ordenes").append(contenorden);
            });

        }
        var frmVenta=$("#frmVenta");
            frmVenta.formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    fechanac: {
                        validators: {
                            notEmpty:{
                                message:'La fecha de venta es requerida'

                            },
                            date: {
                                format: 'YYYY-MM-DD',
                                message: 'No es un formato correcto de fecha'
                            }
                        }
                    }
                }
            });
		});
		</script>
	@endsection