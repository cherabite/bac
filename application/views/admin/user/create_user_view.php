<?php defined('BASEPATH') OR exit('No direct script access allowed');

if($this->auth_onefd->logged_in() && $this->auth_onefd->is_admin() ) {
?>

 <div class="container" style="margin-top:60px;">
            <ol class="breadcrumb">
                <i class="glyphicon glyphicon-edit"></i>
                <li> إنشاء حساب جديد</li> 
                <i class="glyphicon glyphicon-user"></i>
              	<li  class="active" style="color: #9900CC; font-weight: bold" ><?php echo ' &nbsp; في المركز الولائي :&nbsp;&nbsp;<span class="label label-success">'.$this->auth_onefd->get_cwefdBy_ID_user()->WILAYA_CWEFD.'</span>'  ?></li>
                 </li>
            </ol>
			
        
            <div class="panel panel-primary">
                <div class="panel-heading" >
                    <h4 class="panel-title pull-center" >  </h4>
                   إنـــشــــــاء مــسـتـــخـدم جـــــــديـــد
                </div>
                <div class="panel-body"> 
                    <form id="form_ins"   class="form-horizontal" method="post" action="<?php echo site_url('admin/Users/create_user'); ?>"  >
                        <?php if(validation_errors()){
							echo '<div class="alert alert-warning alert-dismissible" role="alert" <span style="color: #FF0000; font-weight: bold">إنــتـبـــه </span>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" glyphicon glyphicon-remove-circle"></i><span aria-hidden="true"></span></button>';
						
						echo'<div ><ol>' ;
						
                      // echo validation_errors('<li>', '</li>'); 
                        echo validation_errors('<li><span class="label label-danger">', '</span></li>'); 
						echo'</ol></div>';
						echo'</div>';
						}
						if (isset($message)) {
					    echo '<div  class="alert alert-success alert-dismissible" id="message">'; 
                        echo $message;
			            echo  '</div>';}
					?>
						<fieldset>
                            <legend>المعلومات الشخصية  :</legend>
                             <div class="row">
        <div class="col-lg-12" style="margin-top: 10px;">
            
               <table class="table table-borderless table-condensed table-hover">
			   
              <tr>
			    <td>  <span class="label label-info">اللقب :</span> </td>
                <td><input class="validate[required,minSize[3],maxSize[20]]" id ="nom" name="nom" type="text" placeholder="اللقب" value="<?php echo set_value('nom'); ?>" />  </td>
				<td><span class="label label-info">إسم المستخدم :</span></td>
				<td><input class="validate[required,minSize[3],maxSize[20]]" id ="username" name="username" type="text" value="<?php 
				echo 'USER'. sprintf("%02d",$this->auth_onefd->get_max_ID_user()).'_'.$this->auth_onefd->get_cwefdBy_ID_user()->n_cwefd?>" readonly="true"/>   </td>
				</tr>
				<tr>
				<td> <span class="label label-info">الإسم :</span></td>
				<td><input class="validate[required,minSize[3],maxSize[20]]" id ="prenom" name="prenom" type="text" value="<?php echo set_value('prenom'); ?>" placeholder="الإسم" />  </td>
				<td>  <span class="label label-info">كلمة المرور :</span> </td>
				<td><input class="validate[required,minSize[3],maxSize[20]]" id ="password" name="password" type="text" placeholder="كلمة المرور"  value="<?php echo set_value('password'); ?>"/>   </td>
				</tr>
				<tr>
				  <td> <span class="label label-info">تاريخ الميلاد :</span> </td>
				  <td>  
				 <select class="validate[required]" id ="jour"  name="jour"    >
                     <option value="<?php echo set_value('jour'); ?>" selected><?php echo set_value('jour'); ?></option>
                 </select>
								
                 <select class="validate[required]" id ="mois" name="mois"   >
                      <option value="<?php echo set_value('mois'); ?>" selected> <?php echo set_value('mois'); ?></option>
                 </select>
                  <select class="validate[required]" id ="annee" name="annee"   >
                      <option value=" <?php echo set_value('annee'); ?> " selected> <?php echo set_value('annee'); ?></option>
                  </select>                
                  
				</td>
				
				   <td> <span class="label label-info">تفعيل المستخدم :</span>
				</td>
				<td><input id ="status" name="status" type="checkbox" value="1" />   </td>
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
			    <td><input id ="104" name="permission[]" type="checkbox" value="104" />  <label >104</label> </td>
                <td><input id ="204" name="permission[]" type="checkbox" value="204" />  <label >204</label> </td>
				<td><input id ="304" name="permission[]" type="checkbox" value="304" />  <label >304</label> </td>
				<td><input id ="404" name="permission[]" type="checkbox" value="404" />  <label >404</label> </td>
				</tr>
				<tr>
				<td><input id ="122" name="permission[]" type="checkbox" value="122" />  <label >122</label> </td>
				<td><input id ="124" name="permission[]" type="checkbox" value="124" />  <label >124</label> </td>
				</tr>
				<tr>
				<td><input id ="212" name="permission[]" type="checkbox" value="212" />  <label >212</label> </td>
				<td><input id ="213" name="permission[]" type="checkbox" value="213" />  <label >213</label> </td>
				<td><input id ="214" name="permission[]" type="checkbox" value="214" />  <label >214</label> </td>
				<td><input id ="216" name="permission[]" type="checkbox" value="216" />  <label >216</label> </td>
				<td><input id ="218" name="permission[]" type="checkbox" value="218" />  <label >218</label> </td>
				<td><input id ="237" name="permission[]" type="checkbox" value="237" />  <label >237</label> </td>
				</tr>
				<tr>
				<td><input id ="312" name="permission[]" type="checkbox" value="312" />  <label >312</label> </td>
				<td><input id ="313" name="permission[]" type="checkbox" value="313" />  <label >313</label> </td>
				<td><input id ="314" name="permission[]" type="checkbox" value="314" />  <label >314</label> </td>
				<td><input id ="316" name="permission[]" type="checkbox" value="316" />  <label >316</label> </td>
				<td><input id ="318" name="permission[]" type="checkbox" value="318" />  <label >318</label> </td>
				<td><input id ="337" name="permission[]" type="checkbox" value="337" />  <label >337</label> </td>
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
			                             <td><input id ="1" name="permission[]" type="checkbox" value="1" />  <label >تأكيد تسجيل متعلم جديد</label> </td>
									<tr/><tr>	 
                                         <td><input id ="2" name="permission[]" type="checkbox" value="2" />  <label >تأكيد تسجيل متعلم سابق</label> </td>
									</tr><tr>	 
                                         <td><input id ="3" name="permission[]" type="checkbox" value="3" />  <label >تحديث المؤكدين</label> </td>

			                          </tr><tr>	 
                                         <td><input id ="4" name="permission[]" type="checkbox" value="4" />  <label >تسيير المواعيد</label> </td>

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
                            <input type="submit"  id="valider" class="btn btn-info"  value="تأكيد التسجيل" 	>
                            <input type="button" id="annuler"  class="btn btn-danger"  value="إلــغاء" 	>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
		<?php
			}else{
				$this->load->view('login/login');	
			}
           ?>	