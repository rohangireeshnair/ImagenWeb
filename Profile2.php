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
    $key = $jsonobj->{'key'};
    $uname = $jsonobj->{'uname'};
    $sql_query = "Select uname from user_info where key1 like '$key'";
    $result = mysqli_query($con,$sql_query);
    $firstname=null;
    $lastname=null;
    $profilepic=null;
    $count1=null;
    $count2=null;
    while($row = mysqli_fetch_array($result)){
        if(!strcmp($row['uname'],$uname)){
            $sql_query1 = "Select firstname,lastname,profilepic from user_info where key1 like '$key'";
            $res1 = mysqli_query($con,$sql_query1);
            
            $sql_query2 = "Select count(funame) from following where uname like '$uname'";
            $res2 = mysqli_query($con,$sql_query2);
            
            $sql_query3 = "Select count(uname) from following where funame like '$uname'";
            $res3 = mysqli_query($con,$sql_query3);
            
            while($row1 = mysqli_fetch_array($res1)){
                $firstname=$row1['firstname'];
                $lastname=$row1['lastname'];
                $profilepic=$row1['profilepic'];
            }
            while($row2 = mysqli_fetch_array($res2)){
                $count1=$row2['count(funame)'];
            }
            while($row3 = mysqli_fetch_array($res3)){
                $count2=$row3['count(uname)'];
            }
            
        }
        class resp {
            public $firstname;
            public $lastname;
            public $profilepic;
            public $count1;
            public $count2;
        }
        
        
        
        
        $responseclass = new resp();
        
        
        $responseclass->firstname = $firstname;
        $responseclass->lastname = $lastname;
        $responseclass->profilepic = $profilepic;
        $responseclass->count1 = $count1;
        $responseclass->count2 = $count2;
        $jsonsend = json_encode(get_object_vars($responseclass));
        echo $jsonsend;
    }
}
?>