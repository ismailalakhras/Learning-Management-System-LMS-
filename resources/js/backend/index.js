
import 'datatables.net-buttons-bs5';
import 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-buttons/js/buttons.print';

import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';

pdfMake.vfs = pdfFonts.vfs;

import jszip from 'jszip';
window.JSZip = jszip;


$(function () {
    document.body.style.visibility = 'visible';
})

$(function () {
    const path = window.location.pathname;
    const keyword = path.split('/')[2];

    setActivePage(keyword);
    setActiveNavLink($(`[data-page=${keyword}]`));
});

function setActivePage(pageId) {
    $('.page-content').removeClass('active');
    $(`#${pageId}-page`).addClass('active');
}

function setActiveNavLink($activeLink) {
    $('.sidebar-nav .nav-link').removeClass('active');
    $activeLink.addClass('active');
}


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

bindPaginationLinks();


//! ----------------------{{ side menu course toggle }}----------------------------
$(function () {
    $('#toggle-categories').on('click', function () {
        $('.categories-dropdown').slideToggle(200);
    });
});