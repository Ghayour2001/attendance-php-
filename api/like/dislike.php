<?php
 require_once 'config.php';
 if($_REQUEST['id'] !='' && $_REQUEST['likes'] != ''){
$id = $_REQUEST['id'];
$like = $_REQUEST['likes'];
// $dislike = $_REQUEST['dislike'];
if($likes==0){
    $likes = ++$like;
    $result = mysqli_query(
        $conn,
        "UPDATE usergallery set likes = '$likes' where id='$id'"
    );
    if ($result == true) {
    $response = [];
    $response['message'] = 'like successfully!';
    $response['success'] = 200;
    echo json_encode($response);
    }
}
else {
    $result = mysqli_query(
        $conn,
        "UPDATE usergallery set likes = 'like' where id='$id'"
    );
    if ($result == true) {
        $response = [];
        $response['message'] = 'likes !';
        $response['success'] = 250;
        echo json_encode($response);
    }
}


        
        }
    

?>