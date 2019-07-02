<?php
session_start();
if(isset($_SESSION['organisation'])){
    $organisation = $_SESSION['organisation'];
  }
  //echo $organisation;
?>

<style>
h1{font-size:12px;}
</style>

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

    //get all the form values
    var vOrganisation=$('input#edit_OrganisationName').val();
    var vAssets=$('input#edit_Assets').val();
    var vLandOwnership =$('input#edit_LandOwnership').val();
    var vLeaseHigher=$('input#edit_Lease7Higher').val();
    var vLandAcquisation=$('input#edit_LandAcquisationDate').val();
    var vLandCurrentValue=$('input#edit_LandCurrentValue').val();
    var vLandSize=$('input#edit_TotalLandSize').val();
    var vOfficeOwnership=$('input#edit_OfficeOwnership').val(); 
    var vOfficeAcquisation=$('input#edit_OfficeAcquisationDate').val();
    var vOfficeTotalCap=$('input#edit_OfficeTotalCapacity').val();
    var vOfficeVal=$('input#edit_OfficeCurrentValue').val();
var vFencedOwnership =$('input#edit_FencedYardOwnership').val();
var vFencedDate=$('input#edit_FencedYardDate').val();
var vFencedYardSize=$('input#edit_FencedYardSize').val();
var vFencedValue=$('input#edit_FencedYardCurrentValue').val();
var vStorageOwnership=$('input#edit_StorageCapacityOwnership').val();
var vStorageCap =$('input#edit_StorageTotalCapacity').val();
var vStorageCurrentVal =$('input#edit_StorageCurrentValue').val();
var vStorageSize=$('input#edit_StorageSize').val();
var vFactoryType= $('input#edit_TypeFactory').val();
var vFactoryOwnership= $('input#edit_FactoryOwnership').val();
var vFactoryAcquisation= $('input#edit_FactoryAcquisation').val();
var vFactoryCap= $('input#edit_FactoryCapacity').val();
var vFactoryVal= $('input#edit_FactoryCurrentValue').val();
var vTransportOwnership= $('input#edit_TransportOwnership').val();
var vVehicleDate= $('input#edit_VehicleAcquisationDate').val();
var vTotalCap= $('input#edit_VehicleTotalCapacity').val();
var vVehicleVal= $('input#edit_VehicleValue').val();
var vTruckOwnership= $('input#edit_TruckOwnership').val();
var vTruckDate= $('input#edit_TruckAcquisationDate').val();
var vTruckCap= $('input#edit_TruckCapacity').val();
var vTruckValue= $('input#edit_TruckCurrentValue').val();
var vEquipmentOwnership= $('input#edit_OfficeEquipmentOwnership').val();
var vEquipmentDate= $('input#edit_EquipmentDateAcquisation').val();
var vEquipmentVal= $('input#edit_EquipmentCurrentValue').val();
var vComputerOwnership= $('input#edit_ComputerOwnership').val();
var vComputerDate= $('input#edit_ComputerDateAcquisation').val();
var vComputerVal= $('input#edit_ComputerCurrentValue').val();
var vAssetOwnership= $('input#edit_OtherAssetOwnership').val();
var vAssetDate= $('input#edit_OtherAssetAcquisation').val();
var vAssetCap= $('input#edit_OtherAssetTotalCapacity').val();
var vAssetValue= $('input#edit_AssetCurrentValue').val();
var vInstanceName= $('input#edit_InstanceName').val();
var vInstanceID= $('input#edit_InstanceID').val();











    

	 
	if ((vOrganisation=="")){
	   alert("Please complete the missing field(s)");
        $("input#edit_OrganisationName").focus();
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
          error:function(){
            console.log("Nothing is working");
          },
          success:function(data, textStatus,errorThrown){
             if(textStatus=="success") // return nilai dari hasil proses
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
                alert("Data update unsuccessful");
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
<script>
 $(function(){
  var t = $("#instances").val();
  $('#onNewPage').val(t);
 }); 
</script>
<?php //print_r($_GET); ?>

<?php
error_reporting(E_ALL^E_NOTICE);
include('../pagination_class.php');
include('../connect.php');

 $a=$_SESSION['user_mail'];
 


if (isset($_GET['name']) and !empty($_GET['name'])){
  $name = $_GET['name'];
  //session user email
    $sql="select * from new_opensme_rawdata2 where instanceID='$organisation'";                
}
else{
        //$sql = "SELECT  * FROM financial_component_edit group by instanceID";
       $sql="select * from new_opensme_rawdata2 where instanceID='$organisation'";
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
    <?php echo $user; ?>
 		 
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
         <th>Organisation Name</th>
         <th>Assets</th>
         <th>Land Ownership</th>
         <th>Lease 7 years Higher</th> 
         <th>Land Acquistion Date</th>
         <th>Land Total Size</th> 
         <th>Land Current Value</th> 
         <th>Office Ownership</th> 
         <th>Office Acquistion Date</th>
         <th>Office Total Capacity</th> 
         <th>Office Current Value</th> 
         <th>Fenced Yard Ownership</th> 
         <th>Fenced Yard Acquistion Date</th> 
         <th>Fenced Yard Total Size</th> 
         <th>Fenced Yard Current Value</th>
         <th>Asset Ownership</th>
         <th>Asset Total Capacity</th>
         <th>Asset Total Current Value</th>
         <th>Type of Factory</th>
         <th>Ownership factory Asset</th>
         <th>Factory Land Acquisation</th>
         <th>Factory Capacity</th>
         <th>Factory Current Value</th>
         <th>Ownership of Transport</th>
         <th>Vehicle Acquisation Date</th>
         <th>Vehicle Total Capacity</th>
         <th>Vehicle Total Current Value</th>
         <th>Truck Ownership</th>
         <th>Truck Acquisation Date</th>
         <th>Truck Capacity</th>
         <th>Truck Current Value</th>
         <th>Office Equipment Ownership</th>
         <th>Equipment Date Acquisation</th>
         <th>Equipment Current Value</th>
         <th>Computer Ownership</th>
         <th>Computer Date Acquisation</th>
         <th>Computer Current Value</th>
         <th>Ownership Other Asset</th>
         <th>Other Asset Acquisation Date</th>
         <th>Other Asset Total Capacity</th>
         <th>Other Asset Current Value</th>
         <th>instanceName</th>
         <th>instanceID</th>                  
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
                                        <form id="form1" method="post">  
  <p><label>Organisation Name</label><input type="text" id="edit_OrganisationName" name="edit_OrganisationName" value="<?php echo $reportRow['Organisation Name'];  ?>"/></p>                                     
 <p><label>Assets</label><input type="text" id="edit_Assets" name="edit_Assets" value="<?php if(!empty($reportRow['Other Assets'])){ echo $reportRow['Assets'].','.$reportRow['Other Assets']; } else { echo $reportRow['Assets']; } ?>"  /></p>
 <p><label>Land Ownership</label><input type="text" id="edit_LandOwnership" name="edit_LandOwnership" value="<?php echo $reportRow['Land Ownership']; ?>"  /></p>
 <p><label>Lease Higher than 7 years</label><input type="text" id="edit_Lease7Higher" name="edit_Lease7Higher" value="<?php echo $reportRow['Lease 7 years Higher']; ?>"  /></p> 
 <p><label>land acquisation date</label><input type="text" id="edit_LandAcquisationDate" name="edit_LandAcquisationDate" value="<?php echo $reportRow['Land Acquistion Date']; ?>" /></p>
 <p><label>Total Land size</label><input type="text" id="edit_TotalLandSize" name="edit_TotalLandSize" value="<?php echo $reportRow['Land Total Size']; ?>"  /></p> 
 <p><label>Land currrent value</label><input type="text" id="edit_LandCurrentValue" name="edit_LandCurrentValue" value="<?php  echo  $reportRow['Land Current Value']; ?>"  /></p>   
 <p><label>Office building ownership</label><input type="text" id="edit_OfficeOwnership" name="edit_OfficeOwnership" value="<?php  echo  $reportRow['Office Ownership']; ?>"  /></p>   
 <p><label>Office building acquisation date</label><input type="text" id="edit_OfficeAcquisationDate" name="edit_OfficeAcquisationDate" value="<?php  echo  $reportRow['Office Acquistion Date']; ?>"  /></p>  

 <p><label>Office total Capacity</label><input type="text" id="edit_OfficeTotalCapacity" name="edit_OfficeTotalCapacity" value="<?php  echo  $reportRow['Office Total Capacity']; ?>"  /></p>   
 <p><label>Office current value</label><input type="text" id="edit_OfficeCurrentValue" name="edit_OfficeCurrentValue" value="<?php  echo  $reportRow['Office Current Value']; ?>"  /></p>   

 <p><label>Fenced yard Ownership</label><input type="text" id="edit_FencedYardOwnership" name="edit_FencedYardOwnership" value="<?php  echo  $reportRow['Fenced Yard Ownership']; ?>"  /></p>   
 <p><label>Fenced Yard Acquisation date</label><input type="text" id="edit_FencedYardDate" name="edit_FencedYardDate" value="<?php  echo  $reportRow['Fenced Yard Acquistion Date']; ?>"  /></p>   
 <p><label>Fenced Yard Total size</label><input type="text" id="edit_FencedYardSize" name="edit_FencedYardSize" value="<?php  echo  $reportRow['Fenced Yard Total Size']; ?>"  /></p>   
 <p><label>Fenced Yard current value</label><input type="text" id="edit_FencedYardCurrentValue" name="edit_FencedYardCurrentValue" value="<?php  echo  $reportRow['Fenced Yard Current Value']; ?>"  /></p>  
 <p><label>Storage Capacity ownership</label><input type="text" id="edit_StorageCapacityOwnership" name="edit_StorageCapacityOwnership" value="<?php  echo  $reportRow['Asset Ownership']; ?>"  /></p>  
 <p><label>Storage Capacity Total Capacity</label><input type="text" id="edit_StorageTotalCapacity" name="edit_StorageTotalCapacity" value="<?php  echo  $reportRow['Asset Total Capacity']; ?>"  /></p>  
 <p><label>Storage Capacity current value</label><input type="text" id="edit_StorageCurrentValue" name="edit_StorageCurrentValue" value="<?php  echo  $reportRow['Asset Total Current Value']; ?>"  /></p>  
 <p><label>Storage Capacity Size</label><input type="text" id="edit_StorageSize" name="edit_StorageSize" value="<?php  echo  $reportRow['Asset Total Capacity']; ?>"  /></p>  
 <p><label>Type of Factory</label><input type="text" id="edit_TypeFactory" name="edit_TypeFactory" value="<?php  echo  $reportRow['Type of Factory']; ?>"  /></p>  
 <p><label>Factory Ownership</label><input type="text" id="edit_FactoryOwnership" name="edit_FactoryOwnership" value="<?php  echo  $reportRow['Ownership factory Asset']; ?>"  /></p>  
 <p><label>Factory Acquisation</label><input type="text" id="edit_FactoryAcquisation" name="edit_FactoryAcquisation" value="<?php  echo  $reportRow['Factory Land Acquisation']; ?>"  /></p>  
 <p><label>Capacity of factory</label><input type="text" id="edit_FactoryCapacity" name="edit_FactoryCapacity" value="<?php  echo  $reportRow['Factory Capacity']; ?>"  /></p>  
 <p><label>Factory current value</label><input type="text" id="edit_FactoryCurrentValue" name="edit_FactoryCurrentValue" value="<?php  echo  $reportRow['Factory Current Value']; ?>"  /></p>  
 <p><label>Transport Ownership</label><input type="text" id="edit_TransportOwnership" name="edit_TransportOwnership" value="<?php  echo  $reportRow['Ownership of Transport']; ?>"  /></p>  
 <p><label>Vehicle acquisation date</label><input type="text" id="edit_VehicleAcquisationDate" name="edit_VehicleAcquisationDate" value="<?php  echo  $reportRow['Vehicle Acquisation Date']; ?>"  /></p>  
 <p><label>Vehicle total capacity</label><input type="text" id="edit_VehicleTotalCapacity" name="edit_VehicleTotalCapacity" value="<?php  echo  $reportRow['Vehicle Total Capacity']; ?>"  /></p>  
 <p><label>Vehicle total current value</label><input type="text" id="edit_VehicleValue" name="edit_VehicleValue" value="<?php  echo  $reportRow['Vehicle Total Current Value']; ?>"  /></p>  
 <p><label>Truck ownership</label><input type="text" id="edit_TruckOwnership" name="edit_TruckOwnership" value="<?php  echo  $reportRow['Truck Ownership']; ?>"  /></p>  
 <p><label>Truck acquisation date</label><input type="text" id="edit_TruckAcquisationDate" name="edit_TruckAcquisationDate" value="<?php  echo  $reportRow['Truck Acquisation Date']; ?>"  /></p>  
 <p><label>Truck capacity</label><input type="text" id="edit_TruckCapacity" name="edit_TruckCapacity" value="<?php  echo  $reportRow['Truck Capacity']; ?>"  /></p>  
 <p><label>Truck current value</label><input type="text" id="edit_TruckCurrentValue" name="edit_TruckCurrentValue" value="<?php  echo  $reportRow['Truck Current Value']; ?>"  /></p>  
 <p><label>Office Equipment ownership</label><input type="text" id="edit_OfficeEquipmentOwnership" name="edit_OfficeEquipmentOwnership" value="<?php  echo  $reportRow['Office Equipment Ownership']; ?>"  /></p>  
 <p><label>Equipment Date Acquisation</label><input type="text" id="edit_EquipmentDateAcquisation" name="edit_EquipmentDateAcquisation" value="<?php  echo  $reportRow['Equipment Date Acquisation']; ?>"  /></p>  
 <p><label>Office Equipment current value</label><input type="text" id="edit_EquipmentCurrentValue" name="edit_EquipmentCurrentValue" value="<?php  echo  $reportRow['Equipment Current Value']; ?>"  /></p>  
 <p><label>Computer ownership</label><input type="text" id="edit_ComputerOwnership" name="edit_ComputerOwnership" value="<?php  echo  $reportRow['Computer Ownership']; ?>"  /></p>  
 <p><label>Computer date acquisation</label><input type="text" id="edit_ComputerDateAcquisation" name="edit_ComputerDateAcquisation" value="<?php  echo  $reportRow['Computer Date Acquisation']; ?>"  /></p>  
 <p><label>Computer current value</label><input type="text" id="edit_ComputerCurrentValue" name="edit_ComputerCurrentValue" value="<?php  echo  $reportRow['Computer Current Value']; ?>"  /></p>  
 <p><label>Asset ownership</label><input type="text" id="edit_OtherAssetOwnership" name="edit_OtherAssetOwnership" value="<?php  echo  $reportRow['Ownership Other Asset']; ?>"  /></p>  
 <p><label>Other Asset Acquisation date</label><input type="text" id="edit_OtherAssetAcquisation" name="edit_OtherAssetAcquisation" value="<?php  echo  $reportRow['Other Asset Acquisation Date']; ?>"  /></p>  
 <p><label>Other Asset total capacity</label><input type="text" id="edit_OtherAssetTotalCapacity" name="edit_OtherAssetTotalCapacity" value="<?php  echo  $reportRow['Other Asset Total Capacity']; ?>"  /></p>  
 <p><label>Asset current value</label><input type="text" id="edit_AssetCurrentValue" name="edit_AssetCurrentValue" value="<?php  echo  $reportRow['Other Asset Current Value']; ?>"  /></p>
 <p><label>Instance Name</label><input type="text" id="edit_InstanceName" name="edit_InstanceName" value="<?php  echo  $reportRow['instanceName']; ?>"  readonly/></p> 
 <p><label>InstanceID</label><input type="text" id="edit_InstanceID" name="edit_InstanceID" value="<?php  echo  $reportRow['instanceID']; ?>"  readonly/></p> 
                                        

                   

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
                        <button type="button">Delete</button>
                        <div class="morph-content">
                            <div>
                                <div class="content-style-form content-style-form-1">
                                    <span class="icon icon-close">Close the dialog</span>
                                    <h2 style="color:#F50000">Delete entry</h2>
                                       <p ><h2 style="margin:10px 10px;">Are you sure you want to delete this entry?</h2></p>
                                       <form id="form2" method="post" >
                                        <p><input type="hidden"  name="delete_id" value="<?php echo $reportRow['instanceID']; ?>" /></p>
                                       <p><input type="submit" value="OK" /></p>
                                        <input type="hidden" name="action" value="delete" />
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                      
                </td> 
                        <?php
 echo '<td>'.$reportRow['Organisation Name']."</td>"; 
 if(!empty($reportRow['Other Assets'])) {echo '<td>'.$reportRow['Assets'].','.$reportRow['Other Assets']."</td>"; } else {echo '<td>'.$reportRow['Assets']."</td>";} 
 echo '<td>'.$reportRow['Land Ownership']."</td>"; 
 echo '<td>'.$reportRow['Lease 7 years Higher']."</td>";  
 echo '<td>'.$reportRow['Land Acquistion Date']."</td>";
 echo '<td>'.$reportRow['Land Total Size']."</td>";  
 echo '<td>'.$reportRow['Land Current Value']."</td>";  
 echo '<td>'.$reportRow['Office Ownership']."</td>";  
 echo '<td>'.$reportRow['Office Acquistion Date']."</td>"; 
 echo '<td>'.$reportRow['Office Total Capacity']."</td>";  
 echo '<td>'.$reportRow['Office Current Value']."</td>";  
 echo '<td>'.$reportRow['Fenced Yard Ownership']."</td>";  
 echo '<td>'.$reportRow['Fenced Yard Acquistion Date']."</td>";  
 echo '<td>'.$reportRow['Fenced Yard Total Size']."</td>";  
 echo '<td>'.$reportRow['Fenced Yard Current Value']."</td>"; 
 echo '<td>'.$reportRow['Asset Ownership']."</td>"; 
 echo '<td>'.$reportRow['Asset Total Capacity']."</td>"; 
 echo '<td>'.$reportRow['Asset Total Current Value']."</td>"; 
 echo '<td>'.$reportRow['Type of Factory']."</td>"; 
 echo '<td>'.$reportRow['Ownership factory Asset']."</td>"; 
 echo '<td>'.$reportRow['Factory Land Acquisation']."</td>"; 
 echo '<td>'.$reportRow['Factory Capacity']."</td>"; 
 echo '<td>'.$reportRow['Factory Current Value']."</td>"; 
 echo '<td>'.$reportRow['Ownership of Transport']."</td>"; 
 echo '<td>'.$reportRow['Vehicle Acquisation Date']."</td>"; 
 echo '<td>'.$reportRow['Vehicle Total Capacity']."</td>"; 
 echo '<td>'.$reportRow['Vehicle Total Current Value']."</td>"; 
 echo '<td>'.$reportRow['Truck Ownership']."</td>"; 
 echo '<td>'.$reportRow['Truck Acquisation Date']."</td>"; 
 echo '<td>'.$reportRow['Truck Capacity']."</td>"; 
 echo '<td>'.$reportRow['Truck Current Value']."</td>"; 
 echo '<td>'.$reportRow['Office Equipment Ownership']."</td>"; 
 echo '<td>'.$reportRow['Equipment Date Acquisation']."</td>"; 
 echo '<td>'.$reportRow['Equipment Current Value']."</td>"; 
 echo '<td>'.$reportRow['Computer Ownership']."</td>"; 
 echo '<td>'.$reportRow['Computer Date Acquisation']."</td>"; 
 echo '<td>'.$reportRow['Computer Current Value']."</td>"; 
 echo '<td>'.$reportRow['Ownership Other Asset']."</td>"; 
 echo '<td>'.$reportRow['Other Asset Acquisation Date']."</td>"; 
 echo '<td>'.$reportRow['Other Asset Total Capacity']."</td>"; 
 echo '<td>'.$reportRow['Other Asset Current Value']."</td>"; 
 echo '<td>'.$reportRow['instanceName']."</td>";
 echo '<td>'.$reportRow['instanceID']."</td>";
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
<?php // } ?>