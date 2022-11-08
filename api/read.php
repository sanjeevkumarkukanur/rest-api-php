<?php
// headers

header('Access-conctrol-Allow-Origin: *');
header('Content-Type: application/json');

// initialize api
include_once('../core/initialize.php'); 

// instantiate post
$post = new Post($db);

// post query

$result = $post->read();

// get row 
$num = $result->rowCount();

if($num > 0){
    $post_arr = array();
    $post_arr['data'] = array();

    while($row = $result->fetch(PDO:: FETCH_ASSOC)){
        extract($row);
        $post_item = array(
             'id' => $id,
             'first_name' => $first_name,
             'last_name' => $last_name,
             'email' => $email,
             'password' => $password

        );
        array_push($post_arr['data'], $post_item);
    }
    echo json_encode($post_arr);
}else{
    header("HTTP/1.1 401 Unauthorized");
    header("Location: error401.php");
}
?>