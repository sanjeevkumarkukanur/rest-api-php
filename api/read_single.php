<?php
// headers

header('Access-conctrol-Allow-Origin: *');
header('Content-Type: application/json');

// initialize api
include_once('../core/initialize.php'); 

// instantiate post
$post = new Post($db);

$post->id = isset($_GET['id']) ? $_GET['id'] : die();
$post->read_single();

$post_arr = array(
    'id'=> $post->id,
    'first_name' => $post-> first_name,
    'last_name' => $post-> last_name,
    'email' => $post-> email,
    'password' => $post-> password
);
echo json_encode($post_arr);
?> 