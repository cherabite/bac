<script  type="text/javascript">

$(document).ready(function () {

 

    $('#form_add_f').on('submit', function (event) {
        event.preventDefault();
    
            $.ajax({

                url: base_url + "c_fournisseur/add_fournisseur",
                method: "POST",
                data: $(this).serialize(),
                success: function (res) {
                   
                    if (res.success == 0) {
                        /*  html= '<h4 style="font-weight:bold;font-size:20px;color:red" > * '+ res.valid_error + '</h4>';
                          $('#errorvalidation').html(html);*/
                        swal.fire({
                            title: 'نعتذر!',
                            html: '<h4 style="font-weight:bold;font-size:20px;color:red" > * ' + res.valid_error + '</h4>',
                            type: 'error',
                            confirmButtonText: 'إغلاق'
                        });

                    } else {
                        $('#refresh').html('');
                        swal.fire({
                            title: 'Ok',
                            html: '<h4 style="font-weight:bold;font-size:20px;color:red" > لقد تم تعديل قيمة الإعتماد . </h4>',
                            type: 'success',
                            confirmButtonText: 'إغلاق'
                        });
                      $('#refresh').html(res.html);
                    }

                },
                error: function (xhr, textStatus, errorThrown) {
                  //  $("#ajax_loader").hide();
                    swal.fire({
                        title: 'نعتذر!',
                        html: '<h4 style="font-weight:bold;font-size:20px;color:red" > * الملقم لا يستجيب  . أعد المحاولة !!!. </h4>',
                        type: 'error',
                        confirmButtonText: 'إغلاق'
                    });
                }
            })
        
    })

    
});
</script>