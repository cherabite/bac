<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
 <div class="container" style="margin-top:40px;">
          
            <div class="panel panel-primary">
                <div class="panel-heading" >
                    <h4 class="panel-title pull-center" >  </h4>
                  قــــــــائــمـة الـمــستـخــدمــين  فــي المــركـــز الــولائــي  : <?php echo ' <span class="label label-success"> '.$this->auth_onefd->get_cwefdBy_ID_user()->WILAYA_CWEFD.'</span>'  ?>
                </div>
            <div class="panel-body"> 
                    
                <form id="form_ins"   class="form-horizontal" method="post" action="<?php echo site_url('admin/Users/update_status_All_Users'); ?>"  >	
           
         <div class="row"  style="margin-top:0px;">
              <div class="col-md-10" >
                <a href="<?php echo site_url('admin/users/create_user');?>" class="btn btn-primary">إنشاء حساب جديد</a>
                <input type="submit"  id="valider" class="btn btn-primary"  value="حفظ التعديلات" 	>
             </div>
			 <div class="col-md-2" >
			   
			   <label class=" btn btn-default " >تفعيل الكل</label> <input type="checkbox" id='checkall' value='<?php  ?>' onclick="check_all()" /> 
			   
			 </div>
         </div>
       <div class="row">
          <div class="col-lg-12" style="margin-top: 10px;">
		<?php
		    if (isset($message)) {
					   echo '<div  class="alert alert-success alert-dismissible" id="message">'; 
                       echo $message;
			echo  '</div>';}
            if(!empty($users))
				
            {
				
				$n=0;
                echo '<table id="mytable" class="table table-hover table-borderless  table-condensed table-striped">';
                echo '<tr class="info"><td>الرقم</td><td>اسم المستخدم</td></td><td>اللقب</td><td>الإسم</td><td>تحديث</td><td>تفعيل </td></tr>';
				 foreach ($users as $user){
				$n=$n+1;
				 ?>
		     <tr>
			 <td>  <?php echo htmlspecialchars($n,ENT_QUOTES,'UTF-8')?>
			 </td>
             <td> <?php echo htmlspecialchars($user->username,ENT_QUOTES,'UTF-8');?>
			 </td>
             <td> <?php  echo htmlspecialchars($user->nom,ENT_QUOTES,'UTF-8');?>
			 </td>
			 <td> <?php  echo htmlspecialchars($user->prenom,ENT_QUOTES,'UTF-8');?>
			 </td>
			 <td> <?php echo anchor('admin/users/edit_user/'.$user->id,' <span class=" btn btn-default  glyphicon glyphicon-pencil" aria-hidden="true"> </span> ');?></td>
			  <td>
             
			  <input class="checkthis" type="checkbox" name='status[]' value='<?php echo $user->username; ?>' <?php if( $user->status == 1) echo 'checked'; ?> /> </td>
			  
               </tr>
			 <?php   
				 }
			 ?>
              </table>
			 
			 
        </div>
    </div>

            
                <div class="panel-footer clearfix">
                    <div class="pull-left">

                        <div>
                            <input type="submit"  id="valider" class="btn btn-info"  value="حفظ التعديلات" 	>
                            <input type="button" id="annuler"  class="btn btn-danger"  value="إلــغاء" 	>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
		<?php
            }
            ?>
         </form>	