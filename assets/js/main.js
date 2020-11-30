$(document).ready(function(){

    var $sel_dep = $('select[name="departamento"]'),
        $sel_city = $('select[name="ciudad"]'),
        $register_form = $('.register-form'),
        errors = {};

    // cuando cambia el departamento actualizamos las opciones de ciudad 
    $sel_dep.on('change', function(){

        renderOptions( geoJson[ $(this).val() ] );

        $sel_city.prop('disabled', false);

    });

    // actualizar opciones de ciudad
    function renderOptions( ciudades ) {

        $sel_city.html('<option value="" disabled selected>Seleccionar...</option>');

        ciudades.forEach(ciudad => {
            
            $sel_city.append('<option value="'+ ciudad +'">'+ ciudad +'</option>');

        });

    }

    // capturamos el evento submit del formulario
    $('.register-form').on('submit', function(e){

        //ocultamos alertas previas
        $register_form.find('.alert').hide();

        // validamos el formulario
        if ( validateForm() ) {

            //activamos estado de espera
            $register_form.addClass('loading');

            // si no hay errores enviamos
            submitForm();

        } else {

            // si hay errores los mostramos
            displayErrors();

        }

        e.preventDefault();

    });

    // validar formulario
    function validateForm() {

        // generamos un objeto de llave -> valor con la información del formulario
        var data = $register_form.serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});

        // vaciamos los errores
        errors = {};

        // borramos los divs de error
        $register_form.find('.errors').remove();

        if ( !data['departamento'] ) errors['departamento'] = ['Debes seleccionar un departamento'];

        if ( !data['ciudad'] ) errors['ciudad'] = ['Debes seleccionar una ciudad'];

        if ( !data['nombre'] ) errors['nombre'] = ['Debes escribir un nombre'];

        if ( !data['email'] ) errors['email'] = ['Debes escribir un correo electrónico'];

        return $.isEmptyObject( errors );

    }

    function displayErrors() {

        for (var campo in errors) {

            if (errors.hasOwnProperty(campo)) {
              
                var $campo = $register_form.find('*[name="' + campo + '"]'),
                    $formGroup = $campo.parents('.form-group'),
                    $errors = $('<div class="errors" />');

                for (let i = 0; i < errors[campo].length; i++) {
                    const error = errors[campo][i];

                    $errors.append( '<p>' + error + '</p>' );
                    
                }
                
                $formGroup.append( $errors );

            }

        }

    }

    function submitForm() {

        $.ajax({
            url: $register_form.attr('action'),
            data: $register_form.serialize(),
            method: 'post',
            
        })
        .done(function( data ) {
            
            if ( data == 'exito' ) {

                $register_form[0].reset();
                $sel_city.prop('disabled', true);
                $register_form.find('.alert-success').css('display', 'block');

            } else if ( data == 'Error al guardar' ) {

                $register_form.find('.alert-danger').css('display', 'block');

            } else {

                errors = JSON.parse( data );

                displayErrors();

            }

        }).fail(function( error ) {
            
            console.log( error );
            
        }).always(function() {
            
            //desactivamos estado de espera
            $register_form.removeClass('loading');

        });

    }

});