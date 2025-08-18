$(function () {
    $(document).on('click', '.accordion-button', function () {
        let btn = $(this);
        let currentLesson = btn.closest('.accordion-item').find('.lessons').first();

        $('.lessons').not(currentLesson).slideUp(100);

        $('.accordion-button img').removeClass('rotate');

        currentLesson.slideToggle(100);
        btn.find('img').toggleClass('rotate');

    })
})

//! ----------------------{{ fetch more reviews  }}----------------------------

$(function () {
    $(document).on('click', '#loadMore', function () {
        let btn = $(this);
        let nextPage = btn.data('next-page');
        let reviewsUrl = btn.data('url');

        $.get(reviewsUrl + "?page=" + nextPage, function (data) {
            $('#reviews .col-md-8').append(data.html);
            if (!data.hasMore) {
                btn.remove();
            } else {
                btn.data('next-page', nextPage + 1);
            }
        });
    });
});


