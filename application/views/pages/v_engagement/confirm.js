  

$('.confirmation').click(function (event) {
    event.preventDefault();
   
    var href = $(this).attr('href');

    Swal.fire({
        title: ' تريد حذف الإلتزام ؟ ',
        type: 'warning',
        customClass: {
            icon: 'swal2-arabic-question-mark'
        },
        confirmButtonColor: "#DD6B55",
        confirmButtonText: 'نعم',
        cancelButtonText: 'لا',
        showCancelButton: true,
        showCloseButton: true
    }).then((result) => {
        if (result.value) {
            window.location.href = href;
        }
    })


  });
  