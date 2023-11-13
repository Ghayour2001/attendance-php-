<?php
include_once('config.php');
 if ($_REQUEST["name"] !='') {
    
    
    $name = $_REQUEST['name'];
       
    $result = "SELECT * FROM cattypes WHERE name='".$name."'";
    $query = mysqli_query($conn,$result);
    
    if ($query->num_rows > 0) {
        $response["cat"] = array();
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
           
           
            $resultimage = "SELECT * FROM catgallery WHERE cat_id='".$row["id"]."'";
            $queryimage = mysqli_query($conn,$resultimage);
            if ($queryimage->num_rows > 0) {
                $subimages["images"] = array();
                while ($rowimage = mysqli_fetch_assoc($queryimage)) {
                    $image["id"] = $rowimage["id"];
                    $image["cat_id"] = $rowimage["cat_id"];
                    $image["image1"] = $rowimage["image1"];
        		    $image["image2"] = $rowimage["image2"];
                    $image["image3"] = $rowimage["image3"];
                    $image["image4"] = $rowimage["image4"];
                    $image["image5"] = $rowimage["image5"];
                    array_push($subimages["images"], $image); 
                }
                 $subproduct["images"] = $subimages;
            }else{
                $subproduct["images"] = "no images";
            }

            $resultcharacteristics = "SELECT * FROM  catcharacteristics WHERE cat_id='".$row["id"]."'";
            $querycatcharacteristics = mysqli_query($conn,$resultcharacteristics);
            if ($querycatcharacteristics->num_rows > 0) {
                $subcatcharacteristics["catcharacteristics"] = array();
                while ($row = mysqli_fetch_assoc($querycatcharacteristics)) {
            		$catcharacteristics["id"] = $row["id"];
            		$catcharacteristics["cat_id"] = $row["cat_id"];
            		$catcharacteristics["title"] = $row["title"];
                    $catcharacteristics["description"] = $row["description"];
                   
                    array_push($subcatcharacteristics["catcharacteristics"], $catcharacteristics); 
                }
                $subproduct["catcharacteristics"] = $subcatcharacteristics;
            } else {
                 $subproduct["catcharacteristics"] = "no catcharacteristics";
            }
            
    		array_push($response["cat"], $subproduct); 
        }
        $response["success"] = 200;
        $response["message"] = "cat info found";
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