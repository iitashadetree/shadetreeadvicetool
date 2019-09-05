<form method="post" action="result.php">
<!--
<div id="attributeLabels">
    <span id="atrributeLabel" title="Choose up to 10 attributes that shade trees can provide that are in your interest. Duplicates are not allowed!">attributes</span>
    <span id="weightLabel" title="Please weigh each attribute: ‘1’ corresponds to low priority, ‘5’ corresponds to high priority">weight</span>
	</div> -->
<div class="input_fields_wrap2" style=" padding:px">
    
    <div> 
        
        
    <input type="hidden" name="country" value="<?php echo $country; ?>">
    <input type="hidden" name="region" value="<?php echo $region; ?>">
    <input type="hidden" name="crop" value="<?php echo $crop; ?>">
    <input type="hidden" name="subgroup" value="<?php echo $subgroup; ?>">
            <div style="margin-left: 83px;bckground:pink;width: 100%;margin-left: -40px; margin-bottom: -20px; padding:20px"> 

                <select name="attribute">  
                   <?php include "attribute.php"; ?>
                </select>

                <select  class= "attribute" name="weight" style="background:#EBECED;width:9.5%;margin-left:10%;">
                <option>1</option><option>2</option><option>3</option>
                <option>4</option><option>5</option>
                </select>
            </div>
    </div>

</div>

<style>
.input_fields_wrap2 select {
    width: auto;
    height: 28px;
    background-color: #DDDDDD;
    border-radius: 5px;
    padding: 0px;
    font-size: 20px;
    margin-bottom: 3px;
    text-align: left;
}

.input_fields_wrap2 option {
    padding: 2px;

}

    #attributeLabels{float:left;bckground: orange;width:100%;margin-left: -40px;margin-top:-60px;font-size: 24px}
    #atrributeLabel{float:left;bckground: pink;wdth: 57%;margin-left: 7px;}
    #weightLabel{float:left;bckground: aqua;margin-left: 47%;}
	
    .add_field_button  { 
	  border: white;
	  color: white;
	  background-color:blue;
	  padding: 5px 30px;
	  text-align: center;
	  display: inline-block;
	  font-size: 16px;
	  cursor: wait;
	  
      	

        /*give the corners a small curve*/
    -webkit-border-radius: 10px 15px 15px 10px;
    -moz-border-radius: 10px  15px 15px 10px;
    /*add a drop shadow to the button*/
    -webkit-box-shadow: rgba(3, 3, 3, .75) 0 2px 6px;
    -moz-box-shadow: rgba(3, 3, 3, .75) 0 2px 6px;
    box-shadow: rgba(3, 3, 3, .75) 0 2px 6px;
  text-decoration: none;
  wdth:auto;      
       cursor: pointer;
       margin-bottom: 3px;  
    }
    .remove_field{
     font-size: 25px;
	 padding-left:.2%;
	 color:red;
    }
	        
</style>
 
<button class="add_field_button"> Add Attribute </button>
<script>

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap2"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
         x++; //text box increment
            $(wrapper).append('<div style="padding-right:3%;"><select name="attribute_'+x+'"><?php include "attribute.php"; ?></select><select class="me" name="weight_'+x+'" style="background:#EBECED;width:9.5%;margin-left: 10%; "><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select><a href="#" class="remove_field">x</a></div>'); //add input box
       
        //alert ("attribute_"+x);
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
</fieldset>

<div id="alright2"><input type="submit" style="border-radius:10px; border: white;
	  color: white;
	  background-color:green;
	  padding: 5px 10px;
	  text-align: center;
	  font-weight: bold;
	  display: inline-block;
	  font-size: 16px;
	  margin-top: 30px;
	  
	  cursor: pointer;" 
	  name="view" value="View Advice"></div>


</form>