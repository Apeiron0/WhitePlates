$(document).ready(function() {
    App.init();
    $('#installationForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        // This option will not ignore invisible fields which belong to inactive panels
        exclude: ':disabled',
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'El nombre es obligatorio'
                    },
                    stringLength: {
                        min: 5,
                        max: 90,
                        message: 'El total de letras deben ser entre 5 y 100 como maxímo'
                    }
                }
            },
            apaterno: {
                validators: {
                    notEmpty: {
                        message: 'El apellido paterno es obligatorio'
                    },
                    stringLength: {
                        min: 5,
                        max: 90,
                        message: 'El total de letras deben ser entre 5 y 100 como maxímo'
                    }
                }
            },
            amaterno: {
                validators: {
                    notEmpty: {
                        message: 'El apellido materno es obligatorio'
                    }
                },
                stringLength: {
                        min: 5,
                        max: 90,
                        message: 'El total de letras deben ser entre 5 y 100 como maxímo'
                    }
            },
            fechanac: {
                validators: {
                    notEmpty:{
                        message:'La fecha de nacimiento es obligatoria'

                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'No es un formato correcto de fecha ',
                        min: '01/01/1960',
                        max: '01/01/2006'
                    }
                }
            },
            optionSexo:{
                validators:{
                    notEmpty:{
                        message:'El sexo es obligatorio'
                    }
                }
            },
            optionUsu:{
                validators:{
                    notEmpty:{
                        message:'Esta seleccion es obligatoria'
                    }
                }
            },
            telefono:{
                validators:{
                    notEmpty:{
                        message:'El telefono es obligatorio'
                    },
                    integer:{
                        message:"El telefono debe ser numerico"

                    }
                }
            },
            roles_id:{
                validators:{
                    notEmpty:{
                        message:'Porfavor seleccione un rol'
                    }
                }

            },
            nombreusuario: {
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'El nombre de usuario es requerido'
                    },
                    stringLength: {
                        min: 4,
                        max: 60,
                        message: 'El nombre de usaurio debe tener un rango entre 4 y 60 caracteres como maximo'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
                    // Place the remote validator in the last
                    remote: {
                        url: '/administrador/nomusuario',
                        type: 'POST',
                        message:'El nombre de usuario ya existe'
                    }
                }
            },
            pass: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es obligatoria'
                    },
                    identical: {
                        field: 'passconfirm',
                        message: 'La contraseña y su confirmación no son las mismas'
                    }
                }
            },
            passconfirm: {
                validators: {
                    notEmpty: {
                        message: 'La confirmación de contraseña es obligatoria'
                    },
                    identical: {
                        field: 'pass',
                        message: 'La contraseña y su confirmación no son las mismas'
                    }
                }
            }
        }
    })
    .bootstrapWizard({
        tabClass: 'nav nav-pills',
        onTabClick: function(tab, navigation, index) {
            return validateTab(index);
        },
        onNext: function(tab, navigation, index) {
            var numTabs    = $('#installationForm').find('.tab-pane').length,
                isValidTab = validateTab(index - 1);
            if (!isValidTab) {
                var arrerr=$('#installationForm').data('formValidation').getInvalidFields();
                var inp=arrerr[0];
                $(inp).focus();
                toastr["error"]("Verificar campos");
                return false;
            }

            if (index === numTabs) {
                // We are at the last tab

                // Uncomment the following line to submit the form using the defaultSubmit() method
                // $('#installationForm').formValidation('defaultSubmit');

                // For testing purpose
                var datos={form:$('#installationForm').serialize()};
                llamarajax($('#installationForm').serialize(),'/administrador/registrarusuario', 'JSON').success(function(data){
                    if(data.Bandera){
                        $('#installationForm').bootstrapWizard('first');
                        $('#installationForm').data('formValidation').resetForm();

                        $('#installationForm').each(function(){
                            this.reset();
                        });
                        /*$('#installationForm a:database-tab').tab('show')*/
                        toastr["success"]("El registro de usuario ha sido guardado exitosamente");

                    }else{
                         toastr["error"](data.Codigo);

                    }
                }).fail(function(data){
                    toastr["error"](regresarajaxerrors(data));
                });
                /*$('#completeModal').modal();*/
            }

            return true;
        },
        onPrevious: function(tab, navigation, index) {
            return validateTab(index + 1);
        },
        onTabShow: function(tab, navigation, index) {
            // Update the label of Next button when we are at the last tab
            var numTabs = $('#installationForm').find('.tab-pane').length;
            $('#installationForm')
                .find('.next')
                    .removeClass('disabled')    // Enable the Next button
                    .find('a')
                    .html(index === numTabs - 1 ? 'Registrar' : 'Siguiente');

            
        }
    });
    function validateTab(index) {
        var fv   = $('#installationForm').data('formValidation'), // FormValidation instance
        // The current tab
        $tab = $('#installationForm').find('.tab-pane').eq(index);
        // Validate the container
        fv.validateContainer($tab);
        var isValidStep = fv.isValidContainer($tab);
        if (isValidStep === false || isValidStep === null) {
            // Do not jump to the target tab
            return false;
        }

            return true;
        }   
        $.fn.datepicker.dates['es'] = {
            days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Sunday"],
            daysShort: ["Dom", "Lu", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"],
            daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Fr", "Sa", "Do"],
            months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"],
            today: "Hoy",
            clear: "Clear"
        };
        $("#datepicker-autoClose").datepicker({todayHighlight:true,autoclose:true,language: 'es',format:'dd/mm/yyyy',endDate:'01/01/2005'});
        $("#password-indicator-default").passwordStrength();
        $("#rsbu1").click(function(){
            $('#installationForm').data('formValidation').resetField('nombreusuario',true);
            $('#installationForm').data('formValidation').resetField('pass',true);
            $('#installationForm').data('formValidation').resetField('passconfirm',true);
            $("[name=nombreusuario]").attr('disabled',false);
            $("[name=pass]").attr('disabled',false);
            $("[name=passconfirm]").attr('disabled',false);
            
        });
        $("#rsbu2").click(function(){
            $('#installationForm').data('formValidation').resetField('nombreusuario',true);
            $('#installationForm').data('formValidation').resetField('pass',true);
            $('#installationForm').data('formValidation').resetField('passconfirm',true);
            $("[name=nombreusuario]").attr('disabled',true);
            $("[name=pass]").attr('disabled',true);
            $("[name=passconfirm]").attr('disabled',true);

        });


        });//Document ready end

