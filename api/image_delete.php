<?php
 require_once 'config.php';
 if($_REQUEST['id'] !=''){
$id = $_REQUEST['id'];


    $result = mysqli_query($conn, "DELETE FROM catgallery where id='$id'");
    // $row=mysqli_num_rows($result);
    if ($result > 0) {
        $response = [];
        $response['message'] = 'Cat images  deleted successfully!';
        $response['success'] = 200;
        echo json_encode($response);
    } else {
        $response = [];
        $response['message'] = 'Db Error!';
        $response['success'] = 201;
        echo json_encode($response);
    }
} else {
    $response['success'] = '401';
    $response['message'] = 'Missing variable';
    echo json_encode($response);
}

?>