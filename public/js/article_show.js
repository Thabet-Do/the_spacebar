$(document).ready(function () {
    $('.js-like-article').click(function (e) {
        e.preventDefault();
        var $link = $(e.currentTarget);
        $link.toggleClass('fa-heart-o').toggleClass('fa-heart');

        $.ajax({

            method: 'POST',
            url: $link.attr('href')

        }).done(function (data) {

            $('.js-like-counter').html(data.hart);

        });

    })
});