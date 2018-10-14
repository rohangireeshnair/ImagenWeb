<?php
/**
 * Created by PhpStorm.
 * User: rohangnair
 * Date: 09/09/18
 * Time: 2:05 PM
 */
$db_name="imagen";
$mysql_user="root";
$mysql_pass="";
$server_name="localhost:3308";
$con = mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);
if (!$con)
{
	//echo "Connection Error...".mysqli_connect_error();
}
else
{
//	echo"<h3>Database connection Success...</h3>";
}
?>