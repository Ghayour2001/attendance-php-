<?php
 require_once 'config.php';

if ($_REQUEST['name'] != '' && $_REQUEST['password'] != '') {
    $name = $_REQUEST['name'];
    $password = $_REQUEST['password'];

    $response = [];

    $queryname ="SELECT * FROM login WHERE name='" . $name . "'";
    $resultname = mysqli_query($conn, $queryname);
    $row = mysqli_fetch_array($resultname);
    if (!isset($row['name'])) {
        $response = [];
        $response['message'] = 'User not found';
        $response['success'] = 300;
        echo json_encode($response);
    } else {
        $querypassword = "SELECT * FROM login WHERE name='$name' and  password='$password'";
        $resultpassword = mysqli_query($conn, $querypassword);
        $row = mysqli_fetch_array($resultpassword);
        if (!isset($row['password'])) {
            $response = [];
            $response['message'] = 'Username or password not match Try again';
            $response['success'] = 201;
            echo json_encode($response);
        } else {
            $querypassword =
                "SELECT * FROM login WHERE name='" .$name. "' and password='" .$password . "'";
            $resultpassword = mysqli_query($conn, $querypassword);

            if ($resultpassword == true) {
                $response = [];
                $response['message'] = 'Login Successfully';
                $response['success'] = 200;
                echo json_encode($response);
            }
        }
    }
} else {
    $response['success'] = 401;
    $response['message'] = 'Missing variable';
    echo json_encode($response);
}
?>