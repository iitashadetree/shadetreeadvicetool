<?Php
include ("../config/connection.php");

///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT DISTINCT country FROM estimate_stderror order by country asc"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
@$country=$_GET['country']; // This line is added to take care if your global variable is off
if(isset($country)){
$quer="SELECT DISTINCT region FROM estimate_stderror where country='$country' order by region asc"; 
}else{$quer="SELECT DISTINCT region FROM estimate_stderror order by region asc"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////


/////// for Third drop down list we will check if sub category is selected else we will display all the subcategory3///// 
@$region=$_GET['region']; // This line is added to take care if your global variable is off
if(isset($region)){
$quer3="SELECT DISTINCT crop FROM estimate_stderror  where region='$region' order by crop asc"; 
}else{$quer3="SELECT DISTINCT crop FROM estimate_stderror order by crop asc";} 
////////// end of query for third subcategory drop down list box /////////////////////////// To Do !!!!

//Deletes all the blank forms in all Tablets and Smart Phones
//Gets new blank forms for the respective Stations 
//Remove buttons, leave only 3.
//set Admin settings and password
//
@$crop=$_GET['crop']; // This line is added to take care if your global variable is off
if(isset($crop)){
$quer4="SELECT DISTINCT subgroup FROM estimate_stderror  where  country='$country' and region='$region' and crop='$crop' and subgroup != 'Subgroup' order by subgroup asc "; 
}else{$quer4="SELECT DISTINCT subgroup FROM estimate_stderror where subgroup != 'Subgroup' order by subgroup asc";} 
////////// end of query for third subcategory drop down list box ///////////////////////////

//Deletes all the blank forms in all Tablets and Smart Phones
//Gets new blank forms for the respective Stations 
//Remove buttons, leave only 3.
//set Admin settings and password
//

echo "<form method=post name=f1 style ='width:auto; height:auto' action='dd-check.php'>";
//echo $error;
echo "<fieldset'>";

//echo "<legend>Country > Region > Crop > Subgroup</legend>";
echo '<h6 style="padding-bottom:10px">* Please select All the fields</h6>';
echo "<div>
<select style='font-family: Arial;
 font-size:15px; width:200px; padding: 5px 10px; background-color: #A9A9A9;' name='country'><option>1. Select Country</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['country']==@$country){echo "<option selected value='$noticia2[country]'>$noticia2[country]</option>"."<BR>";}
else{echo  "<option value='$noticia2[country]'>$noticia2[country]</option>";}
}
echo "</select>"."</div>";
echo "</br>";
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////

echo "<div>
<select style='font-family: Arial; font-size:15px; width:200px; padding: 5px 10px; background-color: #A9A9A9;' name='region'><option>2. Select Region</option></div>";
foreach ($dbo->query($quer) as $noticia) {
if($noticia['region']==@$region){echo "<option selected value='$noticia[region]'>$noticia[region]</option>"."<BR>";}
else{echo  "<option value='$noticia[region]'>$noticia[region]</option>";}
}
echo "</select>"."</div>";

echo "</br>";

echo "<div>
<select style='font-family: Arial; font-size:15px; width:200px; padding: 5px 10px; background-color: #A9A9A9;' name='crop'>
<option>3. Select Crop</option></div>";
foreach ($dbo->query($quer3) as $noticia) {
if($noticia['crop']==@$crop){echo "<option selected value='$noticia[crop]'>$noticia[crop]</option>"."<BR>";}
else{echo  "<option value='$noticia[crop]'>$noticia[crop]</option>";}
}
echo "</select>"."</div>";
echo "</br>";

echo "<div>
<select style='font-family: Arial; font-size:15px; width:200px; padding: 5px 10px; background-color: #A9A9A9;' name='subgroup' style='font-size:15px; ' 'required'>
<option>4. Select Subzone</option></div>";
foreach ($dbo->query($quer4) as $noticia) {
echo  "<option value='$noticia[subgroup]'>$noticia[subgroup]</option>";
}
echo "</select>"."</div>";



echo "</select>";
echo "</fieldset>";

//////////////////  This will end the second drop down list ///////////
//// Add your other form fields as needed here/////

echo "<div class='alright'>";

echo "<input type='submit' style='
  border: white;
  color: white;
  background-color:green;
  padding: 5px 40px;
  border-radius:10px;
  text-align: center;
  font-weight: bold;
  display: inline-block;
  font-size: 16px;
  margin-top: 35px;
  margin-bottom: 10px;
  cursor: pointer' name='form1' value='Submit' id='form1'>";
echo "</div>";
echo "</form>";
?>