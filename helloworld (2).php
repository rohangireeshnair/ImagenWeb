
<?php 

if(isset($_POST["encoded_string"])){
    $es=$_POST["encoded_string"];
    $in = $_POST["image_name"];
    $con=new mysqli("localhost","root","","imagen");
    $sql="INSERT INTO user_info values('$in','$in','$es','$in','$in','$in');
    if ($con->query($sql) === TRUE) {
    echo "N record created successfully";
   }
   else {
    	echo "Error: " . $sql . "<br>" . $con->error;
   }

	$con->close();

}
?>