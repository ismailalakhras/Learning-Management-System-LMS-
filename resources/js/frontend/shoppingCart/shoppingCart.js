
//! ------------------------{{ delete course from cart - shopping cart page }}--------------------------------


$(function () {
    console.log('xxx');

    $(document).on('click', '.removeFromCartBtn-shoppingCart', function (e) {
        e.preventDefault();

        console.log('000');


        const button = $(this);
        const courseId = button.data('id');

        $.ajax({
            url: `/cart/${courseId}`,
            method: 'DELETE',
            success: function (res) {
                button.closest('.card').remove();

                if (res.total !== undefined) {
                    $('.cart-total').text(`$ ${res.total}`);
                }

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