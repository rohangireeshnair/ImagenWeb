
<?php 
require "init.php";

if(isset($_POST["json"])){
    $json= $_POST["json"];
    $jsonobj = json_decode($json);
    $uname = $jsonobj->{'username'};
    $passwd = $jsonobj->{'password'};
    $encoded_string = $jsonobj->{'profilepic'};
    $email = $jsonobj->{'email'};
    $firstname = $jsonobj->{'firstname'};
    $lastname = $jsonobj->{'lastname'};
    class resp 
    {
   		public $response;
        	public $index;
      }
											
    
	$responseclass = new resp();
  
    $query1="SELECT uname from user_info where uname like '$uname'";
    $result1 = mysqli_query($con, $query1);
    if(mysqli_num_rows($result1)>0)
    {
       $responseclass->response=False;
       $responseclass->index=False;
	
        mysqli_close($con);
	$jsonsend = json_encode(get_object_vars($responseclass));
	echo $jsonsend;

    }
else
{
    $query="INSERT INTO user_info (uname,passwd,profilepic,firstname,lastname,email) VALUES ('$uname','$passwd','$encoded_string','$firstname','$lastname','$email')";
    //echo '$firstname';
	
        if ($con->query($query) == TRUE)
	 {
	$responseclass->response=True;	

	}
 	else {
		$responseclass->response=False;
	}
	$responseclass->index=True;   	
        mysqli_close($con);
        
	$jsonsend = json_encode(get_object_vars($responseclass));
	echo $jsonsend;
}
}
?>
