<script>
function pagination(page){
 var search = $("input#fieldSearch").val();
 var record = $("select#pageRecord").val(); 
   if (search!==""){
    dataString = 'starting='+page+'&name='+search+'&perpage='+ record+'&random='+Math.random();
  }
 
  else{
    dataString = 'starting='+page+'&perpage='+record+'&random='+Math.random();
  }
  
  $.ajax({
    url:"country/tablepage.php",
    data: dataString,
    type:"GET",
    success:function(data)
    {
      $('#divPageData').html(data);
    }
  });
}

function loadData(){
    var dataString;
    var search = $("input#fieldSearch").val();
    var record = $("select#pageRecord").val();
	dataString = 'name='+ search + '&perpage=' + record;
    
      $.ajax({
      url: "country/tablepage.php",
      type: "GET",
      data: dataString,
      success:function(data)
      {
        $('#divPageData').html(data);
      }
    });
  }


  
$('#students tr:even:not(#nav):not(#total)').addClass('even');
$('#students tr:odd:not(#nav):not(#total)').addClass('odd');
 $("form#form1").submit(function(){


    var vUserid= $("input#edit_user_id").val();
    var vUserAccount= $("input#edit_user_account").val();
    var vUserEmail= $("input#edit_user_mail").val();
    var vUserName= $("input#edit_user_name").val();
    var vUserPassword= $("input#edit_user_password").val();
    var vUserRegistration= $("#edit_user_registration_status").val();
    var vUserValueChain = $('.Chk:checked').map(function() {return this.value;}).get().join(',');
    //var vRegion= $("#edit_region").val();
    //var vCountry= $("#edit_country").val();
    var vDistrict = $('.edit_district:checked').map(function() {return this.value;}).get().join(',');
    var vType_of_business = $('.edit_type_of_business:checked').map(function() {return this.value;}).get().join(',');
    var vSector = $('.edit_sector:checked').map(function() {return this.value;}).get().join(',');
    var vMembershipBased = $('.edit_membership_organisation:checked').map(function() {return this.value;}).get().join(',');
    var vLegalStatus = $('.edit_legalStatus:checked').map(function() {return this.value;}).get().join(',');
    var vRegisteredURA = $('.edit_ura_registered:checked').map(function() {return this.value;}).get().join(',');
    var vRegion = $('.edit_regions:checked').map(function() {return this.value;}).get().join(',');
    var vCountry = $('.edit_country:checked').map(function() {return this.value;}).get().join(',');

    
   
    //alert(vUserValueChain);
	 
	if ((vUserid=="")){
	   alert("Please complete the missing field(s)");
        $("input#edit_user_id").focus();
        return false;
		}
	// else if( !myRegExp.test(vExam)){
    //    alert ('Invalid Format for Exam No.');
    //    $("input#edit_exam_no").focus();
     //   return false;
     // }
	else{
    //var f = $(this).serialize();
   // console.log(f);
    //console.log($(this).attr("method"));


    /*$.post('country/process_data.php',{id:vid,sub_date:vSubmissionDate,endDate:vendDateTime, deviceID:vdeviceid}, function(data, textStatus,errorThrown){
              //var a = data;
              console.log("response is"+ data);
              console.log(textStatus);
            }).fail(function(jqXHR,textStatus, errorThrown){   alert(textStatus);   }); */




          $.ajax({
          url: "country/process_data.php",
          type:$(this).attr("method"), 
          data:$(this).serialize(), 
          //dataType: 'json', 
          success:function(data, textStatus,errorThrown){
             if(textStatus == "success") // return nilai dari hasil proses
             {
                  console.log(data);
                  //console.log(vUserValueChain);
                  
                   $(".morph-content").hide(2000);				  
                   
				  loadData();
             }
             else if(textStatus != "success")
             {
                alert("Please complete the missing field(s)");
				$("input#add_name").focus();
             }
			// else if(response.status==2)
            // {
            //    alert("Invalid Format for Exam No.");
			//	$("input#add_exam_no").focus();
           //  }
			 
			 else
             {
                alert("Data update unsccessful");
             }
          }
        });   
        return false; 
      }
	 return false;
  });

  
  $("form#form2").submit(function(){
    
	      $.ajax({
          url: "country/process_data.php",
          type:$(this).attr("method"), 
          data:$(this).serialize(), 
          dataType: 'json', 
          success:function(response){
             if(response.status == 1) // return nilai dari hasil proses
             {
                  alert("Data Successfully Delected");
                  
                   $(".morph-content").hide(2000);				  
                   
				  loadData();
             }
             else
             {
                alert("Data Failed to Delete");
             }
          }
        });
        return false;
      
	
  });  
