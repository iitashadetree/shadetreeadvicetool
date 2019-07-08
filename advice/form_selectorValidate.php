<?Php
// include ("config/config.php");

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
////////// end of query for third subcategory drop down list box ///////////////////////////

//Deletes all the blank forms in all Tablets and Smart Phones
//Gets new blank forms for the respective Stations 
//Remove buttons, leave only 3.
//set Admin settings and password
//
@$crop=$_GET['crop']; // This line is added to take care if your global variable is off
if(isset($crop)){
$quer4="SELECT DISTINCT subgroup FROM estimate_stderror  where crop='$crop' order by subgroup asc"; 
}else{$quer4="SELECT DISTINCT subgroup FROM estimate_stderror order by subgroup asc";} 
////////// end of query for third subcategory drop down list box ///////////////////////////

//Deletes all the blank forms in all Tablets and Smart Phones
//Gets new blank forms for the respective Stations 
//Remove buttons, leave only 3.
//set Admin settings and password
//

echo "<form method=post name=f1 action='dd-check.php'>";
//echo $error;
echo "<fieldset>";
//echo "<legend>Country > Region > Crop > Subgroup</legend>";
echo '<span style="color: red;margin-top: -39px;float: left;margin-left: 70px;">* Please select All the fields</span></br>';
echo "<div style='width: 820px'><img src='images/icon_countries_full.png' height='52' width='52' style='margin-right: 20px;margin-top:-6px;' />

<select name='country' onchange=\"reload(this.form)\"><option>--Country--</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['country']==@$country){echo "<option selected value='$noticia2[country]'>$noticia2[country]</option>"."<BR>";}
else{echo  "<option value='$noticia2[country]'>$noticia2[country]</option>";}
}
echo "</select>"."<label>1. Select a Country of Interest</label></div>";
echo "</br>";
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////

echo "<div style='width: 820px'><img src='images/icon_regions.png' height='52' width='52' style='margin-right: 20px;margin-top:-6px;' /><select name='region' onchange=\"reload3(this.form)\"><option>--Region--</option></div>";
foreach ($dbo->query($quer) as $noticia) {
if($noticia['region']==@$region){echo "<option selected value='$noticia[region]'>$noticia[region]</option>"."<BR>";}
else{echo  "<option value='$noticia[region]'>$noticia[region]</option>";}
}
echo "</select>"."<label>2. Select a region </label></div>";

echo "</br>";

echo "<div style='width: 820px'><img src='images/icon_crops_full.png' height='52' width='52' style='margin-right: 20px;margin-top:-6px;' /><select name='crop' onchange=\"reload4(this.form)\"><option>--Crop--</option></div>";
foreach ($dbo->query($quer3) as $noticia) {
if($noticia['crop']==@$crop){echo "<option selected value='$noticia[crop]'>$noticia[crop]</option>"."<BR>";}
else{echo  "<option value='$noticia[crop]'>$noticia[crop]</option>";}
}
echo "</select>"."<label>3. Select a Crop </label></div>";
echo "</br>";

echo "<div style='width: 820px'><img src='images/icon_subzones_full.png' height='52' width='52' style='margin-right: 20px;margin-top:-6px;' /><select name='subgroup' ><option>--Subgroup--</option></div>";
foreach ($dbo->query($quer4) as $noticia) {
echo  "<option value='$noticia[subgroup]'>$noticia[subgroup]</option>";
}
echo "</select>"."<label>4. Select a Subgroup</label></div>";



echo "</select>";
echo "</fieldset>";

//////////////////  This will end the second drop down list ///////////
//// Add your other form fields as needed here/////

echo "<div class='alright' style='position:absolute;bottom:3%'>";

echo "<input type='submit' name='form1' value='Submit' id='form1'>";
echo "</div>";
echo "</form>";
?>