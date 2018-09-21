<?php
require "init.php";
if(isset($_POST["json"])){
   // echo 'hello';
    $json = $_POST["json"];
    $jsonobj = json_decode($json);
    $uname1=$jsonobj->{'uname'};
   // $uname2=$uname1;
    $key=$jsonobj->{'key'};
   // echo $uname1;
    $sql_query = "select image from images where username like '$uname1'";
    $result = mysqli_query($con, $sql_query);
    class resp
    {
        public $images;
	public $index;
    }
    
    
    $responseclass = new resp();
    
    $i=0;
    while($row=mysqli_fetch_array($result))
    {
//	echo $row['image'];
        $responseclass->images=$row['image'];
        $i=$i+1;
    }
$responseclass->index=$i;
   $jsonsend = json_encode(get_object_vars($responseclass));
        echo $jsonsend;
    
}
?>