</script>
<script src="js/modernizr.custom.js"></script>
<script src="js/classie.js"></script>
<script src="js/uiMorphingButton_fixed.js"></script>
<script src="js/buttonMorp.js"></script>


<?php
error_reporting(E_ALL^E_NOTICE);
include('../pagination_class.php');
include('../connect.php');

if (isset($_GET['name']) and !empty($_GET['name'])){
  $name = $_GET['name'];
  $sql = "SELECT  * FROM users_registration_table2";
}
else{
  $sql = "SELECT  * FROM users_registration_table2";
}

if(isset($_GET['starting'])){ //starting page
    $starting=$_GET['starting'];
}else{
    $starting=0;
}
 
$recpage=$_GET['perpage'];

$obj = new pagination_class($sql,$starting,$recpage);		
$result = $obj->result;
?>       
<div id="page_contents">
 		 
  <div id="addDiv">
    <div  class="morph-button morph-button-modal morph-button-modal-2 morph-button-fixed">
	    <button type="button"></button>
			<div class="morph-content">
				<div>
					<div class="content-style-form content-style-form-1">
					  <span class="icon icon-close">Close the dialog</span>
					   <h2>Add Data</h2>
						<form id="form1" method="post" >
							<p><label>Country</label><input type="text" id="add_name" name="add_name" /></p>
							  <p><input type="submit" value="Add" /></p>
							<input type="hidden" id="action" name="action" value="add" />
						</form>
					</div>
				</div>
			</div>
	</div>
  </div>
	
	  <div id="student_wrap"> 	
		<table  id="students"  width="100%" >
			<tr>
            <th style="padding-left:19px;"></th>
            <th style="padding-left:19px;"></th>
            <th>User id</th>
            <th>User account</th>
            <th>User email</th>
            <th>User name</th>
            <th>User password</th>
            <th>Status</th>
            <th>Value chain</th>
            <th>Region</th>
            <th>Country</th>
            <th>District</th>
            <th>Type of business</th>
            <th>Sector</th>
            <th>Membership based firm</th>
            <th>Legal status</th>
            <th>URA Registered</th>
            
            

                  
			</tr>
            
				<?php if(mysqli_num_rows($result)!=0){
					$counter = $starting + 1;
					while($reportRow = mysqli_fetch_array($result)) {
                        echo '<tbody><tr class="odd gradeX">';
                        ?>
                        <td>  
                <style>
                    .picture{float:left; width: 440px;}
                    #Library{float: left;width:100%;bckground: pink;}
                    #libLeftCotent{float: left;width:45%;bckground: orange;}
                    #libRightCotent{float: left;width:43%;bckground: aqua;margin-left:10px;}
                    #libRightCotent p{border-bottom:2px solid #EEEEEE;}
                    .pictureTitles{float:left;color:#23E176;margin-right:50px;bckground: yellow;width: 240px;}
                    .gallery{float:left;background: pink;}
                </style> 
                      <div class="morph-button morph-button-modal morph-button-modal-2 morph-button-fixed">
                        <button type="button">Edit</button>
                        <div class="morph-content">
                            <div>
                                <div class="content-style-form content-style-form-1">
                                    <span class="icon icon-close">Close</span>
                                    <?php //echo '<div class="gallery"><a href="'.$image.'" target="_blank">View image</a></div>' ; ?>
                                        <h2>Edit Form</h2>
                                        <form id="form1" method="post" >
                                        <p><label>user id</label><input type="text" id="edit_user_id" name="edit_user_id" value="<?php echo $reportRow['user_id']; ?>" readonly /></p>
                                        <p><label>user account</label><input type="text" id="edit_user_account" name="edit_user_account" value="<?php echo $reportRow['user_account']; ?>" /></p>
                                        <p><label>User email</label><input type="text" id="edit_user_mail" name="edit_user_mail" value="<?php echo $reportRow['user_mail']; ?>" /></p>
                                        <p><label>User name</label><input type="text" id="edit_user_name" name="edit_user_name" value="<?php echo $reportRow['user_name']; ?>" /></p>
                                        <p><label>User password</label><input type="text" id="edit_user_password" name="edit_user_password" value="<?php echo $reportRow['user_password']; ?>" /></p>
                                        <p><label>User registration status</label>
                                          <select name="edit_user_registration_status" id="edit_user_registration_status">
                                              <option>Approved</option>
                                              <option>Rejected</option>
                                          </select>
                                        <p><label>Value chain</label>
                                          <p><input type="checkbox" name="value[]"  class="Chk" value="grains" /><b>Grains</b><br/></p>
                                          <p><input type="checkbox" name="value[]" class="Chk"  value="coffee"/><b>Coffee</b><br/></p>
                                          <p><input type="checkbox" name="value[]"  class="Chk" value="pulse"/><b>Pulse</b><br/></p>
                                          <p><input type="checkbox" name="value[]"  class="Chk" value="diary"/><b>Diary</b><br/></p>
                                          <p><input type="checkbox" name="value[]"  class="Chk" value="poultry"/><b>Poultry</b><br/></p>
                                          <p><input type="checkbox" name="value[]"  class="Chk" value="horticulture"/><b>Horticulture</b><br/></p>
                                          <p><input type="checkbox" name="value[]"  class="Chk" value="cattle"/><b>Cattle</b><br/></p>
                                          <p><input type="checkbox" name="value[]"  class="Chk" value="others"/><b>Others</b><br/></p>
                                        </p>

                                        <!-- the regions -->
                                        <!-- <p><label>Region</label>
                                            <select name="edit_region" id="edit_region">
                                                <option>Northern Uganda</option>
                                                <option>Southern Uganda</option>
                                                <option>Western Uganda</option>
                                                <option>Eastern Uganda</option>
                                            </select>
                                        </p> -->
                                          <p><label>Region</label>
                                          <p><input type="checkbox" name="edit_regions[]"  class="edit_regions" value="northern" /><b>Northern Uganda</b><br/></p>
                                          <p><input type="checkbox" name="edit_regions[]" class="edit_regions"  value="eastern"/><b>Eastern Uganda</b><br/></p>
                                          <p><input type="checkbox" name="edit_regions[]"  class="edit_regions" value="western"/><b>Western Uganda</b><br/></p>
                                          <p><input type="checkbox" name="edit_regions[]"  class="edit_regions" value="southern"/><b>Southern Uganda</b><br/></p>
                                        </p>




                                        <!--the country and Districts -->
                                        <!-- <p><label>Country</label><input type="text" id="edit_country" name="edit_country" value="<?php echo $reportRow['country']; ?>" />
                                        </p> -->
                                        <p><label>Country</label>
                                          <p><input type="checkbox" name="edit_country[]"  class="edit_country" value="uganda" /><b>Uganda</b><br/></p>
                                          <p><input type="checkbox" name="edit_country[]" class="edit_country"  value="kenya"/><b>Kenya</b><br/></p>
                                          <p><input type="checkbox" name="edit_country[]"  class="edit_country" value="tanzania"/><b>Tanzania</b><br/></p>
                                          <p><input type="checkbox" name="edit_country[]"  class="edit_country" value="burundi"/><b>Burundi</b><br/></p>
                                        </p>
                                        



                                        <p>
                                          <label>District</label>
                                          <?php
                                              require_once('../../../templates/config.php');
                                              $pdo=pdo_connect();
                                              $districts=$pdo->query("select distinct `District 2` from new_opensme_rawdata2 group by instanceID");
                                              $rows=$districts->fetchAll(PDO::FETCH_NUM);
                                           ?>
                                          
                                            <p>
                                            <?php foreach($rows as $district){?>
                                              <input type="checkbox" name="edit_district[]" class="edit_district" value="<?php echo $district[0]; ?>"/><?php echo $district[0]; ?><br/>
                                            <?php } ?>
                                            </p> 

                                             <p><label>Type of business</label>
                                             <?php
                                                  $tob_stmt = $pdo->query("select distinct `Type of Business` from new_opensme_rawdata2 group by instanceID");
                                                  $tob_res = $tob_stmt->fetchAll(PDO::FETCH_NUM);
                                                  foreach($tob_res as $rows2){
                                              ?>
                                            <input type="checkbox" id="edit_type_of_business" class="edit_type_of_business" name="edit_type_of_business[]" value="<?php echo $rows2[0]; ?>"/><?php echo $rows2[0]; ?><br/>
                                              <?php } ?>
                                         </p>
                                          
                                          <p><label>Sector</label>
                                            <?php
                                               $sector = $pdo->query("select distinct `Sector` from new_opensme_rawdata2 group by instanceID");
                                               $sector_res = $sector->fetchAll(PDO::FETCH_NUM);
                                               foreach($sector_res as $rows3){
                                              ?>
                                            <input type="checkbox" id="edit_sector" class="edit_sector" name="edit_sector[]" value="<?php echo $rows3[0]; ?>" /><?php echo $rows3[0]; ?><br/>
                                              <?php } ?>
                                            </p>


                                            <p><label>Membership based organisation</label>
                                   <?php
                                      $membership = $pdo->query("select distinct `Membership based Firm` from new_opensme_rawdata2 group by instanceID");
                                      $membership_rows = $membership->fetchAll(PDO::FETCH_NUM);
                                      foreach($membership_rows as $rows4){
                                ?>
                              <input type="checkbox" id="edit_membership_organisation" class="edit_membership_organisation" name="edit_membership_organisation[]" value="<?php echo $rows4[0]; ?>" /><?php echo $rows4[0]; ?><br/>
                                <?php } ?>
                            </p>
                            
                            <p><label>Legal status</label>
                              <?php
                                      $legalStatus = $pdo->query("select distinct `Does Organisation Have Legal Status` from new_opensme_rawdata2 group by instanceID");
                                      $legalStatus_rows = $legalStatus->fetchAll(PDO::FETCH_NUM);
                                      foreach($legalStatus_rows as $rows5){
                                ?>
                              <input type="checkbox" id="edit_legalStatus" class="edit_legalStatus" name="edit_legalStatus[]" value="<?php echo $rows5[0]; ?>" /><?php echo $rows5[0]; ?><br/>
                              <?php } ?>
                            </p>
                            <p><label>URA registered</label>
                              <?php
                                      $URARegister = $pdo->query("select distinct `URA Registered` from new_opensme_rawdata2 group by instanceID");
                                      $URARegister_rows = $URARegister->fetchAll(PDO::FETCH_NUM);
                                      foreach($URARegister_rows as $rows6){
                               ?>
                            <input type="checkbox" id="edit_ura_registered" class="edit_ura_registered" name="edit_ura_registered[]" value="<?php echo $rows6[0]; ?>" /><?php echo $rows6[0]; ?><br/>
                            <?php } ?>
                          </p>



                   

                                        <p><input  type="submit" value="OK" /></p>
                                        <input type="hidden" name="action" value="update" />
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                      </td>
                        <td>
                        <div class="morph-buttonDelete morph-button-modalDelete morph-button-modal-2Delete morph-button-fixedDelete">
                        <button type="button">Send</button>
                        <div class="morph-content">
                            <div>
                                <div class="content-style-form content-style-form-1">
                                    <span class="icon icon-close">Close the dialog</span>
                                    <h2 style="color:#F50000">Send entry</h2>
                                       <p ><h2 style="margin:10px 10px;">Are you sure you want to send email?</h2></p>
                                       <form id="form2" method="post" >
                                        <p><input type="hidden"  name="send_id" value="<?php echo $reportRow['id']; ?>" /></p>
                                       <p><input type="submit" value="OK" /></p>
                                        <input type="hidden" name="action" value="delete" />
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                      
                </td> 
                        <?php
                echo '<td>'.$reportRow['user_id']."</td>";
                echo '<td>'.$reportRow['user_account']."</td>";
                echo '<td>'.$reportRow['user_mail']."</td>";
                echo '<td>'.$reportRow['user_name']."</td>";
                echo '<td>'.$reportRow['user_password']."</td>";
                echo '<td>'.$reportRow['user_registration_status']."</td>";
                echo '<td>'.$reportRow['value_chain']."</td>";
                echo '<td>'.$reportRow['region']."</td>";
                echo '<td>'.$reportRow['country']."</td>";
                echo '<td>'.$reportRow['district']."</td>";
                echo '<td>'.$reportRow['type_of_business']."</td>";
                echo '<td>'.$reportRow['sector']."</td>";
                echo '<td>'.$reportRow['membership_organisation']."</td>";
                echo '<td>'.$reportRow['legal_status']."</td>";
                echo '<td>'.$reportRow['ura_registered']."</td>";

                
?>     
					 
					 
			</tr></tbody> <?php } ?>
			
            <tfoot><tr id="nav"><td colspan="21"><div><?php echo $obj->anchors; ?></div></td>
			</tr>
			<tr id="total"><td colspan="21"><?php echo $obj->total; ?></td>
			</tr>
				<?php } else{ ?>
			<tr><td align="center" colspan="21">No Data Found</td>
			</tr></tfoot>
				<?php } ?>
				
		</table>
	  </div>		
	</div>
	
  	
<script>
    $(document).ready(function () {
        $("div.gallery a").click(function (event) {
            event.preventDefault();
            $("div.picture").html($("<img>").attr("src", this.href).fadeIn(1000));
        });
    });
</script>