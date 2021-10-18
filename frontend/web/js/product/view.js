$(document).on('click', '#add-to-cart', function (e) {
    var id = $(this).data('product-id');
    $(this).addClass('disabled');
    $(this).html('Добавление <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');

    $.ajax({
        url: '/cart/add-to-cart',
        data: {id: id, qty: parseInt($('.qty').val())},
        type: 'POST',
        success: function (response) {
            $('#add-to-cart').html('Товар в корзине');
            $('.cart-block .item .cart-count').html(response.cartItems);
            showCart();
        },
        error: function () {
            $('#add-to-cart').html('Ошибка <i class="fa fa-exclamation-circle" aria-hidden="true"></i>');
            $('#add-to-cart').removeClass('disabled');
        }
    });
    e.preventDefault();
});

function showCart() {
    $.ajax({
        url: '/cart/show-cart',
        type: 'POST',
        success: function (response) {
            $('#cart .modal-body').html(response);
            $('#cart').modal('show');
        },
        error: function () {
        }
    });
}

$(document).on('click', '.plus', function (e) {
    var quantity = $(document).find('.qty-block .qty');
    quantity.val(parseInt(quantity.val()) + 1);
});

$(document).on('click', '.minus', function (e) {
    var quantity = $(document).find('.qty-block .qty');
    if (parseInt(quantity.val()) > 1) {
        quantity.val(parseInt(quantity.val()) - 1);
    }
});