<?php defined('BASEPATH') OR exit('No direct script access allowed');

if($this->auth_onefd->logged_in() && $this->auth_onefd->is_admin() ) {
?>

 <div class="container" style="margin-top:60px;">
            <ol class="breadcrumb">
                <i class="glyphicon glyphicon-edit"></i>
                <li> تحديث مستخدم</li> 
                <i class="glyphicon glyphicon-user"></i>
              	<li  class="active" style="color: #9900CC; font-weight: bold" ><?php echo ' &nbsp; في المركز الولائي :&nbsp;&nbsp;<span class="label label-success">'.$this->auth_onefd->get_cwefdBy_ID_user()->WILAYA_CWEFD.'</span>'  ?></li>
                 </li>
            </ol>
			
        
            <div class="panel panel-primary">
                <div class="panel-heading" >
                    <h4 class="panel-title pull-center" >  </h4>
                  <i class="glyphicon glyphicon-edit"></i> تـــحـديـث مــســتـخــدم 
                </div>
                <div class="panel-body"> 
                    <form id="form_ins"   class="form-horizontal" method="post" action="<?php echo site_url('admin/Users/update_user'); ?>"  >
                        <?php if(validation_errors()){
							echo '<div class="alert alert-warning alert-dismissible" role="alert" <span style="color: #FF0000; font-weight: bold">إنــتـبـــه </span>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" glyphicon glyphicon-remove-circle"></i><span aria-hidden="true"></span></button>';
						
						echo'<div ><ol>' ;
						
                      // echo validation_errors('<li>', '</li>'); 
                        echo validation_errors('<li><span class="label label-danger">', '</span></li>'); 
						echo'</ol></div>';
						echo'</div>';
					
					}
					?>
						<fieldset>
                            <legend>المعلومات الشخصية  :</legend>
                             <div class="row">
        <div class="col-lg-12" style="margin-top: 10px;">
            
               <table class="table table-borderless table-condensed table-hover">
			   
              <tr>
			    <td>  <span class="label label-info">اللقب :</span> </td>
                <td><input class="validate[required,minSize[3],maxSize[20]]" id ="nom" name="nom" type="text" placeholder="اللقب" value="<?php echo $nom; ?>" />  </td>
				<td><span class="label label-info">إسم المستخدم :</span></td>
				<td><input class="validate[required,minSize[3],maxSize[20]]" id ="username" name="username" type="text" value="<?php echo $username ?>" readonly="true"/>   </td>
				</tr>
				<tr>
				<td> <span class="label label-info">الإسم :</span></td>
				<td><input class="validate[required,minSize[3],maxSize[20]]" id ="prenom" name="prenom" type="text" value="<?php echo $prenom ?>" placeholder="الإسم" />  </td>
				<td>  <span class="label label-info">كلمة المرور :</span> </td>
				<td><input class="validate[required,minSize[3],maxSize[20]]" id ="password" name="password" type="text" placeholder="كلمة المرور"  value="<?php echo $password; ?>"/>   </td>
				</tr>
				<tr>
				<td> <span class="label label-info">تاريخ الميلاد :</span> </td>
				<td>  
				<select class="validate[required]" id ="jour"  name="jour"    >
                     <option selected><?php echo $jour; ?></option>
                 </select>
								
                 <select class="validate[required]" id ="mois" name="mois"   >
                      <option  selected><?php echo $mois; ?></option>
                 </select>
                                  
                 <select  class="validate[required]" id="annee"   name="annee"   >
                       <option  selected><?php echo $annee; ?></option>
                 </select>
				
				</td>
				<td> <span class="label label-info">تفعيل المستخدم :</span> </td>
				<td><input id ="status" name="status" type="checkbox" value="1" <?php if($status == 1) echo 'checked'; ?>  />   </td>
				</tr>
				
               </table>
            
        </div>
    </div> 
                        </fieldset>
                        <fieldset>
                            <legend>المستويات المكلف بها</legend>
                           <div class="row">
                <div class="col-lg-12" style="margin-top: 10px;">
            
                <table class="table table-hover table-bordered table-condensed">
			   
                <tr>
			    <td><input id ="104" name="permission[]" type="checkbox" value="104" <?php if ($group_perms!==FALSE && array_search('104', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >104</label> </td>
                <td><input id ="204" name="permission[]" type="checkbox" value="204" <?php if ($group_perms!==FALSE && array_search('204', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >204</label> </td>
				<td><input id ="304" name="permission[]" type="checkbox" value="304" <?php if ($group_perms!==FALSE && array_search('304', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >304</label> </td>
				<td><input id ="404" name="permission[]" type="checkbox" value="404" <?php if ($group_perms!==FALSE && array_search('404', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?>/>  <label >404</label> </td>
				</tr>
				<tr>
				<td><input id ="122" name="permission[]" type="checkbox" value="122" <?php if ($group_perms!==FALSE && array_search('122', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >122</label> </td>
				<td><input id ="124" name="permission[]" type="checkbox" value="124" <?php if ($group_perms!==FALSE && array_search('124', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >124</label> </td>
				</tr>
				<tr>
				<td><input id ="212" name="permission[]" type="checkbox" value="212" <?php if ($group_perms!==FALSE && array_search('212', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >212</label> </td>
				<td><input id ="213" name="permission[]" type="checkbox" value="213" <?php if ($group_perms!==FALSE && array_search('213', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >213</label> </td>
				<td><input id ="214" name="permission[]" type="checkbox" value="214" <?php if ($group_perms!==FALSE && array_search('214', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >214</label> </td>
				<td><input id ="216" name="permission[]" type="checkbox" value="216" <?php if ($group_perms!==FALSE && array_search('216', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >216</label> </td>
				<td><input id ="218" name="permission[]" type="checkbox" value="218" <?php if ($group_perms!==FALSE && array_search('218', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >218</label> </td>
				<td><input id ="237" name="permission[]" type="checkbox" value="237" <?php if ($group_perms!==FALSE && array_search('237', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >237</label> </td>
				</tr>
				<tr>
				<td><input id ="312" name="permission[]" type="checkbox" value="312" <?php if ($group_perms!==FALSE && array_search('312', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >312</label> </td>
				<td><input id ="313" name="permission[]" type="checkbox" value="313" <?php if ($group_perms!==FALSE && array_search('313', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >313</label> </td>
				<td><input id ="314" name="permission[]" type="checkbox" value="314" <?php if ($group_perms!==FALSE && array_search('314', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >314</label> </td>
				<td><input id ="316" name="permission[]" type="checkbox" value="316" <?php if ($group_perms!==FALSE && array_search('316', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >316</label> </td>
				<td><input id ="318" name="permission[]" type="checkbox" value="318" <?php if ($group_perms!==FALSE && array_search('318', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >318</label> </td>
				<td><input id ="337" name="permission[]" type="checkbox" value="337" <?php if ($group_perms!==FALSE && array_search('337', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >337</label> </td>
				</tr>
				
                </table>
              
                  </div>
                   </div> 
                               
                        </fieldset>
						 <fieldset>
                            <legend>المهام المكلف بها</legend>
                           <div class="row">
                               <div class="col-lg-12" style="margin-top: 10px;">
            
                                  <table class="table table-hover table-bordered table-condensed">
			   
                                    <tr>
			                             <td><input id ="1" name="permission[]" type="checkbox" value="1" <?php if ($group_perms!==FALSE && array_search('1', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >تأكيد تسجيل متعلم جديد</label> </td>
									<tr/><tr>	 
                                         <td><input id ="2" name="permission[]" type="checkbox" value="2" <?php if ($group_perms!==FALSE && array_search('2', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >تأكيد تسجيل متعلم سابق</label> </td>
									</tr><tr>	 
                                         <td><input id ="3" name="permission[]" type="checkbox" value="3" <?php if ($group_perms!==FALSE && array_search('3', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >تحديث المؤكدين</label> </td>

			                          </tr><tr>	 
                                         <td><input id ="4" name="permission[]" type="checkbox" value="4" <?php if ($group_perms!==FALSE && array_search('4', array_column($group_perms, 'id_perms')) !== false) echo'checked'; ?> />  <label >تسيير المواعيد</label> </td>

			                          </tr>
			  
				 
                
                                   </table>
            
                                 </div>
                            </div> 
                               
                        </fieldset>
						 
                
            </div>
            </div>
                <div class="panel-footer clearfix">
                    <div class="pull-left">

                        <div>
						    <?php echo form_hidden('user_id',$id);?>
                            <input type="submit"  id="valider" class="btn btn-info"  value="تحديث" 	>
                            <input type="button" id="annuler"  class="btn btn-danger"  value="إلــغاء" 	>
							</div>
                    </div>
                </div>
                </form>
          
        </div>
		<?php
			}else{
				$this->load->view('login/login');	
			}
           ?>	
