$(document).on('click', '#cart #destroy', function (e) {
    var element = $(this);
    element.addClass('disabled');
    $.ajax({
        url: '/cart/destroy',
        type: 'POST',
        success: function (response) {
            location.reload();
        },
        error: function () {
            element.removeClass('disabled');
            element.html('Ошибка <i class="fa fa-exclamation-circle" aria-hidden="true"></i>');
        }
    });
    e.preventDefault();
});

$(document).on('click', '#search-call', function (e) {
    var searchBlock = $(document).find('.search-block');

    var menuMainLinks = $(document).find('.main-links');
    if (menuMainLinks.css('left') === '0px') {
        menuMainLinks.css('left', '-100%');
        $('.menu-open').find('.fa').removeClass('transform-left').toggleClass('transform-right');
        $('.menu-open').find('.fa').removeClass('fa-times').addClass('fa-bars');
    }

    if (searchBlock.hasClass('mobile')) {
        searchBlock.removeClass('mobile');
    } else {
        searchBlock.addClass('mobile');
    }

    e.preventDefault();
});

$(document).on('click', '#cart .remove', function (e) {
    var id = $(this).data('product-id');
    $(this).css('pointer-events', 'none');

    $.ajax({
        url: '/cart/delete-item',
        data: {id: id},
        type: 'POST',
        success: function (response) {
            updateCart();
        },
        error: function () {
            $(this).css('pointer-events', '');
        }
    });
    e.preventDefault();
});

function updateCart() {
    $.ajax({
        url: '/cart/show-cart',
        type: 'POST',
        success: function (response) {
            if (!response) {
                location.reload();
                return false;
            }
            $('#cart .modal-body').html(response);
        },
        error: function () {
        }
    });
}