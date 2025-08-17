


$(function () {
    let currentIndex = 0;
    const $slides = $(".slide");
    const $slidesContainer = $(".slides");

    // Next button
    $(".next").on("click", function () {
        currentIndex = (currentIndex + 1) % $slides.length;
        updateSlide();
    });

    // Prev button
    $(".prev").on("click", function () {
        currentIndex = (currentIndex - 1 + $slides.length) % $slides.length;
        updateSlide();
    });

    function updateSlide() {
        $slidesContainer.css("transform", `translateX(-${currentIndex * 100}%)`);
    }

    // Auto slide
    setInterval(function () {
        currentIndex = (currentIndex + 1) % $slides.length;
        updateSlide();
    }, 5000);

})


$(function () {
    $('#profileIcon').on('click', function () {
        $('#list-group').slideToggle(100)

    })
})







let currentSlide = 0;
const track = document.querySelector('.testimonials-track');
const slides = document.querySelectorAll('.testimonial-card');
const totalSlides = slides.length;

document.getElementById('nextBtn').addEventListener('click', () => {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateSlide();
});

document.getElementById('prevBtn').addEventListener('click', () => {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateSlide();
});

function updateSlide() {
    track.style.transform = `translateX(-${currentSlide * 100}%)`;
}






//! ----------------------{{ fetch courses by category id }}----------------------------

$(function () {
    $(document).on('click', '.category-card-click', function () {
        let categoryId = $(this).data('id');
        window.location.href = `/category/${categoryId}/courses`;
    })
})



$(function () {
    $(document).on('click', '.card-course-click', function () {
        let courseId = $(this).data('id');
        window.location.href = `/course/${courseId}`;
    })
})



//! ----------------------{{ fetch more courses  }}----------------------------

$(function () {
    $(document).on('click', '#loadMoreCourses', function () {
        let btn = $(this);
        let nextPage = btn.data('next-page');
        let coursesUrl = btn.data('url');


        $('.loadMoreCourses-secondBtn').show()

        $.get(coursesUrl + "?page=" + nextPage, function (data) {
            // حوّل الـ HTML إلى عناصر
            let newItems = $(data.html);

            // أضف العناصر الجديدة
            $('#coursesContainer').append(newItems);

            // سكرول لأول عنصر جديد
            $('html, body').animate({
                scrollTop: newItems.first().offset().top
            }, 600);

            if (!data.hasMore) {
                btn.remove();
            } else {
                btn.data('next-page', nextPage + 1);
            }
        });

    });
});




