$(document).ready(function () {
    $(".parent-category").hover(
            function () {
                $(this).find(".sub-categories").slideDown('medium');
            },
            function () {
     $(this).find(".sub-categories").slideUp('medium');
            }
    );

});