
<?php 
require "init.php";

if(isset($_POST["json"])){
    $json= $_POST["json"];
    $jsonobj = json_decode($json);
    $uname = $jsonobj->{'username'};
 //   $passwd = $jsonobj->{'password'};
    $encoded_string = $jsonobj->{'uploadpic'};
	class resp 
	{
   		public $response;
	}
											

	$responseclass = new resp();
$responseclass->response=False;
      if(strlen($encoded_string)==0)
	{
		$jsonsend = json_encode(get_object_vars($responseclass));
	echo $jsonsend;
	}
      else
     {	
 //   $email = $jsonobj->{'email'};
    $dou='1999-12-12';
    $tou='19:11:11';
    //echo $encoded_string;
    $query="INSERT INTO images (image,username,dou,tou) VALUES ('$encoded_string','$uname','$dou','$tou')";
    //echo '$firstname';
        if ($con->query($query) == TRUE&&strlen($encoded_string)!=0) {
	$responseclass->response=True;	
	//echo $check;
} else {
	$responseclass->response=False;
}
   	
        mysqli_close($con);
        
	$jsonsend = json_encode(get_object_vars($responseclass));
	echo $jsonsend;
}
}
?>