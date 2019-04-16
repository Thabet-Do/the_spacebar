$(document).ready(function () {
    $('.js-like-article').click(function (e) {
        e.preventDefault();
        var $link = $(e.currentTarget);
        var $count = $('.js-like-counter').text();
        $link.toggleClass('fa-heart-o').toggleClass('fa-heart');
        $('.js-like-counter').html(parseInt($count) + 1);
    })
});