<!DOCTYPE HTML>
<html>
<head>
<style>
body { height:100%;}
.item1 { grid-area: header; height:auto;}
.item2 { grid-area: main; width:100%; height:auto; }
.item3 { grid-area: footer; height:30px;}

.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header header'
    'main main main main main main'
    'footer footer footer footer footer footer';
  grid-gap: 10px; 
  background-image: url('advice/images/Tree_background.jpg');
  padding: 5px;
  text-align: center;
  
 
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  padding: 20px 0;
  font-size: 30px;
}

</style>
</head>
<body>
	
	<div class="item3" style="color:white; background-color:#FF8C00; margin-top:50px">
	<a href="http://www.ccafs.in/"><img src="advice/images/CCAFS.png" alt="CCAFS Logo" height="30" /></a>
	<a href="http://iita.org/"><img src="images/IITA_logo.png" alt="IITA Logo" height="30" /></a>
	<a href="http://wwww.mymetajua.com/"><img src="images/Metajua.png" alt="Metajua Logo" height="30"/></a>
	<a href="http://www.worldagroforestry.org/"><img src="images/ICRAF.png" alt="ICRAF Logo" height="30" /></a>
	<a href="http://foreststreesagroforestry.org/ "><img src="images/FTA.png" alt="FTA Logo" height="30"/></a>
	<a href="admin/login.php"><img src="images/icon_admin.png" alt="IITA admin Logo" height="30" /></a>
	</div>
  </div>  

</body>
</html>	