$(document).on('click', '#add-to-cart', function (e) {
    var id = $(this).data('id');
    var elem = $(this).addClass('disabled');
    elem.html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Добавление');
    $.ajax({
        url: '/cart/add-to-cart',
        data: {id: id, qty: 1},
        type: 'POST',
        success: function (response) {
            $(document).find('.cart-count').html(response.cartItems);
            elem.after('Товар в <a href="/cart">корзине</a>');
            elem.fadeOut(300);
            showCart();
        },
        error: function () {
            $(document).find('.btn_form').find('a').html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Ошибка');
            elem.removeClass('disabled');
        }
    });
    e.preventDefault();
});

$(document).on('click', '#get-more-products', function (e) {
    var button = $(this);
    button.attr('disabled', true);
    var pageId = $(this).attr("data-page-id");
    var categoryUrl = $(this).data('category-name');
    var totalCount = $(this).data('total-count');
    var pageSize = $(this).data('page-size');
    $.ajax({
        url: '/category/' + categoryUrl + '?page=' + pageId,
        data: $("#search-in-category-form").serialize(),
        type: 'POST',
        success: function (response) {
            button.attr("data-page-id", parseInt(pageId) + 1);
            button.attr("data-current-page-size", parseInt(button.attr('data-current-page-size')) + parseInt(pageSize));

            $(response).appendTo($('#p0')).hide().fadeIn(300);
            var tab = $(document).find('.active-tab');

            if (tab.hasClass('fa-list')) {
                $(document).find('#result .product').removeClass('col-sm-4').addClass('col-sm-12');
                $(document).find('.view-tabs').find('i').removeClass('active-tab');
                $(document).find('.product-block').css('display', 'flex');
                $(document).find('.product-block').css('height', 'auto');
                $(this).find('i').addClass('active-tab');
            }
            if (parseInt(button.attr('data-current-page-size')) === parseInt(button.attr('data-total-count'))) {
                button.slideUp(300);
            }
            button.attr('disabled', false);
        },
        error: function () {

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

$(document).on('change', '#search-in-category-form input, #changeSort', function () {
    $.ajax({
        url: "/category/search",
        data: $("#search-in-category-form").serialize(),
        type: "POST",
        success: function (response) {
            $('#get-more-products').attr('data-page-id', 2);
            $('#get-more-products').attr('data-current-page-size', response.pages.pageSizeParam);
            $('#get-more-products').attr('data-total-count', response.pages.totalCount);
            if ((parseInt(response.products.length) === 1) || (parseInt($('#get-more-products').attr('data-current-page-size')) === parseInt(response.pages.totalCount))) {
                $('#get-more-products').slideUp(300);
            }
            if (parseInt(response.pages.totalCount) > parseInt(response.products.length)) {
                $('#get-more-products').slideDown(300);
            }

//            $('#get-more-products').attr('data-current-page-size', parseInt($('#get-more-products').attr('data-current-page-size')) + response.pages.pageSizeParam);
            $('#result').html(response.html);
            var tab = $(document).find('.active-tab');

            if (tab.hasClass('fa-list')) {
                $(document).find('#result .product').removeClass('col-sm-4').addClass('col-sm-12');
                $(document).find('.view-tabs').find('i').removeClass('active-tab');
                $(document).find('.product-block').css('display', 'flex');
                $(document).find('.product-block').css('height', 'auto');
                $(this).find('i').addClass('active-tab');
            }
        },
        error: function () {

        }
    });
});

$(document).on('click', '.view-tabs', function (e) {
    e.preventDefault();
    $(document).find('#result .product').removeClass('col-sm-12').addClass('col-sm-4');
    $(document).find('.view-list').find('i').removeClass('active-tab');
    $(document).find('.product-block').css('display', '');
    $(document).find('.product-block').css('height', '');
    $(this).find('i').addClass('active-tab');
});

$(document).on('click', '.view-list', function (e) {
    e.preventDefault();
    $(document).find('#result .product').removeClass('col-sm-4').addClass('col-sm-12');
    $(document).find('.view-tabs').find('i').removeClass('active-tab');
    $(document).find('.product-block').css('display', 'flex');
    $(document).find('.product-block').css('height', 'auto');
    $(this).find('i').addClass('active-tab');
});

$('select#changeSort').on('change', function ()
{
    $('#searchincategoryform-sorttype').val(this.value);
});