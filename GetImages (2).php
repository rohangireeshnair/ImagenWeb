<?php
require "init.php";
if(isset($_POST["json"])){
    $json = $_POST["json"];
    $jsonobj = json_decode($json);
    $uname1=$jsonobj->{'uname'};
    $uname2=$uname1;
    $key=$jsonobj->{'key'};
    echo '$uname1';
   /* $sql_query = "select image from images where uname like '$uname1'";
    $result = mysqli_query($con, $sql_query);
    class resp
    {
        public $images=array();
    }
    
    
    $responseclass = new resp();
    
    
    while($row=mysqli_fetch_array($result))
    {
        $i=0;
        $responseclass->images[$i]=$row['image'];
        $i++;
    }*/
    
}
?>