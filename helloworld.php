
<?php 
require "init.php";

if(isset($_POST["encoded_string"])){
    $encoded_string=$_POST["encoded_string"];
    $image_name = $_POST["image_name"];
    
    $decoded_string = base64_decode($encoded_string);
    $path = 'images/'.$image_name;
	echo $path;
    $query="INSERT INTO images(image,username,dou,tou) VALUES ('$encoded_string','A','1999-12-12','10:15:15')";
        
        if ($con->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $con->error;
}
   	
        mysqli_close($con);
        
	
}
?>