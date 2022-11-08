<?php 

class Post{

    private $conn;
    private $table = 'posts';

    public function __construct($db){
        $this->conn = $db;
    }
    //getting posts from database
    public function read(){
        $userDetails = $this->conn->prepare('SELECT * FROM `user_data`');

        $userDetails->execute();

        return $userDetails;
    }

    public function read_single(){
        $userDetails = $this->conn->prepare('SELECT * FROM `user_data` WHERE `id`= ?');
        $userDetails->bindParam(1, $this->id);
        $userDetails->execute();
        $user = $userDetails->fetch(PDO::FETCH_ASSOC);

        $this->first_name = $user['first_name'];
        $this->last_name = $user['last_name'];
        $this->email = $user['email'];
        $this->password = $user['password'];

        return $userDetails;
    }

    public function create(){

        $userInsert = $this->conn->prepare('INSERT INTO `user_data` SET `first_name`= :first_name, `last_name`= :last_name, `email`= :email, `password`= :password');

        $this->first_name = $this->first_name;
        $this->last_name = $this->last_name;
        $this->email = $this->email;
        $this->password = $this->password;
        
        $userInsert->bindParam(':first_name', $this->first_name);
        $userInsert->bindParam(':last_name', $this->last_name);
        $userInsert->bindParam(':email', $this->email);
        $userInsert->bindParam(':password', $this->password );
        
        
        if($userInsert->execute()){
            return true;
        }

        print_r("Error %s. \n", $userInsert->error);
        return false;

    }
// Update function 
    public function update(){

        $userUpdate = $this->conn->prepare('UPDATE `user_data` SET `first_name`= :first_name, `last_name`= :last_name, `email`= :email, `password`= :password
        WHERE `id`= :id');

        $this->first_name = $this->first_name;
        $this->last_name = $this->last_name;
        $this->email = $this->email;
        $this->password = $this->password;
        $this->id = $this->id;
        
        $userUpdate->bindParam(':first_name', $this->first_name);
        $userUpdate->bindParam(':last_name', $this->last_name);
        $userUpdate->bindParam(':email', $this->email);
        $userUpdate->bindParam(':password', $this->password );
        $userUpdate->bindParam(':id', $this->id );
        
        if($userUpdate->execute()){
            return true;
        }

        print_r("Error %s. \n", $userUpdate->error);
        return false;

    }

    // Delete function 

    public function delete(){
        $userDelete = $this->conn->prepare('DELETE  FROM `user_data` WHERE `id`= :id');
        $this->id = $this->id;
        $userDelete->bindParam(':id',$this->id);
     
       
        if($userDelete->execute()){
            return true;
        }

        print_r("Error %s. \n", $userDelete->error);
        return false;

    }
    public function login_user(){
        $userDetails = $this->conn->prepare('SELECT * FROM `user_data`');

        $userDetails->execute();

        return $userDetails;
    }

}

?>