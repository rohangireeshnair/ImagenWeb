<?php
require "init.php";
    $sql_query = "select * from user_info";
    $result = mysqli_query($con, $sql_query);
    class resp
    {
        public $images=array();
	public $firstname=array();
	public $lastname=array();
	public $username=array();
	public $index;
    }
    
    
    $responseclass = new resp();
    
    $i=0;
    while($row=mysqli_fetch_array($result))
    {
//	echo $row['image'];
        $responseclass->images[$i]=$row['profilepic'];
	$responseclass->firstname[$i]=$row['firstname'];
	$responseclass->lastname[$i]=$row['lastname'];
	$responseclass->username[$i]=$row['uname'];
	//$responseclass->images[$i]=$row[''];
        $i=$i+1;
    }
$responseclass->index=$i;
   $jsonsend = json_encode(get_object_vars($responseclass));
        echo $jsonsend;
    
?>