function llamarajax(datosmandar,link,tipo)
{
    return $.ajax({
        url: link,
        type: 'POST',
        dataType: tipo,
        data: datosmandar
    }); 
}	
function regresarajaxerrors(data){
	var response = JSON.parse(data.responseText);
    var errorString = '<ul>';
    $.each( response, function( key, value) {
        errorString += '<li>' + value + '</li>';
    });
    errorString += '</ul>';

    return "<strong>Uppps Hubo algunos problemas</strong><br>"+errorString;
}

 toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}