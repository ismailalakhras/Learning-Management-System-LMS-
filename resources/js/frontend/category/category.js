let currentFilter = {}; 

//! ----------------------{{ Load Courses Function }}----------------------------
function loadCourses(url, extraData = {}) {
    currentFilter = extraData; 
    $.ajax({
        url: url,
        type: 'GET',
        data: extraData,
        success: function (response) {
            if (response.success) {
                $('#courses-container').html(response.page);
                bindPaginationLinks(); 
            }
        },
        error: function (err) {
            console.log(err);
        }
    });
}

//! ----------------------{{ Pagination Courses }}----------------------------
function bindPaginationLinks() {
    $('#courses-container .pagination a').off('click').on('click', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        loadCourses(url, currentFilter); 
    });
}

//! ----------------------{{ Filter By Rating }}----------------------------
$(function () {
    $(document).on('click', '.filter-by-rating', function () {
        let rating = $(this).data('id');
        let categoryId = $('#category-id').val();


        $('.filter-by-rating').css({
            'background-color': '',
            'color': ''
        });

        $(this).css({
            'background-color': '#ffc1071c',
        });

        loadCourses('/courses/filter', { rating: rating, category_id: categoryId });
    });
});

//! ----------------------{{ Filter By Price }}----------------------------

$(function () {
    $(document).on('change', '.filter-by-price', function () {
        $('.filter-by-price').not(this).prop('checked', false);

        let min = $(this).data('min');
        let max = $(this).data('max');
        let categoryId = $('#category-id').val();

        loadCourses('/courses/filter-price', { min: min, max: max, category_id: categoryId });
    });
});

$(function () {
    $('.sort-select').on('change', function () {
        let sort = $(this).val();
        let categoryId = $('#category-id').val();

        loadCourses('/courses/sort', {
            sort: sort,
            category_id: categoryId
        });
    });
});



//! ----------------------{{ Filter By lessons }}----------------------------
$(function () {
    $(document).on('click', '.filter-by-lessons', function () {
        let min = $(this).data('min');
        let max = $(this).data('max');
        let categoryId = $('#category-id').val();

        $('.filter-by-lessons input').prop('checked', false);
        $('.filter-by-lessons').css({
            'background-color': '',
            'color': ''
        });

        $(this).find('input').prop('checked', true);
        $(this).css({
            'background-color': '#ffc1071c',
        });

        currentFilter = { min_lessons: min, max_lessons: max, category_id: categoryId };

        loadCourses('/courses/filter-lessons', currentFilter);
    });
});



//! ----------------------{{ Sidebar Toggle }}----------------------------

$(function () {
    $('.sidebar h3 img').on('click', function () {
        let $this = $(this);

        $this.toggleClass('rotated');

        $this.closest('h3')
            .nextUntil('h3')
            .slideToggle(200);
    });
});


$(function () {
    $(document).on('click', '.card-course-click', function () {
        let courseId = $(this).data('id');
        window.location.href = `/course/${courseId}`;
    })
})


bindPaginationLinks();
