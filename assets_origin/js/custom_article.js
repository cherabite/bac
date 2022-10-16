

$(document).ready(function () {
    $("#cocher").click(function(){
        if (this.checked) {       
       $(".permission").prop('checked', true);
   }else{
                $(".permission").prop('checked', false);
                
            }
   
        });




    $('.confirmation').click(function (event) {
        event.preventDefault();
       
        var href = $(this).attr('href');
    
        Swal.fire({
            title: '  هل تريد الحذف  ؟ ',
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
      
   


    $('#PKnum_section').change(function (event) {
        event.preventDefault();

        var num_section_val = $('#PKnum_section').val();
        /*    swal.fire({
                title: 'نعتذر!',
                html: '<h4 style="font-weight:bold;font-size:20px;color:red" > * الملقم لا يستجيب  . أعد المحاولة !!!. </h4>',
                type: 'error',
                confirmButtonText: 'إغلاق'
              });*/
        jQuery.ajax({
            type: "POST",
            url: base_url + "c_chapitre_article/getchapitre_ajax",
            dataType: 'json',
            data: {
                num_section: num_section_val
            },
            success: function (aData) {
                if (aData) {
                    var PKnum_chapitre = $("#PKnum_chapitre");
                    PKnum_chapitre.empty();
                    PKnum_chapitre.append('<option value="">------   الباب  -------</option>');
                    for (var i = 0; i < aData.length; i++) {
                        PKnum_chapitre.append('<option value="' + aData[i].pknum_chapitre + '">' + aData[i].pknum_chapitre + '  ' + aData[i].libelle_chapitre + '</option>');

                    }


                } else {
                    var PKnum_chapitre = $("#PKnum_chapitre");
                    PKnum_chapitre.empty();
                    PKnum_chapitre.append('<option value="">************ غير موجـــود **********</option>');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                $("#ajax_loader").hide();
                swal.fire({
                    title: 'نعتذر!',
                    html: '<h4 style="font-weight:bold;font-size:20px;color:red" > * الملقم لا يستجيب  . أعد المحاولة !!!. </h4>',
                    type: 'error',
                    confirmButtonText: 'إغلاق'
                });
            }
        });
    });

$('#PKnum_chapitre').change(function (event) {
    event.preventDefault();

    var num_chapitre_val = $('#PKnum_chapitre').val();
    /*    swal.fire({
            title: 'نعتذر!',
            html: '<h4 style="font-weight:bold;font-size:20px;color:red" > * الملقم لا يستجيب  . أعد المحاولة !!!. </h4>',
            type: 'error',
            confirmButtonText: 'إغلاق'
          });*/
    jQuery.ajax({
        type: "POST",
        url: base_url + "c_chapitre_article/get_article_ajax",
        dataType: 'json',
        data: {
            num_chapitre: num_chapitre_val
        },
        success: function (aData) {
            if (aData) {
                var PKnum_article = $("#PKnum_article");
                PKnum_article.empty();
                PKnum_article.append('<option value="">------   المــــادة  -------</option>');
                for (var i = 0; i < aData.length; i++) {
                    PKnum_article.append('<option value="' + aData[i].num_article  + '">' + aData[i].num_article + '  ' + aData[i].libelle_article + '</option>');

                }


            } else {
                var PKnum_article = $("#PKnum_article");
                PKnum_article.empty();
                PKnum_article.append('<option value="">************ غير موجـــود **********</option>');
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            $("#ajax_loader").hide();
            swal.fire({
                title: 'نعتذر!',
                html: '<h4 style="font-weight:bold;font-size:20px;color:red" > * الملقم لا يستجيب  . أعد المحاولة !!!. </h4>',
                type: 'error',
                confirmButtonText: 'إغلاق'
            });
        }
    });
});

/* $('#PKnum_article').change(function (event) {
    event.preventDefault();

    var num_article_val = $('#PKnum_article').val();
    var num_chapitre_val = $('#PKnum_chapitre').val();
   if(num_article_val !='' && num_chapitre_val !='' ) {
    
          jQuery.ajax({
            type: "POST",
            url: base_url + "c_engagement/get_montant_rest",
            dataType: 'json',
            data: {
                num_article: num_article_val,
                num_chapitre:num_chapitre_val
            },
            success: function (Data) {
                if (Data) {
                    alert(Data.m_rest);
                    var m_rest = $("#m_rest");
                    m_rest.html('');
                    m_rest.html( '<h4 class="text-center">المبلغ المتبقي هو :  <span style="color:red">'+Data.m_rest+' دج </span></h4>')
                
                } 
            },
            error: function (xhr, textStatus, errorThrown) {
                $("#ajax_loader").hide();
                swal.fire({
                    title: 'نعتذر!',
                    html: '<h4 style="font-weight:bold;font-size:20px;color:red" > * الملقم لا يستجيب  . أعد المحاولة !!!. </h4>',
                    type: 'error',
                    confirmButtonText: 'إغلاق'
                });
            }
        });
    }
    }); */


    $(document).on('click', '.check_box', function () {

        var html = '';
        // alert('fdfdf'+'   '+$(this).data('budjet_primitif'));



        if (this.checked) {

            html = '<td> <input class="permission" type="checkbox"  class="check_box"  id="' + $(this).attr('id') + ' "  data-budjet_primitif="' + $(this).data('budjet_primitif') + '"  data-fknum_section="' + $(this).data('fknum_section') + '"  data-fknum_chapitre="' + $(this).data('fknum_chapitre') + '"  data-fknum_article="' + $(this).data('fknum_article') + '"   data-libelle_article="' + $(this).data('libelle_article') + '" checked  /></td>';

            html += '<td>' + $(this).data('fknum_section') + '</td>';
            html += '<td>' + $(this).data('fknum_chapitre') + '</td>';
            html += '<td>' + $(this).data('fknum_article') + '</td>';
            html += '<td>' + $(this).data('libelle_article') + '</td>';
            html += '<td><input class="permission"  class="form-control input class="permission"-lg budjet" type="text"  required  data-decimals="2" style="color: red; font-weight: bold;text-align:center"  id="budjet_primitif" name="budjet_primitif[]" value="' + $(this).data("budjet_primitif") + '"  /> <input class="permission" type="hidden" name="depense_id[]" value="' + $(this).attr('id') + '" /></td>';


        } else {

            html = '<td> <input class="permission" type="checkbox"  class="check_box"  id="' + $(this).attr('id') + ' "  data-budjet_primitif="' + $(this).data('budjet_primitif') + '"  data-fknum_section="' + $(this).data('fknum_section') + '"  data-fknum_chapitre="' + $(this).data('fknum_chapitre') + '"  data-fknum_article="' + $(this).data('fknum_article') + '"   data-libelle_article="' + $(this).data('libelle_article') + '"   /></td>';
            html += '<td>' + $(this).data('fknum_section') + '</td>';
            html += '<td>' + $(this).data('fknum_chapitre') + '</td>';
            html += '<td>' + $(this).data('fknum_article') + '</td>';
            html += '<td>' + $(this).data('libelle_article') + '</td>';
            html += '<td>' + $(this).data('budjet_primitif') + '</td>';

        }
        $(this).closest('tr').html(html);


    });

    /*********************************************************************************** */
    $('#new_cart').on('click', function (event) {
        event.preventDefault();
        if ($('.check_box_engmt:checked').length > 0) {
            $('#form_new_cart').submit();
        }else{
            swal.fire({
                title: 'نعتذر!',
                html: '<h4 style="font-weight:bold;font-size:20px;color:red" > لإنشاء بطاقة إلتزام جديدة <br/> عليك أولا بتحديد الإلتزام في جدول الإلتزامات قيد الإنتظار</h4>',
                type: 'error',
                confirmButtonText: 'إغلاق'
            });
        }
    });
    $('#update_form').on('submit', function (event) {
        event.preventDefault();
        if ($('.check_box:checked').length > 0) {

            $.ajax({

                url: base_url + "c_depenses/update_depense",
                method: "POST",
                data: $(this).serialize(),
                success: function (res) {
                    var html = '';
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
                 
                        $('#sum_depenses').html('مجموع الميزانية : '+res.sum_depenses);
                        $('#errorvalidation').html('');
                        fetch_data();
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
        }
    });
    /*********************************************************************************** */
    function fetch_data() {
        $.ajax({
            url: base_url + "c_depenses/fetch_all_depenses_ajax",
            method: "POST",
            dataType: "json",
            success: function (data) {
                swal.fire({
                    title: 'Ok',
                    html: '<h4 style="font-weight:bold;font-size:20px;color:red" > لقد تم تعديل قيمة الإعتماد . </h4>',
                    type: 'success',
                    confirmButtonText: 'إغلاق'
                });
               
                var html = '';
                $('tbody').html(html);
                for (var count = 0; count < data.length; count++) {
                    html += '<tr>';
                    html += '<td> <input class="permission" type="checkbox"  class="check_box"  id="' + data[count].id_engagement + '"  data-budjet_primitif="' + data[count].nouveau_montant + '"  data-fknum_section="' + data[count].fknum_section + '"  data-fknum_chapitre="' + data[count].fknum_chapitre + '"  data-fknum_article="' + data[count].fknum_article + '"   data-libelle_article="' + data[count].libelle_article + '"   /></td>';
                    html += '<td>' + data[count].fknum_section + '</td>';
                    html += '<td>' + data[count].fknum_chapitre + '</td>';
                    html += '<td>' + data[count].fknum_article + '</td>';
                    html += '<td>' + data[count].libelle_article + '</td>';
                    html += '<td>' + data[count].nouveau_montant + '</td>';

                    html += '</tr>';
                }
                $('tbody').html(html);
            },
            error: function (xhr, textStatus, errorThrown) {
                $("#ajax_loader").hide();
                swal.fire({
                    title: 'نعتذر!',
                    html: '<h4 style="font-weight:bold;font-size:20px;color:red" > * الملقم لا يستجيب  . أعد المحاولة !!!. </h4>',
                    type: 'error',
                    confirmButtonText: 'إغلاق'
                });
            }
        });
    }

//==========================================================================			
function vnum(myfield, e, dec) {
    var key;
    var keychar;
    if (window.event)
        key = window.event.keyCode;
    else if (e)
        key = e.which;
    else
        return true;
    keychar = String.fromCharCode(key);
    if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13)
            || (key == 27))
        return true;
    else if ((("0123456789").indexOf(keychar) > -1))
        return true;
    else if (dec && (keychar == " ") && (myfield.value.length != 0)) {
        myfield.form.elements[dec].focus();
        return false;
    } else
        return false;
}	
});


