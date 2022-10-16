
$(".mydatatable").DataTable({

  lengthMenu: [[5,10, 15, 25, 30, 50, -1], [5,10, 15, 25, 30, 50, "الكل"]],

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
 
    
  
 /* select: {
    style: "multi",
    selector: "td:first-child"
  }*/
  
 /* order: [[1, "asc"]]*/
});

var table = $(".mydatatable").DataTable();
$(".thSearch ").each(function() {
  $(this).html(
    '<input class="permission" type="text" class="input class="permission"Search form-control"  placeholder = "بحث" />'
  );
});
table.columns().every(function() {
  var that = this;
  $("input class="permission"", this.header()).on("keyup change", function() {
    if (that.search() !== this.value) {
      that.search(this.value).draw();
    }
  });
});

$(document).ready(function() {

 

  $(".select_all").click(function() {
    table.rows().select();
  });
  $(".deselect_all").click(function() {
    table.rows().deselect();
  });

  $("a.toggle-vis").on("click", function(e) {
    e.preventDefault();
    // Get the column API object
    var column = table.column($(this).attr("data-column"));

    // Toggle the visibility
    column.visible(!column.visible());
    $(this).toggleClass("active");
  });
 /* var table = $(".mydatatable").DataTable( {
    orderCellsTop: true,
    fixedHeader: true
  } );*/
  

});

