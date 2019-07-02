
<div id="attributeLabels">
    <span id="atrributeLabel" title="Choose up to 10 attributes that shade trees can provide that are in your interest. Duplicates are not allowed!">attributes</span>
    <span id="weightLabel" title="Please weigh each attribute: ‘1’ corresponds to low priority, ‘5’ corresponds to high priority">weight</span></div>
<div class="input_fields_wrap2">
    
    <div> 
        
        
    <input type="hidden" name="country" value="<?php echo $country; ?>">
    <input type="hidden" name="region" value="<?php echo $region; ?>">
    <input type="hidden" name="crop" value="<?php echo $crop; ?>">
    <input type="hidden" name="subgroup" value="<?php echo $subgroup; ?>">
            <div style="margin-left: 83px;bckground:pink;width: 100%;margin-left: -40px;margin-top: -28px;"> 

                <select name="attribute">  
                   <?php include "attribute.php"; ?>
                </select>

                <select  class= "attribute" name="weight" style="background:#EBECED;width:115px;margin-left: 12px;">
                <option>1</option><option>2</option><option>3</option>
                <option>4</option><option>5</option>
                </select>
            </div>
    </div>

</div>

<style>
.input_fields_wrap2 select {
    width: 280px;
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
    font-family: Trebuchet MS,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Tahoma,sans-serif;
    float: left;
    margin-left:-34px;
    background: -webkit-gradient(linear, left top, left bottom, from(#4C9ED9), to(#025DAE));
    background: -webkit-linear-gradient(top, #4C9ED9, #025DAE);
    background: -moz-linear-gradient(top, #4C9ED9, #025DAE);
    background: -o-linear-gradient(top, #4C9ED9, #025DAE);
    color: #fff;
    font-size: 20px;
    text-align: center;
    padding: 1px;
    brder-radius: 5px;
    border: 0px solid #fff;
    bx-shadow: 0px 2px 6px rgba(3, 3, 3, 0.75);
    text-decoration: none;
    width: 34%;
      

        /*give the corners a small curve*/
    -webkit-border-radius: 10px 15px 15px 10px;
    -moz-border-radius: 10px  15px 15px 10px;
    /*add a drop shadow to the button*/
    -webkit-box-shadow: rgba(3, 3, 3, .75) 0 2px 6px;
    -moz-box-shadow: rgba(3, 3, 3, .75) 0 2px 6px;
    box-shadow: rgba(3, 3, 3, .75) 0 2px 6px;
  text-decoration: none;
  wdth:120px;      
       cursor: pointer;
       margin-bottom: 3px;  
    }
    .add_field_button:hover {
      color:#fff;
      background:#2268B6;
      text-decoration: none;
    }
    .remove_field{
     font-size: 22px; 
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
            $(wrapper).append('<div style="margin-left: 83px;bckground:pink;width: 530px;margin-left: -40px;"><select name="attribute_'+x+'"><?php include "attribute.php"; ?></select><select class="me" name="weight_'+x+'" style="background:#EBECED;width:115px;margin-left: 17px;"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select><a href="#" class="remove_field">x</a></div>'); //add input box
       
        //alert ("attribute_"+x);
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
</fieldset>

<div class="alright2"><input type="submit" name="view" value="View Advice"></div>


</form>