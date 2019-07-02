<?php
require "../config/connection.php"; // Your Database details 
// First field set
$country=$_POST['country'];
$region=$_POST['region'];
$crop=$_POST['crop'];
$subgroup=$_POST['subgroup'];
// second field set
include ("attribute_functions.php");
    if(isset($_POST['view'])) { 

                    if(
                        (($attrib != $attrib2)  && ($attrib != $attrib3)  && ($attrib != $attrib4)  && ($attrib != $attrib5)  && ($attrib != $attrib6)  && ($attrib != $attrib7)  && ($attrib != $attrib8)  && ($attrib != $attrib9) && ($attrib != $attrib10))&&
                        (($attrib2 != $attrib3) && ($attrib2 != $attrib4) && ($attrib2 != $attrib5) && ($attrib2 != $attrib6) && ($attrib2 != $attrib7) && ($attrib2 != $attrib8) && ($attrib2 != $attrib9) && ($attrib2 != $attrib10)) &&
                        (($attrib3 != $attrib4) && ($attrib3 != $attrib5) && ($attrib3 != $attrib6) && ($attrib3 != $attrib7) && ($attrib3 != $attrib8) && ($attrib3 != $attrib9) && ($attrib3 != $attrib10)) &&
                        (($attrib4 != $attrib5) && ($attrib4 != $attrib6) && ($attrib4 != $attrib7) && ($attrib4 != $attrib8) && ($attrib4 != $attrib9) && ($attrib4 != $attrib10)) &&
                        (($attrib5 != $attrib6) && ($attrib5 != $attrib7) && ($attrib5 != $attrib8) && ($attrib5 != $attrib9) && ($attrib5 != $attrib10)) &&
                        (($attrib6 != $attrib7) && ($attrib6 != $attrib8) && ($attrib6 != $attrib9) && ($attrib6 != $attrib10)) &&
                        (($attrib7 != $attrib8) && ($attrib7 != $attrib9) && ($attrib7 != $attrib10)) &&
                        (($attrib8 != $attrib9) && ($attrib8 != $attrib10)) &&
                        (($attrib9 != $attrib10))
                        ) {


                    $query1 = mysqli_query( $con, "
                                        select *,(stdError*2) hStderror,(total-stdError)  sub
                                        from (
                                        select distinct *,(ws1+ws2+ws3+ws4+ws5+ws6+ws7+ws8+ws9+ws10) total,round(sqrt((ews1*ews1)+(ews2*ews2)+(ews3*ews3)+(ews4*ews4)+(ews5*ews5)+(ews6*ews6)+(ews7*ews7)+(ews8*ews8)+(ews9*ews9)+(ews10*ews10)),2) stdError 
                                         from(
                                         select a.country,a.region,a.crop,a.subgroup,a.tree,
                                         attribute,ws1,
                                         attribute2,(case when ws2 !='' then ws2 else 0 end) ws2,
                                         attribute3,(case when ws3 !='' then ws3 else 0 end) ws3,
                                         attribute4,(case when ws4 !='' then ws4 else 0 end) ws4,
                                         attribute5,(case when ws5 !='' then ws5 else 0 end) ws5,
                                         attribute6,(case when ws6 !='' then ws6 else 0 end) ws6,
                                         attribute7,(case when ws7 !='' then ws7 else 0 end) ws7,
                                         attribute8,(case when ws8 !='' then ws8 else 0 end) ws8,
                                         attribute9,(case when ws9 !='' then ws9 else 0 end) ws9,
                                         attribute10,(case when ws10 !='' then ws10 else 0 end) ws10,
                                         ews1,
                                         (case when ews2 !='' then ews2 else 0 end) ews2,
                                         (case when ews3 !='' then ews3 else 0 end) ews3,
                                         (case when ews4 !='' then ews4 else 0 end) ews4,
                                         (case when ews5 !='' then ews5 else 0 end) ews5,
                                         (case when ews6 !='' then ews6 else 0 end) ews6,
                                         (case when ews7 !='' then ews7 else 0 end) ews7,
                                         (case when ews8 !='' then ews8 else 0 end) ews8,
                                         (case when ews9 !='' then ews9 else 0 end) ews9,
                                         (case when ews10 !='' then ews10 else 0 end) ews10
                                         
                                         from(
                                         select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute,
                                         round(((estimate*$weight)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws1,
                                         round(((qStdError*$weight)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews1
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute = '$attrib'
                                         ) a
                                         left join
                                         (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute2,
                                         round(((estimate*$weight2)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws2,
                                         round(((qStdError*$weight2)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews2
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute2 = '$attrib2'
                                         ) b
                                         on a.country=b.country and a.region=b.region and a.crop=b.crop and a.subgroup=b.subgroup and a.tree=b.tree
                                         left join
                                         (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute3,
                                         round(((estimate*$weight3)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws3,
                                         round(((qStdError*$weight3)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews3
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute3 = '$attrib3'
                                         ) c
                                         on a.country=c.country and a.region=c.region and a.crop=c.crop and a.subgroup=c.subgroup and a.tree=c.tree
                                        
                                        left join
                                        (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute4,
                                         round(((estimate*$weight4)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws4,
                                         round(((qStdError*$weight4)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews4
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute4 = '$attrib4'
                                         ) d
                                         on a.country=d.country and a.region=d.region and a.crop=d.crop and a.subgroup=d.subgroup and a.tree=d.tree
                                          left join
                                        (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute5,
                                         round(((estimate*$weight5)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws5,
                                         round(((qStdError*$weight5)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews5
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute5 = '$attrib5'
                                         ) e
                                         on a.country=e.country and a.region=e.region and a.crop=e.crop and a.subgroup=e.subgroup and a.tree=e.tree
                                          left join
                                        (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute6,
                                         round(((estimate*$weight6)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws6,
                                         round(((qStdError*$weight6)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews6
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute6 = '$attrib6'
                                         ) f
                                         on a.country=f.country and a.region=f.region and a.crop=f.crop and a.subgroup=f.subgroup and a.tree=f.tree
                                         left join
                                        (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute7,
                                         round(((estimate*$weight7)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws7,
                                         round(((qStdError*$weight7)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews7
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute7 = '$attrib7'
                                         ) g
                                         on a.country=g.country and a.region=g.region and a.crop=g.crop and a.subgroup=g.subgroup and a.tree=g.tree
                                         left join
                                         (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute8,
                                         round(((estimate*$weight8)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws8,
                                         round(((qStdError*$weight8)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews8
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute8 = '$attrib8'
                                         ) h
                                         on a.country=h.country and a.region=h.region and a.crop=h.crop and a.subgroup=h.subgroup and a.tree=h.tree
                                         left join
                                         (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute9,
                                         round(((estimate*$weight9)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws9,
                                         round(((qStdError*$weight9)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews9
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute9 = '$attrib9'
                                         ) i
                                         on a.country=i.country and a.region=i.region and a.crop=i.crop and a.subgroup=i.subgroup and a.tree=i.tree
                                         left join
                                         (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute10,
                                         round(((estimate*$weight10)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws10,
                                         round(((qStdError*$weight10)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews10
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute10 = '$attrib10'
                                         ) j
                                         on a.country=j.country and a.region=j.region and a.crop=j.crop and a.subgroup=j.subgroup and a.tree=j.tree
                                         ) p
                                         ) q
                                         order by sub desc
                                         
                                        ");

                    ?>
                    <!DOCTYPE html>
                    <html lang="en">
                      <head>
                        <meta charset="utf-8">
                        <title>Shade tree advice</title>

                        <SCRIPT language=JavaScript>
                        function reload(form)
                        {
                        var val=form.cat.options[form.cat.options.selectedIndex].value;

                        self.location='dd-check.php?cat=' + val ;
                        }

                        </script>
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <link rel="icon" type="image/png" href="../image/favicon2.ico">
                            <script type="applijegleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
                            
                            <!-- Custom Theme files -->
                            <link href="css/style.css" rel='stylesheet' type='text/css' />                   
                            <!--webfonts-->
                            <link rel="stylesheet" href="css/font-awesome.min.css">
                     
                     
                            <link rel="stylesheet" href="stdError/style.css" type="text/css">
                            <script src="stderror/amcharts.js" type="text/javascript"></script>
                            <script src="stderror/serial.js" type="text/javascript"></script>
                            <script>

                            
                                var chart;

                                     var chartData = [
                                
                                      <?php
                                       while ($row = mysqli_fetch_array($query1)){
                        $country = $row['country'];
                        $region = $row['region'];
                        $crop = $row['crop'];
                        $subgroup = $row['subgroup'];
                        $tree = $row['tree'];
                        $attribute = $row['subgroup'];
                        $ws1 = $row['ws1'];
                        $ws2 = $row['ws2'];
                        $ws3 = $row['ws3'];
                        $ws4 = $row['ws4'];
                        $ws5 = $row['ws5'];
                        $ws6 = $row['ws6'];
                        $ws7 = $row['ws7'];
                        $ws8 = $row['ws8'];
                        $ws9 = $row['ws9'];
                        $ws10 = $row['ws10']; 
                        $stdError = $row['hStderror'];
                        //$hStderror = $row['hStderror'];
                         echo '{';

                         
                           echo '"year":' ."'".$tree."'".',' ;


                           
                             
                            
                                                 
                              
                              echo '"'.$attrib.'":' .$ws1 .',' ;
                              echo '"'.$attrib2.'":' .$ws2 .',' ;
                              echo '"'.$attrib3.'":' .$ws3 .',' ;
                              echo '"'.$attrib4.'":' .$ws4 .',' ;
                              echo '"'.$attrib5.'":' .$ws5 .',' ;
                              echo '"'.$attrib6.'":' .$ws6 .',' ;
                              echo '"'.$attrib7.'":' .$ws7 .',' ;
                              echo '"'.$attrib8.'":' .$ws8 .',' ;
                              echo '"'.$attrib9.'":' .$ws9 .',' ;
                              echo '"'.$attrib10.'":' .$ws10 .',' ;
                              echo '"ci": 0,';
                              //echo '"error":'.$stdError;
                               echo '"error":'.(2*$stdError);
                             //echo '"herror":'.$hStderror;
                         
                          echo '},';

                         
                    }   
                                          
                                      ?>
                                
                                        ];
                                        
                                   
                           

                                AmCharts.ready(function () {
                                    // SERIALL CHART
                                    chart = new AmCharts.AmSerialChart();
                                    chart.dataProvider = chartData;
                                    chart.categoryField = "year";
                                    chart.plotAreaBorderAlpha = 0.1;
                                    chart.rotate = true;

                                    // AXES
                                    // Category
                                    var categoryAxis = chart.categoryAxis;
                                    categoryAxis.gridAlpha = 0.1;
                                    categoryAxis.axisAlpha = 0;
                                    categoryAxis.gridPosition = "start";


                                    // value
                                    var valueAxis = new AmCharts.ValueAxis();
                                    valueAxis.stackType = "regular";
                                    valueAxis.gridAlpha = 0.1;
                                    valueAxis.axisAlpha = 0;
                                    <?php 
                                        if(!isset($_POST['attrib']) ){
                                            ?>
                                            valueAxis.maximum = 12;
                                            <?php }
                                        if(isset($_POST['attribute_2']) ){
                                            ?>
                                            valueAxis.maximum = 9;
                                            <?php }
                                        if(isset($_POST['attribute_3']) ){
                                        ?>
                                        valueAxis.maximum = 9;
                                        <?php }
                                        if(isset($_POST['attribute_4']) ){
                                        ?>
                                        valueAxis.maximum = 8;
                                        <?php }
                                        if(isset($_POST['attribute_5']) ){
                                        ?>
                                        valueAxis.maximum = 8;
                                        <?php }
                                        if(isset($_POST['attribute_6']) ){
                                        ?>
                                        valueAxis.maximum = 8;
                                        <?php }
                                        if(isset($_POST['attribute_7']) ){
                                        ?>
                                        valueAxis.maximum = 8;
                                        <?php }
                                        if(isset($_POST['attribute_8']) ){
                                        ?>
                                        valueAxis.maximum = 8;
                                        <?php }
                                        if(isset($_POST['attribute_9']) ){
                                        ?>
                                        valueAxis.maximum = 8;
                                        <?php }
                                        if(isset($_POST['attribute_10']) ){
                                        ?>
                                        valueAxis.maximum = 8;
                                        <?php }
                                    ?>
                                    
                                    chart.addValueAxis(valueAxis);
                                    

                                    // firstgraph
                                    graph = new AmCharts.AmGraph();
                                    graph.title = "<?php echo $attrib.' '.$weight; ?>";
                                    graph.labelText = "[[value--]]";
                                    graph.valueField = "<?php echo $attrib; ?>";
                                    graph.type = "column";
                                    graph.lineAlpha = 0;
                                    graph.fillAlphas = 1;
                                    graph.lineColor = "#B5E61D";
                                    graph.balloonText = "<b><span style='color:#FE0168'>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                                    graph.labelPosition = "middle";
                                    graph.fixedColumnWidth =20;
                                    chart.addGraph(graph);

                                    <?php 

                                    if(isset($_POST['attribute_2']) ){
                                    ?>

                                    // Second graph
                                    graph = new AmCharts.AmGraph();
                                    graph.title = "<?php if(isset($_POST['attribute_2']) ){
                                                            $attrib2=$_POST['attribute_2'];
                                                            $weight2=$_POST['weight_2'];
                                                            echo $attrib2.' '.$weight2;
                                                            } 
                                                    ?>";
                                    graph.labelText = "[[value--]]";
                                    graph.valueField = "<?php echo $attrib2; ?>";
                                    graph.type = "column";
                                    graph.lineAlpha = 0;
                                    graph.fillAlphas = 1;
                                    graph.lineColor = "#B97A57";
                                    graph.balloonText = "<b><span style='color:#B97A57'>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                                    graph.labelPosition = "middle";
                                    graph.fixedColumnWidth =20;
                                    chart.addGraph(graph);
                                    <?php } ?>

                                     <?php 

                                    if(isset($_POST['attribute_3']) ){
                                    ?>

                                    // third graph
                                    graph = new AmCharts.AmGraph();
                                    graph.title = "<?php if(isset($_POST['attribute_3']) ){
                                                            $attrib3=$_POST['attribute_3'];
                                                            $weight3=$_POST['weight_3'];
                                                            echo $attrib3.' '.$weight3;
                                                            } 
                                                    ?>";
                                    graph.labelText = "[[value--]]";
                                    graph.valueField = "<?php echo $attrib3; ?>";
                                    graph.type = "column";
                                    graph.lineAlpha = 0;
                                    graph.fillAlphas = 1;
                                    graph.lineColor = "#ED1C24";
                                    graph.balloonText = "<b><span style='color:#ED1C24'>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                                    graph.labelPosition = "middle";
                                    graph.fixedColumnWidth =20;
                                    chart.addGraph(graph);
                                    <?php } 

                                    if(isset($_POST['attribute_4']) ){
                                    ?>

                                    // fourth graph
                                    graph = new AmCharts.AmGraph();
                                    graph.title = "<?php if(isset($_POST['attribute_4']) ){
                                                            $attrib4=$_POST['attribute_4'];
                                                            $weight4=$_POST['weight_4'];
                                                            echo $attrib4.' '.$weight4;
                                                            } 
                                                    ?>";
                                    graph.labelText = "[[value--]]";
                                    graph.valueField = "<?php echo $attrib4; ?>";
                                    graph.type = "column";
                                    graph.lineAlpha = 0;
                                    graph.fillAlphas = 1;
                                    graph.lineColor = "#99D9EA";
                                    graph.balloonText = "<b><span style='color:#99D9EA'>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                                    graph.labelPosition = "middle";
                                    graph.fixedColumnWidth =20;
                                    chart.addGraph(graph);

                                    <?php } 

                                    if(isset($_POST['attribute_5']) ){
                                    ?>

                                    // fifth graph
                                    graph = new AmCharts.AmGraph();
                                    graph.title = "<?php if(isset($_POST['attribute_5']) ){
                                                            $attrib5=$_POST['attribute_5'];
                                                            $weight5=$_POST['weight_5'];
                                                            echo $attrib5.' '.$weight5;
                                                            } 
                                                    ?>";
                                    graph.labelText = "[[value--]]";
                                    graph.valueField = "<?php echo $attrib5; ?>";
                                    graph.type = "column";
                                    graph.lineAlpha = 0;
                                    graph.fillAlphas = 1;
                                    graph.lineColor = "#FF7F27";
                                    graph.balloonText = "<b><span style='color:#FF7F27'>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                                    graph.labelPosition = "middle";
                                    graph.fixedColumnWidth =20;
                                    chart.addGraph(graph);

                                    <?php } 

                                    if(isset($_POST['attribute_6']) ){
                                    ?>

                                    // sixth graph
                                    graph = new AmCharts.AmGraph();
                                    graph.title = "<?php if(isset($_POST['attribute_6']) ){
                                                            $attrib6=$_POST['attribute_6'];
                                                            $weight6=$_POST['weight_6'];
                                                            echo $attrib6.' '.$weight6;
                                                            } 
                                                    ?>";
                                    graph.labelText = "[[value--]]";
                                    graph.valueField = "<?php echo $attrib6; ?>";
                                    graph.type = "column";
                                    graph.lineAlpha = 0;
                                    graph.fillAlphas = 1;
                                    graph.lineColor = "#FFF200";
                                    graph.balloonText = "<b><span style='color:#FFF200'>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                                    graph.labelPosition = "middle";
                                    graph.fixedColumnWidth =20;
                                    chart.addGraph(graph);

                                    <?php } 

                                    if(isset($_POST['attribute_7']) ){
                                    ?>


                                    // seventh graph
                                    graph = new AmCharts.AmGraph();
                                    graph.title = "<?php if(isset($_POST['attribute_7']) ){
                                                            $attrib7=$_POST['attribute_7'];
                                                            $weight7=$_POST['weight_7'];
                                                            echo $attrib7.' '.$weight7;
                                                            } 
                                                    ?>";
                                    graph.labelText = "[[value--]]";
                                    graph.valueField = "<?php echo $attrib7; ?>";
                                    graph.type = "column";
                                    graph.lineAlpha = 0;
                                    graph.fillAlphas = 1;
                                    graph.lineColor = "#22B14C";
                                    graph.balloonText = "<b><span style='color:#22B14C'>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                                    graph.labelPosition = "middle";
                                    graph.fixedColumnWidth =20;
                                    chart.addGraph(graph);

                                    <?php } 

                                    if(isset($_POST['attribute_8']) ){
                                    ?>

                                    // Eight graph
                                    graph = new AmCharts.AmGraph();
                                    graph.title = "<?php if(isset($_POST['attribute_8']) ){
                                                            $attrib8=$_POST['attribute_8'];
                                                            $weight8=$_POST['weight_8'];
                                                            echo $attrib8.' '.$weight8;
                                                            } 
                                                    ?>";
                                    graph.labelText = "[[value--]]";
                                    graph.valueField = "<?php echo $attrib8; ?>";
                                    graph.type = "column";
                                    graph.lineAlpha = 0;
                                    graph.fillAlphas = 1;
                                    graph.lineColor = "#00A2E8";
                                    graph.balloonText = "<b><span style='color:#00A2E8'>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                                    graph.labelPosition = "middle";
                                    graph.fixedColumnWidth =20;
                                    chart.addGraph(graph);

                                    <?php } 

                                    if(isset($_POST['attribute_9']) ){
                                    ?>

                                    // nineth graph
                                    graph = new AmCharts.AmGraph();
                                    graph.title = "<?php if(isset($_POST['attribute_9']) ){
                                                            $attrib9=$_POST['attribute_9'];
                                                            $weight9=$_POST['weight_9'];
                                                            echo $attrib9.' '.$weight9;
                                                            } 
                                                    ?>";
                                    graph.labelText = "[[value--]]";
                                    graph.valueField = "<?php echo $attrib9; ?>";
                                    graph.type = "column";
                                    graph.lineAlpha = 0;
                                    graph.fillAlphas = 1;
                                    graph.lineColor = "#3F48CC";
                                    graph.balloonText = "<b><span style='color:#3F48CC'>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                                    graph.labelPosition = "middle";
                                    graph.fixedColumnWidth =20;
                                    chart.addGraph(graph);

                                    <?php } 

                                    if(isset($_POST['attribute_10']) ){
                                    ?>

                                                    // nineth graph
                                    graph = new AmCharts.AmGraph();
                                    graph.title = "<?php if(isset($_POST['attribute_10']) ){
                                                            $attrib10=$_POST['attribute_10'];
                                                            $weight10=$_POST['weight_10'];
                                                            echo $attrib10.' '.$weight10;
                                                            } 
                                                    ?>";
                                    graph.labelText = "[[value--]]";
                                    graph.valueField = "<?php echo $attrib10; ?>";
                                    graph.type = "column";
                                    graph.lineAlpha = 0;
                                    graph.fillAlphas = 1;
                                    graph.lineColor = "#A349A4";
                                    graph.balloonText = "<b><span style='color:#A349A4'>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                                    graph.labelPosition = "middle";
                                    graph.fixedColumnWidth =20;
                                    chart.addGraph(graph);
                                    <?php } 

                                
                                    ?>

                                    // GRAPHS

                                    // GRAPHS
                                    graph = new AmCharts.AmGraph();
                                    graph.title = "Confidence Interval";
                                    graph.labelText = "[[value--]]";
                                    graph.valueField = "ci";
                                    graph.type = "column";

                                    graph.lineColor = "#555";
                                  
                                    graph.bullet = "xError";
                                    graph.errorField = "error";
                                    graph.bulletSize = 3; // when bulletAxis is set, this property affects only width of error bar
                                    graph.bulletAxis = valueAxis;
                                   // graph.balloonText = "<b>[[]]</b><br>Standard Error:<b>[[error]]</b>";
                                    graph.balloonText = "";
                                    graph.fixedColumnWidth =20;
                                    chart.addGraph(graph);

                                    // LEGEND
                                    var legend = new AmCharts.AmLegend();
                                    legend.position = "bottom";
                                    legend.borderAlpha = 0.3;
                                    legend.horizontalGap = 10;
                                    legend.switchType = "v";
                                    legend.switchable =false;
                                    chart.addLegend(legend);

                                    chart.creditsPosition = "top-right";

                                    // WRITE
                                    chart.write("chartdiv");
                                });


                            </script>
                            <?php include '../contact/feedbacklinks2.php'; ?>
                    </head>
                    <body>
<!--start-home-->
  <div class="headerCotent" style="height:60px;padding-top:5px;bckground:red;z-index:99999;position:absolute;top:0px;">
        <div id="headerContainer" style="padding-left:29px;">
                    <a href=../index.php><img src="images/logo_white.png" alt="Shade Tool Logo" height="52" width="64"/>
                    <span class="headerTitle" style="width:100%;min-width:680px;height:auto;">Shade tree advice tool</span></a>
        </div>
</div>
                                  
                                  <div class="leftContent" style="position:fixed;top:97px;left:123px; z-index:9999999999"><a href="javascript:history.go(-1)" 
                                    title="Return to the previous page"><i class="fa fa-angle-left" style="float:left;top: -10px;left: -30px;"></i></a></div>
                    <h3></h3>
                                  <div class="container" style="z-index:999999999;overflow:scroll;height:100px;position:absolute;background:url(images/cont_bg.png);top: 15%;min-height: 485px;
                                  left:15.8%;width:47%;min-width:875px;">  
                                        <h3><span style="margin-top: 5%;margin-left: 94px;float: left;margin-bottom: 12px;"> 
                                            <h2>Advice scores for shade trees</h2>
                                            <?php echo $country.' > '.$region.' > '.$crop.' > '.$subgroup.'<p></p>'; ?></span></h3>
                                              
                                              <style>
                                              
                                              h2{text-align: center;padding-bottom: 10px;}
                                              #chartLegend{float:left;width:100%;background:#999;text-align: center;padding: 3px;font-size: 18px;font-weight: bold;color:#222;}
                                              #advice{display:none;position: absolute;background: #4C9ED9;width: 100%;height: 100px;margin-left: -18px;top: 22%;opacity: 0.3;}
                                              #adviceToolTip{margin-bottom: 16px;border-radius: 5%;top: 15%;float:left;background: none;oacity:0.1;width: 72.1%;margin-left: 24%;min-height:150px;height: 30%;right: 0.5%;mrgin-top: 40px;box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);}
                                              #treeClicks{float:left;bckground: #999999;text-align: left;width: 100%;margin-bottom: 4px;font-size: 15px;}
                                              #treeClicks a{color: #0000CC;padding:2px;lne-height: 2.5em;bckground: aqua;}
                                              #treeClicks a:hover{color: #E87F34;}
                                              #treeLinks{padding: 5px;position:absolute;wdth:20%;bckground: pink;mrgin-top: 27px;hight: 778px;}
                                              .adviceTitle{background: #E87F34;color: #fff;padding:3px;text-align: center;font-size: 20px;}
    }
                                              </style>

                            
                            <div id="advice"></div>

                            <div id="chartdiv" style="width: 88%; margin-left:90px;height: 850px;mrgin-bottom:40px" title="Advice scores for the different trees calculated from the selected and weighted attributes. The higher up the tree, the better it should fit your needs!"></div>
            
                                      
                                  

                                  <div id="adviceToolTip">
                                <h2><p class="adviceTitle">Click to view Advised Top 4 Shade Trees details</p></h2>
                                <div id="treeLinks">
                                 <?php 
                                        $country=$_POST['country'];
$region=$_POST['region'];
$crop=$_POST['crop'];
$subgroup=$_POST['subgroup'];
// second field set
include ("attribute_functions.php");
                                        $query1 = mysqli_query( $con, "
                                        select *,(stdError*2) hStderror,(total-stdError)  sub
                                        from (
                                        select distinct *,(ws1+ws2+ws3+ws4+ws5+ws6+ws7+ws8+ws9+ws10) total,round(sqrt((ews1*ews1)+(ews2*ews2)+(ews3*ews3)+(ews4*ews4)+(ews5*ews5)+(ews6*ews6)+(ews7*ews7)+(ews8*ews8)+(ews9*ews9)+(ews10*ews10)),2) stdError 
                                         from(
                                         select a.country,a.region,a.crop,a.subgroup,a.tree,
                                         attribute,ws1,
                                         attribute2,(case when ws2 !='' then ws2 else 0 end) ws2,
                                         attribute3,(case when ws3 !='' then ws3 else 0 end) ws3,
                                         attribute4,(case when ws4 !='' then ws4 else 0 end) ws4,
                                         attribute5,(case when ws5 !='' then ws5 else 0 end) ws5,
                                         attribute6,(case when ws6 !='' then ws6 else 0 end) ws6,
                                         attribute7,(case when ws7 !='' then ws7 else 0 end) ws7,
                                         attribute8,(case when ws8 !='' then ws8 else 0 end) ws8,
                                         attribute9,(case when ws9 !='' then ws9 else 0 end) ws9,
                                         attribute10,(case when ws10 !='' then ws10 else 0 end) ws10,
                                         ews1,
                                         (case when ews2 !='' then ews2 else 0 end) ews2,
                                         (case when ews3 !='' then ews3 else 0 end) ews3,
                                         (case when ews4 !='' then ews4 else 0 end) ews4,
                                         (case when ews5 !='' then ews5 else 0 end) ews5,
                                         (case when ews6 !='' then ews6 else 0 end) ews6,
                                         (case when ews7 !='' then ews7 else 0 end) ews7,
                                         (case when ews8 !='' then ews8 else 0 end) ews8,
                                         (case when ews9 !='' then ews9 else 0 end) ews9,
                                         (case when ews10 !='' then ews10 else 0 end) ews10
                                         
                                         from(
                                         select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute,
                                         round(((estimate*$weight)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws1,
                                         round(((qStdError*$weight)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews1
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute = '$attrib'
                                         ) a
                                         left join
                                         (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute2,
                                         round(((estimate*$weight2)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws2,
                                         round(((qStdError*$weight2)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews2
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute2 = '$attrib2'
                                         ) b
                                         on a.country=b.country and a.region=b.region and a.crop=b.crop and a.subgroup=b.subgroup and a.tree=b.tree
                                         left join
                                         (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute3,
                                         round(((estimate*$weight3)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws3,
                                         round(((qStdError*$weight3)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews3
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute3 = '$attrib3'
                                         ) c
                                         on a.country=c.country and a.region=c.region and a.crop=c.crop and a.subgroup=c.subgroup and a.tree=c.tree
                                        
                                        left join
                                        (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute4,
                                         round(((estimate*$weight4)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws4,
                                         round(((qStdError*$weight4)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews4
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute4 = '$attrib4'
                                         ) d
                                         on a.country=d.country and a.region=d.region and a.crop=d.crop and a.subgroup=d.subgroup and a.tree=d.tree
                                          left join
                                        (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute5,
                                         round(((estimate*$weight5)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws5,
                                         round(((qStdError*$weight5)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews5
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute5 = '$attrib5'
                                         ) e
                                         on a.country=e.country and a.region=e.region and a.crop=e.crop and a.subgroup=e.subgroup and a.tree=e.tree
                                          left join
                                        (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute6,
                                         round(((estimate*$weight6)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws6,
                                         round(((qStdError*$weight6)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews6
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute6 = '$attrib6'
                                         ) f
                                         on a.country=f.country and a.region=f.region and a.crop=f.crop and a.subgroup=f.subgroup and a.tree=f.tree
                                         left join
                                        (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute7,
                                         round(((estimate*$weight7)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws7,
                                         round(((qStdError*$weight7)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews7
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute7 = '$attrib7'
                                         ) g
                                         on a.country=g.country and a.region=g.region and a.crop=g.crop and a.subgroup=g.subgroup and a.tree=g.tree
                                         left join
                                         (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute8,
                                         round(((estimate*$weight8)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws8,
                                         round(((qStdError*$weight8)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews8
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute8 = '$attrib8'
                                         ) h
                                         on a.country=h.country and a.region=h.region and a.crop=h.crop and a.subgroup=h.subgroup and a.tree=h.tree
                                         left join
                                         (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute9,
                                         round(((estimate*$weight9)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws9,
                                         round(((qStdError*$weight9)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews9
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute9 = '$attrib9'
                                         ) i
                                         on a.country=i.country and a.region=i.region and a.crop=i.crop and a.subgroup=i.subgroup and a.tree=i.tree
                                         left join
                                         (
                                           select * from(
                                         select distinct
                                         country,region,crop,subgroup,
                                         replace((case when tree_system != 'NULL' then tree_system else tree_user end),'_',' ') tree,
                                         replace((case when attribute_system != 'NULL' then attribute_system else attribute_user end),'_',' ') attribute10,
                                         round(((estimate*$weight10)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ws10,
                                         round(((qStdError*$weight10)/($weight+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10)),2) as ews10
                                          from estimate_stderror
                                          ) t
                                         where  country='$country' and region='$region' and crop='$crop' and subgroup='$subgroup' 
                                         and attribute10 = '$attrib10'
                                         ) j
                                         on a.country=j.country and a.region=j.region and a.crop=j.crop and a.subgroup=j.subgroup and a.tree=j.tree
                                         ) p
                                         ) q
                                         order by sub desc
                                         limit 4
                                         
                                        ");

                                         while ($row2 = mysqli_fetch_array($query1)){
                        
                        $tree2 = $row2['tree'];
                        
                       
                              echo '<span id="treeClicks">'.'<a href="#">'.$tree2.'</a>'.'</span>'.'<br>' ;
                         
                    }   
                                        ?>
                            </div>

                            


                            </div><!--end of adviceToolTip-->
                            </div>
                   
                    <?php include '../contact/feedback.php'; ?>
                    
                    <div class="copy" style="margin-top: 40px;width:100%;mn-width:1280px;position:fixed;bottom:0;margin-left:0;height:50px;">
                    <div id="copyCotents">
                        <div class="footerCotenets"><a href="http://www.ccafs.in/"><img src="images/CCAFS.png" alt="CCAFS Logo" height="50" /></a></div>
                        <div class="footerCotenets"><a href="http://iita.org/"><img src="images/IITA_logo.png" alt="IITA Logo" height="50" /></a></div>
                        <div class="footerCotenets">Powered by</br> <a href="http://wwww.mymetajua.com/"><img src="images/Metajua.png" alt="Metajua Logo" height="30" /><span class="aCopy">&copy; 2013 | Bugolobi</span></a></div>   
                        <div class="footerCotenets"><a href="http://www.worldagroforestry.org/"><img src="images/ICRAF.png" alt="ICRAF Logo" height="50" /></a></div>
                        <div class="footerCotenets" style="bckground:orange;margin-top: 10px;"><a href="http://foreststreesagroforestry.org/"><img src="images/FTA.png" alt="FTA Logo" height="30"  /></a></div>
                        <div class="footerCotenets" style="bckground:orange;margin-right:0px;"><a href="../admin/index.php"><img src="images/icon_admin.png" alt="IITA admin Logo" height="50" /></a></div>    
                        </div>
                    </div><!--footer--> 
                
                    </body>
                    </html>
<?php
             }else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Shade tree advice</title>

        <SCRIPT language=JavaScript>
        function reload(form)
        {
        var val=form.cat.options[form.cat.options.selectedIndex].value;

        self.location='dd-check.php?cat=' + val ;
        }

        </script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../image/favicon2.ico">
<script type="applijegleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />  
<link rel="stylesheet" type="text/css" media="all" href="css/style1.css" />
<link rel="stylesheet" href="css/font-awesome.min.css">

<?php include '../contact/feedbacklinks2.php'; ?>
</head>
<body>
<!--start-home-->
  <div class="headerCotent" style="height:62px;bckground:red;z-index:99999;position:absolute;padding:5px;">
        <div id="headerContainer">
                    <a href=../index.php><img src="images/logo_white.png" alt="Shade Tool Logo" height="52" width="64"/>
                    <span class="headerTitle" style="width:100%;min-width:680px;height:auto;">Shade tree advice tool</span></a>
        </div>
</div>

       <div class="container" <div class="container" style="z-index:999999999;background:url(images/cont_bg.png); margin-top: 40px;min-height:460px;width:48%;min-width:875px;margin: auto;  position: absolute;  top: 15%; bottom:15%;left: 0; right: 0;">                               
                            <h3><span style="position: relative;top:7px;left: 95px;" > <?php echo $country.' > '.$region.' > '.$crop.' > '.$subgroup.'<p></p>'; ?></span></h3>                    
                                                    
                        <div class="leftContent"><a href="tool.php" title="Return to the previous page"><i class="fa fa-angle-left" 
                            style="float:left;top: -51px;left: -120px;"></i></a></div>
                        <div class="middleContent" style="margin-top: 78px;width: 52%;"><?php
                         echo '<span style="color:red;top:47px;position:absolute;left:153px;bckground:pink;">';   
                         echo '*Duplicate attributes are not allowed' ;
                         echo '</span>';?>
                        <form method="post" action="result.php" id="attribute" name="attribute">
                        <fieldset style="min-height: 307px;width:100%;">
                        <?php include ("form_selector2.php");  ?></div>
                        <div class="rightContent" style="position: relative;top: -28px;left:172px;"><img src='images/icon_tool.png' height='52' width='52' style='margin-right: 20px;' /></div>
              </div>
 
<?php include '../contact/feedback.php'; ?>

<div class="copy" style="margin-top: 35px;width:100%;mn-width:1280px;position:fixed;bottom:0;margin-left:0;">
<div id="copyCotents">
    <div class="footerCotenets"><a href="http://www.ccafs.in/"><img src="images/CCAFS.png" alt="CCAFS Logo" height="50" /></a></div>
    <div class="footerCotenets"><a href="http://iita.org/"><img src="images/IITA_logo.png" alt="IITA Logo" height="50" /></a></div>
    <div class="footerCotenets">Powered by</br> <a href="http://wwww.mymetajua.com/"><img src="images/Metajua.png" alt="Metajua Logo" height="30" /><span class="aCopy">&copy; 2013 | Bugolobi</span></a></div>   
    <div class="footerCotenets"><a href="http://www.worldagroforestry.org/"><img src="images/ICRAF.png" alt="ICRAF Logo" height="50" /></a></div>
    <div class="footerCotenets" style="bckground:orange;margin-top: 10px;"><a href="http://foreststreesagroforestry.org/"><img src="images/FTA.png" alt="FTA Logo" height="30"  /></a></div>
    <div class="footerCotenets" style="bckground:orange;margin-right:0px;"><a href="../admin/index.php"><img src="images/icon_admin.png" alt="IITA admin Logo" height="50" /></a></div>    
    </div>
</div><!--footer--> 

</body>
</html>

               
<?php
            }
         // }
 }
 else {
     header ("Location: dd-check.php");
}
 ?>