<?php
include_once('config.php');
if($_REQUEST['user_id'] !=''){
    $user_id = $_REQUEST['user_id'];
    $result = "SELECT * FROM  usergallery where user_id ='$user_id'";
    $query = mysqli_query($conn,$result);
    
    if ($query->num_rows > 0) {
        $response["usergallery"] = array();
        while ($row = mysqli_fetch_assoc($query)) {
          
    		$subproduct["id"] = $row["id"];
    		$subproduct["user_id"] = $row["user_id"];
    		$subproduct["catimage"] = $row["catimage"];  
    		$subproduct["date"] = $row["date"];  
    		$subproduct["likes"] = $row["likes"];  
    		$subproduct["dislike"] = $row["dislike"];  
    		$subproduct["status"] = $row["status"];  
                   
    		array_push($response["usergallery"], $subproduct); 
        }
        $response["success"] = 200;
        $response["message"] = "All Details found";
        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "No Details found";
        echo json_encode($response);
    }
}
else {
    $response['success'] = '401';
    $response['message'] = 'Missing variable';
    echo json_encode($response);
}
    

?>