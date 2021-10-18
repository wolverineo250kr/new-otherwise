$(document).ready(function () {
    if (window.screen.availWidth < 768) {
        $(document).find('.category-list.opened').removeClass('opened').hide();
    } else {
        $(document).on('mouseover', '#category-list > ul li', function (e) {
            if ($(this).children('.sub-menu').find('li').length != 0) {
                $(this).children('.sub-menu').css("width", $(this).width());
                $(this).children('.sub-menu').show();
            }
        });

        $(document).on('mouseleave', '#category-list > ul li', function (e) {
            $(this).children('.sub-menu').hide();
        });
    }
});

$(document).on('click', '.category-list-button', function (e) {
   var sibling = $(this).siblings('.category-list');

    if (sibling.hasClass('opened')) {
        sibling.removeClass('opened');
        sibling.slideUp(300);
    } else {
        sibling.addClass('opened');
        sibling.slideDown(300);
    }
});

$(document).on('click', '.mobile-line-3 .menu-open', function (e) {
    var menuMainLinks = $(document).find('.main-links');
    var menuCategoryList = $(document).find('.category-list');
    var element = $(this);

    var searchBlock = $(document).find('.search-block');

    if (searchBlock.hasClass('mobile')) {
        searchBlock.removeClass('mobile');
    }

    if (menuCategoryList.hasClass('opened')) {
        menuCategoryList.removeClass('opened');
        menuCategoryList.slideUp(300);
    }

    if (menuMainLinks.css('left') === '0px') {
        menuMainLinks.css('left', '-100%');
        element.find('.fa').removeClass('fa-times').addClass('fa-bars');
    } else {
        menuMainLinks.css('left', '0px');
        element.find('.fa').removeClass('fa-bars').addClass('fa-times');
    }

});

$(window).on('resize', function () {
    $('#category-list').css('height', '');
});

//$(document).mouseup(function (e) {
//    var menu = $('#category-list');
//    var menuTriggerButton = $('.category-list-button');
//    if ((!menu.is(e.target)
//            && menu.has(e.target).length === 0) && (!menuTriggerButton.is(e.target)
//            && menuTriggerButton.has(e.target).length === 0)) {
//        menu.removeClass('opened').slideUp(300);
//    }
//});

jQuery(function ($) {
    $(window).scroll(function () {
        if (window.screen.availWidth < 768) {
            if ($(this).scrollTop() > 53) {
                $(document).find('#category-list').height($(window).height() - ($('.mobile-line-3').outerHeight() + $('.header-bottom').outerHeight()));
                $('.mobile-line-3').addClass('fixed');
                $('.header-bottom').addClass('fixed-header-bottom');
                $('.search-block').addClass('fixed-search');
                $('.main-links').addClass('fixed-main-links');
                $('.category-list-button').addClass('fixed-category-list-button');
            } else if ($(this).scrollTop() < 53) {
                $(document).find('#category-list').height($(window).height() - ($('.mobile-line-1').outerHeight() + $('.mobile-line-3').outerHeight() + $('.header-bottom').outerHeight()));
                $('.mobile-line-3').removeClass('fixed');
                $('.header-bottom').removeClass('fixed-header-bottom');
                $('.search-block').removeClass('fixed-search');
                $('.main-links').removeClass('fixed-main-links');
                $('.category-list-button').removeClass('fixed-category-list-button');
            }
        } else {
            if ($(this).scrollTop() > $('.header-top').outerHeight() + $('.header-middle').outerHeight()) {
                $('.header-bottom').addClass('fixed-header-bottom');
            } else {
                $('.header-bottom').removeClass('fixed-header-bottom');
            }
        }
    });
});