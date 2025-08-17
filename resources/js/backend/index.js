
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




