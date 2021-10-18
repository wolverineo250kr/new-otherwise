$(document).on('click', '.remove', function (e) {
    var id = $(this).data('product-id');

    $.ajax({
        url: '/cart/delete-item',
        data: {id: id},
        type: 'POST',
        success: function (response) {
            if (response.qty <= 0) {
                $(document).find('.shop_table').slideUp(500).delay();
                $(document).find('.cart').html('Ваша корзина пуста');
                $(document).find('.cart-count').html('');
            } else {
                $(document).find('.cart-item-' + id).css('background-color', 'red');
                $(document).find('.cart-item-' + id).slideUp(300);
                $(document).find('.cart-count').html(response.qty);
                $(document).find('.total-amount').html(response.total);
            }
        },
        error: function () {
            console.log('fuck!');
        }
    });
    e.preventDefault();
});

$('body').on('click', '.minus, .plus', function (e) {
    var element = $(this);
    var className = element[0].className;
    var id = element.closest('tr').find('.remove').data('product-id');
    var amount = element.siblings('.qty');

    element.prop('disabled', true);

    if (className == 'minus') {
        amount.val(parseInt(amount.val()) - 1);

        if (amount.val() < 1) {
            amount.val('1');
            element.prop('disabled', true);
            return false;
        }

    } else if (className == 'plus') {
        amount.val(parseInt(amount.val()) + 1);
        element.siblings('.minus').prop('disabled', false);
    }

    $.ajax({
        url: '/cart/change-amount',
        data: {id: id, class: className},
        type: 'POST',
        success: function (response) {
            element.prop('disabled', false);

            $(document).find('.total-amount').html(response.total);

            element.closest('tr').find('.product-subtotal').find('.amount').html(response.subTotal);
        },
        error: function () {
            element.prop('disabled', false);
        }
    });
    e.preventDefault();
});

function cartDestroy() {
    $.ajax({
        url: '/cart/destroy',
        type: 'POST',
        success: function (response) {

        },
        error: function () {

        }
    });
}

$(document).find('.qty.text').on('input', function (e) {
    var element = $(this);
    var id = element.closest('tr').find('.remove').data('product-id');

    element.prop('readonly', true);
    element.siblings('.minus').prop('disabled', false);
    var qty = element.val();

    if (qty < 1) {
        element.val('1');
        qty = 1;
    }

    $.ajax({
        url: '/cart/change-amount',
        data: {id: id, qty: qty},
        type: 'POST',
        success: function (response) {
            element.prop('readonly', false);

            $(document).find('.total-amount').html(response.total);

            element.closest('tr').find('.product-subtotal').find('.amount').html(response.subTotal);
        },
        error: function () {
            element.prop('readonly', false);
        }
    });

});