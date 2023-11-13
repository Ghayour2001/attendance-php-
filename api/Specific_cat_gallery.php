<?php
    include_once('config.php');
    if($_REQUEST['name'] !=''){
        $cattypename=$_REQUEST['name'];

    $result = "SELECT * FROM cattypes where name='$cattypename'";
    $query = mysqli_query($conn,$result);
    if ($query->num_rows > 0) {
        $response["catgallery"] = array();
        while ($row = mysqli_fetch_assoc($query)) {
                $subproduct["id"] = $row["id"];
            	$subproduct["name"] = $row["name"];
            	$result1 = "SELECT * FROM catgallery WHERE cat_id='".$row["id"]."'";
                $query1 = mysqli_query($conn,$result1);
                if ($query1->num_rows > 0) {
                  

                    while($row1 = mysqli_fetch_assoc($query1)){
                    $subproduct["image1"] = $row1["image1"];
                    $subproduct["image2"] = $row1["image2"];
                    $subproduct["image3"] = $row1["image3"];
                    $subproduct["image4"] = $row1["image4"];
                    $subproduct["image5"] = $row1["image5"];
                    $response["success"] = 200;
                    $response["message"] = "cat images List Found";
                    array_push($response["catgallery"], $subproduct); 
                    }
                    echo json_encode($response);
                }
                else{
                    $response["success"] = 300;
                    $response["message"] = "No images List Found";
                    echo json_encode($response);
            
                }

        	
                
    }
   
    } else{
        $response["success"] = 300;
        $response["message"] = "No data List Found";
        echo json_encode($response);

    }
   
}  else {
    $response["success"] = 0;
    $response["message"] = "No List Found";
    echo json_encode($response);
}
 
?>