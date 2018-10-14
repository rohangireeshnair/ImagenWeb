<?php


require "init.php";
    $image_name='test2.jpg';
    $path = 'carrot/'.$image_name;
	echo $path;
    $mm='images/test1.jpg';
    $query="Select profilepic from user_info where uname like '$mm'";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result))
    {
	$imagee=$row['profilepic'];
    }
    $decoded_string = base64_decode($imagee);	
     $ifp = fopen( $path, 'wb' ); 
   fwrite( $ifp,$decoded_string);
   fclose($ifp);

    mysqli_close($con);
        


?>