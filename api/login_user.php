<?php
   header('Access-conctrol-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-conctrol-Allow-Methods: POST');
   header('Access-conctrol-Allow-Headers: Access-conctrol-Allow-Headers, Content-Type, Access-conctrol-Allow-Methods, Authorization, X-requested-With');
   

    include("../vendor/autoload.php");

    include_once('../core/initialize.php'); 
    use Firebase\JWT\JWT;
    $post = new Post($db);
    $result = $post->login_user();

    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $data = json_decode(file_get_contents("php://input", true));
        $email= htmlentities($data->email);
        $password=htmlentities($data->password);

        while($data = $result->fetch(PDO:: FETCH_ASSOC)){
        
            $id=$data['id'];
            $first_name=$data['first_name'];
            $last_name=$data['last_name'];
            $email=$data['email'];
          
        if($password != $data['password']){
           
            echo json_encode([
                'status'=> 0,
                'message'=> 'Invalid Caradtional',
            ]);
        }
        $payload=[
            'iss' => 'localhost',
            'aud' => 'localhost',
            'exp' => time()+10000,
            'data' => [
                'id'=>$id,
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'email'=>$email,

            ]
            ];
            $key = 'example_key';
             $jwt=JWT::encode($payload, $key, 'HS256');
             echo json_encode([
                'status'=> 1,
                'jwt'=>$jwt,
                'message'=> 'Login Successfully',
            ]);

        }

    }else{
        echo json_encode([
            'status'=> 0,
            'message'=> 'Access Denied',
        ]);
    }
?>