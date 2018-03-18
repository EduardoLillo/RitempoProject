/*jslint browser: true*/
/*global $, jQuery, Modernizr, google, _gat*/
/*jshint strict: true */


/*************** COLORS TO BE ERASED WHEN INSTALLING THE THEME ***********/

/*************** COLORS TO BE ERASED WHEN INSTALLING THE THEME ***********/

/*************** GOOGLE ANALYTICS ***********/
/*************** REPLACE WITH YOUR OWN UA NUMBER ***********/
/*window.onload = function () { "use strict"; gaSSDSLoad(""); }; //load after page onload
/*************** REPLACE WITH YOUR OWN UA NUMBER ***********/
/*
|--------------------------------------------------------------------------
| DOCUMENT READY
|--------------------------------------------------------------------------
*/  

$(document).ready(function() {
    "use strict";
    $("#enviar").click(function () {
        $('.ajaxgif').removeClass('hide');
        var datos = 'nombre=' + $("#nombre").val() + '&email=' + $("#email").val() + '&fono=' + $("#fono").val() + '&mensaje=' + $("#mensaje").val();
        $.ajax({
            type: "POST",
            url: "enviarcorreo.php",
            data: datos,
            success: function () {
                $('.ajaxgif').addClass('hide');
                $('#ok-contacto').removeClass("hide");
            },
            error: function () {
               $('.ajaxgif').addClass('hide');
                $('#error-contacto').removeClass("hide");
            }
        });
    });
});









