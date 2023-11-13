<?php
include_once('config.php');

    $result = "SELECT * FROM  catgallery";
    $query = mysqli_query($conn,$result);
    
    if ($query->num_rows > 0) {
        $response["catgallery"] = array();
        while ($row = mysqli_fetch_assoc($query)) {
          
    		$subproduct["id"] = $row["id"];
    		$subproduct["image1"] = $row["image1"];
    		$subproduct["image2"] = $row["image2"];
    		$subproduct["image3"] = $row["image3"];
    		$subproduct["image4"] = $row["image4"];
    		$subproduct["image5"] = $row["image5"];
           
             
                   
    		array_push($response["catgallery"], $subproduct); 
        }
        $response["success"] = 200;
        $response["message"] = "All images found";
        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "No Details found";
        echo json_encode($response);
    }
    

?>