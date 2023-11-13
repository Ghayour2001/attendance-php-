<?php
 require_once 'config.php';
 if($_REQUEST['id'] !='' && $_REQUEST['status'] != ''){
$id = $_REQUEST['id'];
$status = $_REQUEST['status'];
// $dislike = $_REQUEST['dislike'];
$result = "SELECT * FROM  usergallery where id ='$id'";
$query = mysqli_query($conn,$result);
$row = mysqli_fetch_array($query);
$like = $row['likes'];
$dislike = $row['dislike'];

if ($status == 1) {
  $like = ++$like;
    $result = mysqli_query(
        $conn,
        "UPDATE usergallery set likes = '$like' where id='$id'"
    );
    if ($result == true) {
        $response = [];
        $response['message'] = 'likes  successfully!';
        $response['success'] = 200;
        echo json_encode($response);
    }


   
}
elseif($status==0){
    $dislike = ++$dislike;
    $result = mysqli_query(
        $conn,
        "UPDATE usergallery set dislike = '$dislike' where id='$id'"
    );
    if ($result == true) {
        $response = [];
        $response['message'] = 'dislike  successfully!';
        $response['success'] = 200;
        echo json_encode($response);
    }

}
else {
    $response = [];
    $response['message'] = 'Db Error!';
    $response['success'] = 201;
    echo json_encode($response);
}
}
else {
    $response['success'] = '401';
    $response['message'] = 'Missing variable';
    echo json_encode($response);
}

     