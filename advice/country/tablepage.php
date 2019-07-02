<style type="text/css">
    .details {font-size: 1.4em;line-height: 1.25em;color: #575757;font-weight: normal;  margin-bottom: 10px;}
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
$('#students tr:odd:not(#nav):not(#total)').addClass('odd') 
 $("form#form1").submit(function(){
    var vId = $("input#edit_id").val();                  
    var vName = $("input#edit_name").val();                
  //var vAddress = $("input#edit_address").val();         
  //var vExam = $("input#edit_exam_no").val();             
  var myRegExp=/^[A-Z]{2}\d{4}\b/;                  
    
   
  if ((vName=="")){
     alert("Please complete the missing field(s)");
        $("input#edit_name").focus();
        return false;
    }
  // else if( !myRegExp.test(vExam)){
    //    alert ('Invalid Format for Exam No.');
    //    $("input#edit_exam_no").focus();
     //   return false;
     // }
  else{
          $.ajax({
          url: "country/process_data.php",
          type:$(this).attr("method"), 
          data:$(this).serialize(), 
          dataType: 'json', 
          success:function(response){
             if(response.status == 3) // return nilai dari hasil proses
             {
                  alert("Data Successfully Updated");
                  
                   $(".morph-content").hide(2000);          
                   
          loadData();
             }
             else if(response.status==1)
             {
                alert("Please complete the missing field(s)");
        $("input#add_name").focus();
             }
      // else if(response.status==2)
            // {
            //    alert("Invalid Format for Exam No.");
      //  $("input#add_exam_no").focus();
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

if (isset($_GET['name']) and !empty($_GET['name'])){
  $name = $_GET['name'];
  $sql = "SELECT  * FROM tree_library where Name_english like '%$name%'";
}
else{
  $sql = "SELECT  
  id,
  image,
  Latin_genus,
   Latin_family,
  Latin_species,
  Subspecies,
  Name_english,
  Name_luganda,
  French_Name,
  Swahili_Name,
  size,
  growth_rate,
  Years_to_mature,
  grows_in_sun,
  grows_in_shade,
  grows_in_any_soil,
  drought_resistant,
  Natural_regeneration,
  Stem_cuttings_success_rate,
  provides_firewood,
  provides_charcoal,
  provides_food,
  provides_mulch,
  Construction_provides_poles,
  Construction_provides_beams,
  Construction_timber_quality,
  Construction_type,
  Construction_durable_outdoors,
  Construction_durable_in_water,                
  Remarks,
  User_comments,
  prota4u,
  agroforestree,
  FAO,
  Figweb,
  Plantzafrica
  FROM tree_library order by Name_english";
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
<div id="page_contents" >
     
  
    <div id="student_wrap">   
    <table  id="students"  width="100%"  >
      <tr>
        <th><span id="id2">S/No</span> <span id="Latin_family">Latin family</span> <span id="Latin_species">Latin species</span> <span id="Name_english">Name english</span></th>
      </tr>
        <?php if(mysqli_num_rows($result)!=0){
          $counter = $starting + 1;
          while($data = mysqli_fetch_array($result)) {
                $id = $data['id'];
                $image = $data['image'];
              $Latin_genus = $data['Latin_genus'];
                $Latin_family = $data['Latin_family'];
                $Latin_species= $data['Latin_species'];
                $Subspecies = $data['Subspecies'];
                $Name_english = $data['Name_english'];
              $Name_luganda = $data['Name_luganda'];
                $French_Name = $data['French_Name'];
                $Swahili_Name = $data['Swahili_Name'];
                $size = $data['size'];
                $growth_rate = $data['growth_rate'];
                $Years_to_mature = $data['Years_to_mature'];
                $grows_in_sun = $data['grows_in_sun'];
                $grows_in_shade = $data['grows_in_shade'];
                $grows_in_any_soil = $data['grows_in_any_soil'];
                $drought_resistant = $data['drought_resistant'];
                $Natural_regeneration = $data['Natural_regeneration'];
                $Stem_cuttings_success_rate = $data['Stem_cuttings_success_rate'];
                $provides_firewood = $data['provides_firewood'];
                $provides_charcoal = $data['provides_charcoal'];
                $provides_food = $data['provides_food'];
                $provides_mulch = $data['provides_mulch'];
                $Construction_provides_poles = $data['Construction_provides_poles'];
                $Construction_provides_beams = $data['Construction_provides_beams'];
                $Construction_timber_quality = $data['Construction_timber_quality'];
                $Construction_type = $data['Construction_type'];
                $Construction_durable_outdoors = $data['Construction_durable_outdoors'];
                $Construction_durable_in_water = $data['Construction_durable_in_water'];                
                $Remarks = $data['Remarks'];
              $User_comments = $data['User_comments'];
              $prota4u = $data['prota4u'];
              $agroforestree = $data['agroforestree'];
              $FAO = $data['FAO'];
              $Figweb = $data['Figweb'];
              $Plantzafrica = $data['Plantzafrica'];


                ?>



<?php 
       


?>
         <tr>      
        <td>  
        <style>

          .picture{float:left; width: 440px;}
          #Library{float: left;width:100%;bckground: pink;font-size: 10px;padding:5px;}
          #libLeftCotent{float: left;width:45%;bckground: orange;mrgin-top: 40px;}
          #libLeftCotent p{float: left;width:100%;bckground: orange;}
          #libRightCotent{float: left;width:53%;bckground: aqua;margin-left:16px;margin-top:20px;}
          #libRightCotent p{float: left;width: 100%;font-size:13px;border-bottom:1px solid #EEEEEE;margin-bottom:0px;}
          #libLeftCotent .details {font-size:13px; border-bottom:1px solid #EEEEEE;margin-bottom:0px;}

          #libLeftCotent .details2 {font-size:13px;mrgin-bottom:-10px;}
          #libLeftCotent .details2 a{color:blue;margin-bottom:-10px;}
         .pictureTitles1{float:left;color:#23E176;margin-right:6.5%;bckground: yellow;width: 240px;}
         .pictureTitles1x {float:left;color:#333;margin-right:6.5%;bckground: yellow;width: 240px;}
         .pictureTitles1x a{color:#333;}

  
          .pictureTitles{float:left;color:#23E176;margin-right:6.5%;bckground: yellow;width: 240px;}
          .gallery{float:left;background: pink;}
          #treeTitle{float:left;bckground: pink;mrgin-top: -30px;fnt-weight: bold;font-size: 24px;padding: 2px;color: #666;}
          #id{width:6.5%;color:#333;font-weight:normal;bckground: pink;float: left;text-align: left;}
          #Latin_family{width:20%;color:#333;font-weight:normal;bckground: grey;float: left;text-align: left;}
          #Latin_species{width:30.6%;color:#333;font-weight:normal;bckground: green;float: left;text-align: left;}
          #Name_english{width:42%;color:#333;font-weight:normal;bckground: aqua;float: left;text-align: left;}
          #id2{width:6.5%;color:#333;font-weight:normal;bckground: pink;float: left;text-align: left;margin-left: 5px;}
          #id:hover{color: red;}
          #id,#Latin_family,#Latin_species,#Name_english{font-size: 14px;}
          table th #id2 {font-size: 14px;font-weight: bold;width:6.4%;bckground: green;}
          table th #Latin_family{font-size: 14px;font-weight: bold;width:19.4%;}
          table th #Latin_species{font-size: 14px;font-weight: bold;width:29.7%;}
          table th #Name_english{font-size: 14px;font-weight: bold;}

          table td{bckground: blue}



          


          table{position: absolute;min-width:330px;}
          .answers{bckground:red;margin-left: -30px;}
          .TreeSubHeading{float:left;color: blue;background:#D7E2E5;width: 100%;text-transform: uppercase;}


        </style> 
        
        
        
        
        
        


              <div class="morph-button morph-button-modal morph-button-modal-2 morph-button-fixed">
            <button type="button"><?php echo 
                                            '<span id="id">'.$id.'</span>';
                                            if($Latin_family == ''){echo '<span id="Latin_family"><font color="white">.</font></span>';
                                            }else{echo  '<span id="Latin_family">'.$Latin_family.'</span>';
                                            }
                                            if($Latin_species == ''){echo '<span id="Latin_species"><font color="white">.</font></span>';
                                            }else{echo  '<span id="Latin_species">'.$Latin_species.'</span>';
                                            }
                                            if($Name_english == ''){echo '<span id="Name_english"><font color="white">.</font></span>';
                                            }else{echo  '<span id="Name_english">'.$Name_english.'</span>';
                                            }
                     
                                  ?>
            </button>
            <div class="morph-content">
              <div>
                <div class="content-style-form content-style-form-1">
                  <span class="icon-close" style="font-size:19px;margin-top: -18px;color:red;font-weight:bold;bckground:pink;width: 21px;">X</span>
                  <?php //echo '<div class="gallery"><a href="'.$image.'" target="_blank">View image</a></div>' ; ?>                    
                          <div id="Library">
                        <div id="libLeftCotent">
                          
                            <div id="treeTitle"><?php echo  $Name_english ; ?></div></br> 
                            <p class="details" style="border-bottom:none"><?php echo '<img src="'.$image.'">' ; ?></p></br>      
                            <span class="TreeSubHeading">Species</span> 
                            <p class="details"><?php  if($Latin_genus == ''){echo '<span class="pictureTitles1">Latin genus</span>'.'<font color="#fff">.</font>';}
                                                      else{echo '<span class="pictureTitles1">Latin genus</span>'.'<span class="answers">'. $Latin_genus.'</span>' ; } ?>
                            </p></br> 
                            <p class="details"><?php  if($Latin_family == ''){echo '<span class="pictureTitles1">Latin family</span>'.'<font color="#fff">.</font>';}
                                                      else{echo '<span class="pictureTitles1">Latin family</span>'.'<span class="answers">'. $Latin_family .'</span>'; } ?>
                            </p></br> 
                            <p class="details"><?php  if($Latin_species == ''){echo '<span class="pictureTitles1">Latin species</span>'.'<font color="#fff">.</font>';}
                                                      else{echo '<span class="pictureTitles1">Latin species</span>'.'<span class="answers">'. $Latin_species .'</span>'; } ?>
                            </p></br> 

                            <p class="details"><?php  if($Subspecies == ''){echo '<span class="pictureTitles1">Subspecies</span>'.'<font color="#fff">.</font>';}
                                                      else{echo '<span class="pictureTitles1">Subspecies</span>'.'<span class="answers">'. $Subspecies.'</span>' ; } ?>
                            </p></br> 
                            
                            <span class="TreeSubHeading">Tree Links</span>
                            <p class="details2"><?php  if($prota4u == ''){echo '<span class="pictureTitles1x">prota4u</span>';}
                                                      else{echo '<span class="pictureTitles1x">prota4u &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.$prota4u.'">link</a></span>'; } ?>
                            </p></br> 
                            <p class="details2"><?php  if($agroforestree == ''){echo '<span class="pictureTitles1x">agroforestree</span>';}
                                                      else{echo '<span class="pictureTitles1x">agroforestree &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.$agroforestree.'">link</a></span>'; } ?>
                            </p></br> 
                            <p class="details2"><?php  if($FAO == ''){echo '<span class="pictureTitles1x">FAO</span>';}
                                                      else{echo '<span class="pictureTitles1x">FAO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.$FAO.'">link</a></span>'; } ?>
                            </p></br> 
                            <p class="details2"><?php  if($Figweb == ''){echo '<span class="pictureTitles1x">Figweb</span>';}
                                                      else{echo '<span class="pictureTitles1x">Figweb &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.$Figweb.'">link</a></span>' ; } ?>
                            </p></br> 
                            <p class="details2"><?php  if($Plantzafrica == ''){echo '<span class="pictureTitles1x">Plantzafrica</span>';}
                                                      else{echo '<span class="pictureTitles1x">Plantzafrica &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.$Plantzafrica.'">link</a></span>' ; } ?>
                            </p></br> 

                             
                    
                        </div>
                            <div id="libRightCotent">    
                                
                            <span class="TreeSubHeading">Names</span> 
                              <p class="details"><?php  if($Name_english == ''){echo '<span class="pictureTitles">Name english</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">Name english</span>'.'<span class="answers">'. $Name_english .'</span>';} ?>
                              </p></br>  
                              <p class="details"><?php  if($Name_luganda == ''){echo '<span class="pictureTitles">Name luganda</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">Name luganda</span>'.'<span class="answers">'. $Name_luganda .'</span>';} ?>
                              </p></br> 



                              <p class="details"><?php  if($French_Name == ''){echo '<span class="pictureTitles">French Name</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">French Name</span>'.'<span class="answers">'. $French_Name .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($Swahili_Name == ''){echo '<span class="pictureTitles">Swahili Name</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">Swahili Name</span>'.'<span class="answers">'. $Swahili_Name .'</span>';} ?>
                              </p></br>
                              <span class="TreeSubHeading">Growth</span> 
                              <p class="details"><?php  if($size == ''){echo '<span class="pictureTitles">size</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">size</span>'.'<span class="answers">'. $size .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($growth_rate == ''){echo '<span class="pictureTitles">growth rate</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">growth rate</span>'.'<span class="answers">'. $growth_rate .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($Years_to_mature == ''){echo '<span class="pictureTitles">Years to mature</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">Years to mature</span>'.'<span class="answers">'. $Years_to_mature .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($grows_in_sun == ''){echo '<span class="pictureTitles">grows in sun</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">grows in sun</span>'.'<span class="answers">'. $grows_in_sun .'</span>';} ?>
                              </p></br>                       

                              
                              <p class="details"><?php  if($grows_in_shade == ''){echo '<span class="pictureTitles">grows in shade</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">grows in shade</span>'.'<span class="answers">'. $grows_in_shade .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($grows_in_any_soil == ''){echo '<span class="pictureTitles">grows in any soil</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">grows in any soil</span>'.'<span class="answers">'. $grows_in_any_soil .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($drought_resistant == ''){echo '<span class="pictureTitles">drought resistant</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">drought resistant</span>'.'<span class="answers">'. $drought_resistant .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($Natural_regeneration == ''){echo '<span class="pictureTitles">Natural regeneration</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">Natural regeneration</span>'.'<span class="answers">'. $Natural_regeneration .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($Stem_cuttings_success_rate == ''){echo '<span class="pictureTitles">Stem cuttings success rate</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">Stem cuttings success rate</span>'.'<span class="answers">'. $Stem_cuttings_success_rate .'</span>';} ?>
                              </p></br>
                              <span class="TreeSubHeading">Ecosystem services</span>
                              <p class="details"><?php  if($provides_firewood == ''){echo '<span class="pictureTitles">provides firewood</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">provides firewood</span>'.'<span class="answers">'. $provides_firewood .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($provides_charcoal == ''){echo '<span class="pictureTitles">provides charcoal</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">provides charcoal</span>'.'<span class="answers">'. $provides_charcoal .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($provides_food == ''){echo '<span class="pictureTitles">provides food</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">provides food</span>'.'<span class="answers">'. $provides_food .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($provides_mulch == ''){echo '<span class="pictureTitles">provides mulch</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">provides mulch</span>'.'<span class="answers">'. $provides_mulch .'</span>';} ?>
                              </p></br>
                              


                              <p class="details"><?php  if($Construction_provides_poles == ''){echo '<span class="pictureTitles">Construction provides poles</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">Construction provides poles</span>'.'<span class="answers">'. $Construction_provides_poles .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($Construction_provides_beams == ''){echo '<span class="pictureTitles">Construction provides beams</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">Construction provides beams</span>'.'<span class="answers">'. $Construction_provides_beams .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($Construction_timber_quality == ''){echo '<span class="pictureTitles">Construction timber quality</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">Construction timber quality</span>'.'<span class="answers">'. $Construction_timber_quality .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($Construction_type == ''){echo '<span class="pictureTitles">Construction type</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">Construction type</span>'.'<span class="answers">'. $Construction_type .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($Construction_durable_outdoors == ''){echo '<span class="pictureTitles">Construction durable outdoors</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">Construction durable outdoors</span>'.'<span class="answers">'. $Construction_durable_outdoors .'</span>';} ?>
                              </p></br>
                              <p class="details"><?php  if($Construction_durable_in_water == ''){echo '<span class="pictureTitles">Construction durable in water</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">Construction durable in water</span>'.'<span class="answers">'. $Construction_durable_in_water .'</span>';} ?>
                              </p></br>
                              <span class="TreeSubHeading">Other</span>
                              <p class="details"><?php  if($Remarks == ''){echo '<span class="pictureTitles">Remarks</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">Remarks</span>'.'<span class="answers">'. $Remarks .'</span>';} ?>
                              </p></br>
                              <p class="details" style="display:none"><?php  if($User_comments == ''){echo '<span class="pictureTitles">User comments</span>'.'<font color="#fff">.</font>';}
                                                        else{echo '<span class="pictureTitles">User comments</span>'.'<span class="answers">'. $User_comments .'</span>';} ?>
                              </p></br>


                             



                                                                     
                            </div>
                          </div>
                </div>
              </div>
            </div>
            </div>
            
          </td> 
           
           
      </tr></tbody> <?php } ?>
      
            <tfoot><tr id="nav"><td colspan="7"><div><?php echo $obj->anchors; ?></div></td>
      </tr>
      <tr id="total"><td colspan="7"><?php echo $obj->total; ?></td>
      </tr>
        <?php } else{ ?>
      <tr><td align="center" colspan="7">No Data Found</td>
      </tr></tfoot>
        <?php } ?>
        
    </table>
    </div>    
  </div>
  
