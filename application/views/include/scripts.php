<!-- jQuery -->

<script>
var base_url = "<?php echo base_url() ?>"
</script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.rowGroup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/table.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom_article.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.plugin.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.datepick.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.pick_dat').datepick({
        dateFormat: 'yyyy-mm-dd',
        minDate: new Date(2018, 1 - 1, 1),
        maxDate: new Date(2050, 12 - 1, 31),
        yearRange: '2018:2050',
        showTrigger: '#calImg'
    });


});
</script>
<script>
$(document).ready(function() {
    //	$(document).on('submit', '#form_liste_condidat', function(e) {
    $("#form_liste_condidat").change(function(e) {
        // $("#ajax_loader").show();
        jQuery.ajax({
            url: base_url + "bac/show_liste",
            method: "POST",
            data: $(this).serialize(),
            dataType: 'json',


            success: function(data) {
                // $("#ajax_loader").hide();
                if (data) {

                    $('#tab1').html(data.select);
                    $(".mydatatable").DataTable({

                        lengthMenu: [
                            [5, 10, 15, 25, 30, 50, -1],
                            [5, 10, 15, 25, 30, 50, "الكل"]
                        ],
                        filter:true,
                        
                      
                        language: {
                            sProcessing: "جارٍ التحميل...",
                            sLengthMenu: "أظهر _MENU_ ملفات",
                            sZeroRecords: "لم يعثر على أي ملف",
                            sInfo: "إظهار _START_ إلى _END_ من أصل _TOTAL_ ملف",
                            sInfoEmpty: "يعرض 0 إلى 0 من أصل 0 ملف",
                            sInfoFiltered: "(منتقاة من مجموع _MAX_ ملف)",
                            sInfoPostFix: "",
                            sSearch: "بحث في كل الجدول: ",
                            sUrl: "",
                            oPaginate: {
                                sFirst: "الأول",
                                sPrevious: "السابق",
                                sNext: "التالي",
                                sLast: "الأخير"
                            }
                        },
                        pagingType: "full_numbers",
                        order: { id: "asc" },

                    });
                    var table = $(".mydatatable").DataTable();
                    $(".thSearch ").each(function() {
                        $(this).html(
                            '<input  type="text" class="input Search form-control"  placeholder = "بحث" />'
                        );
                    });
                    table.columns().every(function() {
                        var that = this;
                        $("input", this.header()).on("keyup change", function() {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
                    

                }
            }
        })
        e.preventDefault();
    });
});
</script>
