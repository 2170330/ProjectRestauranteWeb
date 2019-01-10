$("ul").on("click", ".init", function() {
    'use strict';
    $(this).closest("ul").children('li:not(.init)').toggle();
});

var allOptions = $("ul").children('li:not(.init)');

$("ul").on("click", "li:not(.init)", function() {
    'use strict';
    allOptions.removeClass('selected');
    $(this).addClass('selected');
    $("ul").children('.init').html($(this).html());
    allOptions.toggle();
});
