


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





//! ------------------------{{ add and delete course from cart }}--------------------------------
$(function () {

    $(document).on('click', '.addToCartBtn', function () {
        const button = $(this);
        const courseId = button.data('id');

        $.ajax({
            url: `/cart/${courseId}`,
            method: 'POST',
            success: function (res) {
                const container = $(`#btn-toggle-container-${courseId}`);
                container.html(`
                    <button class="btn-cart-primary add-to-cart removeFromCartBtn"
                        data-id="${courseId}" style="background: rgb(194, 63, 11)">
                        Remove From Cart
                    </button>
                `);

                showSuccessAlert(res);
            },
            error: function (err) {
                showErrorAlert(err);
            }
        });
    });

    $(document).on('click', '.removeFromCartBtn', function () {
        const button = $(this);
        const courseId = button.data('id');

        $.ajax({
            url: `/cart/${courseId}`,
            method: 'DELETE',
            success: function (res) {
                const container = $(`#btn-toggle-container-${courseId}`);
                container.html(`
                    <button class="btn-cart-primary add-to-cart addToCartBtn"
                        data-id="${courseId}">
                        Add To Cart
                    </button>
                `);

                showSuccessAlert(res);
            },
            error: function (err) {
                showErrorAlert(err);
            }
        });
    });
});




//todo show Success Alert Function
function showSuccessAlert(res) {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: res.title,
        text: res.message,
        showConfirmButton: false,
        timer: 3000,
        width: '400px',
        padding: '16px',
        customClass: {
            popup: 'shadow-lg rounded-lg border border-green-100 custom-toast',
            title: 'text-green-600 text-base font-medium',
            icon: '!border-none'
        },
        toast: true,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
}


//todo show Error Alert Function
function showErrorAlert(err) {
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: err.responseJSON?.title,
        text: err.responseJSON?.message || 'Something went wrong',
        showConfirmButton: false,
        timer: 5000,
        width: '400px',
        padding: '16px',
        customClass: {
            popup: 'shadow-lg rounded-lg border border-red-100 custom-toast',
            title: 'text-red-600 text-base font-medium',
            icon: '!border-none'
        },
        toast: true,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
}