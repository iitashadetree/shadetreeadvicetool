<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 1.5.2
 * @license: see license.txt included in package
 */

// include db config
include_once("../../../config/config.php");

define("PHPGRID_LIBPATH",dirname(__FILE__).DIRECTORY_SEPARATOR."../../lib".DIRECTORY_SEPARATOR);
// set up DB
$con = mysqli_connect(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS);
mysqli_select_db( $con, PHPGRID_DBNAME);

// include and create object
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php");
$g = new jqgrid();
$grid["autowidth"] = false;
$grid["shrinkToFit"] = false; // dont shrink to fit on screen
$grid["width"] = "1020";
$grid["height"] = "365";
// set few params
$grid["caption"] = "region";
$g->set_options($grid);

// set database table for CRUD operations
$g->table = "region";

// render grid
$out = $g->render("list4");

include '../../table_output_links.php';
echo $out



?>

