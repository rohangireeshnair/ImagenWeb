<?php
/**
 * Created by PhpStorm.
 * User: rohangnair
 * Date: 08/09/18
 * Time: 2:50 PM
 */
require "init.php";
if(isset($_POST["json"])){
$json = $_POST["json"];
$jsonobj = json_decode($json);
$username = $jsonobj->{'username'};
$password = $jsonobj->{'password'};

$sql_query = "select * from user_info where uname like '$username' and passwd like '$password'";
$result = mysqli_query($con, $sql_query);
class resp 
{
   public $response;
   public $key;
}
											

$responseclass = new resp();


if(mysqli_num_rows($result)>0)
{
    $responseclass->response = True;
    $responseclass->key = md5(microtime().rand());
    $query1="UPDATE user_info set key1='$responseclass->key' where uname='$username'";
    $result = mysqli_query($con, $query1);
}
elseif(mysqli_num_rows($result)==0)
{
    $responseclass->response = False;
    $responseclass->key = null;
}
$jsonsend = json_encode(get_object_vars($responseclass));
echo $jsonsend;
}
?>