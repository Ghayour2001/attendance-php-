<?php
    include_once('config.php');
    $result = "SELECT * FROM cattypes";
    $query = mysqli_query($conn,$result);
    if ($query->num_rows > 0) {
        $response["cattypes"] = array();
        while ($row = mysqli_fetch_assoc($query)) {
           
                $subproduct["id"] = $row["id"];
            	$subproduct["name"] = $row["name"];
            	$subproduct["lifespan"] = $row["lifespan"];
            	$subproduct["length"] = $row["length"];
            	$subproduct["weight"] = $row["weight"];
            	$subproduct["origin"] = $row["origin"];
            	$subproduct["introduction"] = $row["introduction"];
            	$subproduct["history"] = $row["history"];
            	$subproduct["image"] = $row["image"];
                $response["message"] = "Cat list";
                $response["success"] = 200;
            	array_push($response["cattypes"], $subproduct); 
    }
    echo json_encode($response);
    } else {
            $response["success"] = 0;
            $response["message"] = "No List Found";
            echo json_encode($response);
    }
   
    
 
?>