<?php
    include_once('config.php');
    if($_REQUEST['name'] !=''){
        $cattypename=$_REQUEST['name'];

    $result = "SELECT * FROM cattypes where name='$cattypename'";
    $query = mysqli_query($conn,$result);
    if ($query->num_rows > 0) {
        $response["cattypes"] = array();
        while ($row = mysqli_fetch_assoc($query)) {
                $subproduct["id"] = $row["id"];
            	$subproduct["name"] = $row["name"];
            	$result1 = "SELECT * FROM catcharacteristics WHERE cat_id='".$row["id"]."'";
                $query1 = mysqli_query($conn,$result1);
                if ($query1->num_rows > 0) {
                    while($row1 = mysqli_fetch_assoc($query1)){
                    $subproduct["title"] = $row1["title"];
                    $subproduct["description"] = $row1["description"];
                    $response["success"] = "characteristic List Found";
                    $response["success"] = 200;
                    array_push($response["cattypes"], $subproduct); 
                    }
                    echo json_encode($response);
                }
        	
                
    }
   
    } else{
        $response["success"] = 300;
        $response["message"] = "No characteristic List Found";
        echo json_encode($response);

    }
   
}  else {
    $response["success"] = 0;
    $response["message"] = "No List Found";
    echo json_encode($response);
}
 
?>