$(document).on('click', '#add-to-cart', function (e) {

    var id = $(this).data('id');

    $(this).addClass('disabled');
    var elem = $(this);
    $(this).html('Добавление <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');

    $.ajax({
        url: '/cart/add-to-cart',
        data: {id: id, qty: 1},
        type: 'POST',
        success: function (response) {
            $(document).find('.cart-count').html(response.cartItems);
            elem.after('Товар в <a href="/cart">корзине</a>');
            elem.slideUp(300);
            showCart();
        },
        error: function () {
            elem.html('Ошибка <i class="fa fa-exclamation-circle" aria-hidden="true"></i>');
            elem.removeClass('disabled');
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