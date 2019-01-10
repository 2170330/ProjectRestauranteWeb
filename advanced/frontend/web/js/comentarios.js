/* exported rating */

var rating = 0;



function rate(caller) {
    'use strict';
    var value = $(caller).attr('value');
    $('.star').children('i').each(function () {
        if($(this).attr('value') <= value) $(this).addClass('star-full');
        else $(this).removeClass('star-full');
    });

    $('#mensagemform-avaliacao').val(value);

}