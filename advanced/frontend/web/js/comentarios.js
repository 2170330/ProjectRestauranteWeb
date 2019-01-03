/* exported rating */

var rating = 0;

$(".star5").click(function () {
    'use strict';

    $(".star5").css("color", "#ffdb4d");

    $(".star4").css("color", "grey");
    $(".star3").css("color", "grey");
    $(".star2").css("color", "grey");
    $(".star1").css("color", "grey");

    rating = 1;
});

$(".star4").click(function () {
    'use strict';

    $(".star5").css("color", "#ffdb4d");
    $(".star4").css("color", "#ffdb4d");

    $(".star3").css("color", "grey");
    $(".star2").css("color", "grey");
    $(".star1").css("color", "grey");

    rating = 2;
});

$(".star3").click(function () {
    'use strict';

    $(".star5").css("color", "#ffdb4d");
    $(".star4").css("color", "#ffdb4d");
    $(".star3").css("color", "#ffdb4d");

    $(".star2").css("color", "grey");
    $(".star1").css("color", "grey");

    rating = 3;
});

$(".star2").click(function () {
    'use strict';

    $(".star5").css("color", "#ffdb4d");
    $(".star4").css("color", "#ffdb4d");
    $(".star3").css("color", "#ffdb4d");
    $(".star2").css("color", "#ffdb4d");

    $(".star1").css("color", "grey");

    rating = 4;
});

$(".star1").click(function () {
    'use strict';

    $(".star5").css("color", "#ffdb4d");
    $(".star4").css("color", "#ffdb4d");
    $(".star3").css("color", "#ffdb4d");
    $(".star2").css("color", "#ffdb4d");
    $(".star1").css("color", "#ffdb4d");

    rating = 5;
});

function ratingValue() {
    'use strict';
    rating = 3;
    return rating;


}