
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
 /*
  rowGroup: {
    startRender: null,
    endRender: function ( rows, group ) {
        var sumChapitre = rows
            .data()
            .pluck(5)//5 ترتيب الحقل في view 
            // 5 الحقل الذي نعمل عليه count()
            .reduce( function ( a, b ) {
              if ( typeof a === 'string' ) {
                  a = a.replace(/[^\d.-]/g, '') * 1;
              }
              if ( typeof b === 'string' ) {
                  b = b.replace(/[^\d.-]/g, '') * 1;
              }
       
              return a + b;
          }, 0 ) ;
          //  sumChapitre = $.fn.dataTable.render.number(',', '.', 0, '  دج').display( sumChapitre );

      
        return $('<tr/>')
            .append( '<td class="somme font-weight-bold" colspan="4">مجموع مبلغ الباب :  '+group+'  </td>' )
  
         
            .append( '<td class="somme font-weight-bold" colspan="2" >'+sumChapitre+'  دج</td>' );
    },
    dataSrc: 2
    //رقم الحقل الذي نريد أن نعمل عليه group(agregate)
    //رقم 4 هو ترتيب رقم الحقل في الجدول الذي يظهر في فيو ور (view)
} 
*/  
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

