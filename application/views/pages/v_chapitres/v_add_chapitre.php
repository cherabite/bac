<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#"><?php echo $grand_title ?></a></li>
                        <li class="breadcrumb-item active"><?php echo $page_title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="panel ">
            <div class="panel-heading"> <i class="fa fa-list">  قائمة الأبواب   </i>



                <a href="<?php echo base_url('c_chapitre_article/form_add_chapitre') ?>" class="btn btn-info btn-sm float-sm-left"><i
                        class="fa fa-plus"></i>&nbsp;إضافة باب</a> &nbsp;

            </div>
</div>

        </div>
        <!-- /.row -->
        <!-- .row -->
        <div class="dropdown-divider"></div>
        <?php $error_msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
			
			
                    
        <div class="table-responsive  row">
            <table style="width:100%" class="tab0 table  table-striped text-center table-bordered mydatatable ">
                <thead class="thead table-dark">
                    <tr>
                        <!-- <th class="select_all"><button class="btn btn-secondary col">تحديد </button> </th> -->
                        <th>رقم الفصل</th>
                        <th>تعيين الفصل</th>
                        <th>رقم الباب</th>
                        <th>تعيين الباب </th>
                        <th> العمليات </th>
                    </tr>
                    <tr>
                        <!-- <th class="deselect_all"><button class="btn btn-secondary col">إلغاء</button></th> -->
                        <th class="thSearch"></th>
                        <th class="thSearch"></th>
                        <th class="thSearch"></th>
                        <th class="thSearch"></th>
                        <th class="thSearch"></th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chapitres as $chapitre): ?>
                    <tr>
                        <!-- <td></td> -->
                        <td><?php echo $chapitre->pknum_section ?></td>
                        <td><?php echo $chapitre->libelle_section ?> </td>
                        <td><?php echo $chapitre->pknum_chapitre ?></td>
                        <td><?php echo $chapitre->libelle_chapitre ?></td>
                        <td>
                            <a
                                href="<?php echo base_url('c_chapitre_article/edit_chapitre/'.$chapitre->id_chapitre) ?>"><button
                                    type="button" class="btn btn-info btn-circle btn-xs" data-toggle="tooltip"
                                    data-original-title="تعديل"><i class="fa fa-edit"></i></button></a>
         <a  class="btn btn-danger btn-circle btn-xs" href="<?php echo base_url('c_chapitre_article/remove_chapitre/'.$chapitre->id_chapitre ) ?>" 
         data-toggle="tooltip" data-original-title="Delete" > <i class="fa fa-times"></i></a>
                                                               		
                        </td>
                        

                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>





        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
function remove_chapitre(row){        
      if(row != ""){
        $.ajax({
          url:'<?php echo base_url(); ?>c_chapitre_article/remove_chapitre',
          type:'POST',
          dataType:'json',
            data:{ 
                  'row' : row 
               },

          success: function(data) {
			  swal.fire({
												  title: 'delete with seccess',
												  html: '<h4 style="font-weight:bold;font-size:20px;color:red" > delete with seccess</h4>',
												  type: 'success',
												  confirmButtonText: 'OK'
												});
location.reload();
          }
        });
      } else {
        return false;
      }
      return false;
  }  

</script>