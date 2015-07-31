$(document).ready(function() {
    App.init();
    var formsub=$('#formSub');
    formsub.formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            idcategoria:{
                validators:{
                    notEmpty:{
                        message:"Catergoria requerida."
                    }

                }
            },
            nombre: {
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'Sub-categoria requerida.'
                    },
                    stringLength: {
                        min: 4,
                        max: 60,
                        message: 'Rango de caracteres entre 4 y 60 como maximo.'
                    },
                    remote: {
                        url: '/gerente/subcategorianombre',
                        type: 'POST',
                        message:'Esta sub-categoria ya existe.'
                    }
                }
            },
        }
    });
    /*End validator*/
    $("#btnRegistrarSub").click(function(){
        formsub.data('formValidation').validate();
        if(formsub.data('formValidation').isValid()){
            llamarajax(formsub.serialize(), "/gerente/registrarsubcategoria", "JSON").success(function(data){
                console.log(data);
                if(data.Bandera){
                    formsub.data('formValidation').resetForm();
                    formsub.each(function(){
                        this.reset();
                    });
                    toastr["success"]("Sub-categoria guardada exitosamente");

                }else{
                    console.log(data);
                }
            }).fail(function(datas){

                 toastr["error"](regresarajaxerrors(datas));
            });

        }else{
            var arrerr=formsub.data('formValidation').getInvalidFields();
            var inp=arrerr[0];
            $(inp).focus();
            toastr["error"]("Verificar campos");
            
        }
    });
    /*end click*/
});
//End document ready