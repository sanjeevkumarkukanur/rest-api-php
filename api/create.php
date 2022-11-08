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

$post->first_name = $data->first_name;
$post->last_name = $data->last_name;
$post->email = $data->email;
$post->password = $data->password;

if(filter_var($post->email, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE)) {
    if($post->create()){
    
        echo json_encode(
            array('message' => 'Post created')
        );
        
    }else{
        echo json_encode(
       array('message' => 'Post not created')
    );
    }
  } else {
    echo json_encode(
        array('message' => 'please Enter valid email')
     );
  }
