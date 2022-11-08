<?php
// headers

header('Access-conctrol-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-conctrol-Allow-Methods: DELETE');
header('Access-conctrol-Allow-Headers: Access-conctrol-Allow-Headers, Content-Type, Access-conctrol-Allow-Methods, Authorization, X-requested-With');

// initialize api
include_once('../core/initialize.php'); 

// instantiate post
$post = new Post($db);
$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;



if($post->delete()){
    echo json_encode(
        array('message' => 'Post Deleted.')
    );
    
}else{
    echo json_encode(
   array('message' => 'Post not Deleted.')
);
}