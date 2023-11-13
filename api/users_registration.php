<?php
$conn= mysqli_connect("localhost","root","","cats");


 if ($_REQUEST["name"] !='' && $_REQUEST["password"] !='') {
     
        $name = $_REQUEST["name"]; 
    	$password  =  $_REQUEST["password"];
    	
    	
        $response=array();
        
        $queryname ="SELECT * FROM login WHERE name='".$name."'";
        $resultname = mysqli_query($conn,$queryname);
        $rows_countname = mysqli_num_rows($resultname);
        if ($rows_countname>0){
            $response=array();
         	$response["message"]= "User Already Exist";
    	    $response["success"] = 300;
    	    echo json_encode($response);
        }else{
            $query ="INSERT INTO `login`(`name`,`password`) VALUES ('".$name."','".$password."')";
            $check = mysqli_query($conn,$query);
            if($check){
                $response=array();
                $response["message"]= "User Registered Successfully!";
                $response["success"] = 200;
                echo json_encode($response);
            }else{
                 $response=array();
                 $response["message"]= "DB Process Issue";
                $response["success"] = 102;
                echo json_encode($response);
            } 
          
        }
       
 }
 else{
 	$response['success'] =401;
 	$response['message'] ='Missing variable';
 	echo json_encode($response);
 }

?>