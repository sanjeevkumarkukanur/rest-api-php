<?php
// headers

header('Access-conctrol-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-conctrol-Allow-Methods: POST');
header('Access-conctrol-Allow-Headers: Access-conctrol-Allow-Headers, Content-Type, Access-conctrol-Allow-Methods, Authorization, X-requested-With');

// initialize api
include_once('../core/initialize.php'); 

// instantiate post
$post = new Post($db);
$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;
$post->first_name = $data->first_name;
$post->last_name = $data->last_name;
$post->email = $data->email;
$post->password = $data->password;


if($post->update()){
    echo json_encode(
        array('message' => 'Post updated.')
    );
    
}else{
    echo json_encode(
   array('message' => 'Post not Updated.')
);
}