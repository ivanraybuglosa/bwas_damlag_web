<?php
    include_once 'android_db_connect.php';
    class User{
        
        private $db;
        private $db_table = "users";
        public function __construct(){
            $this->db = new DbConnect();
        }
        public function updateProfile($id,$name,$address,$contactNumber,$birthday,$email,$gender,$school){
                
            if($school == 'Select Last School Attended' || $gender == 'Gender' || $id == ''){
                $json['success'] = 0;
                $json['message'] = "Invalid Input Details";
            }else{
                
                $query = "UPDATE users set 
                `name` = '$name', `email` = '$email', `previous_school` = '$school', 
                `contact` = '$contactNumber', `address`='$address', `updated_at`=NOW(), 
                `birthdate` = '$birthday', `gender` = '$gender' WHERE `id` = '$id'";
                
                $result = mysqli_query($this->db->getDb(), $query);
                
                        $json['id'] = $id;
                        $json['name'] = $name;
                        $json['email'] = $email;
                        $json['success'] = 1;
                        $json['message'] = "Profile Updated Successfully";
            }
            
            return $json;
        }
    }
    
    $id = "";
    $name = "";
    $address = "";
    $contactNumber = "";
    $birthday = "";
    $email = "";
    $gender="";
    $school = "";
    
    if(isset($_POST['name'])){
        
        $name = $_POST['name'];
        
    }
    if(isset($_POST['address'])){
        
        $address = $_POST['address'];
        
    }
    if(isset($_POST['contactNumber'])){
        
        $contactNumber = $_POST['contactNumber'];
        
    }
    if(isset($_POST['birthday'])){
        
        $birthday = $_POST['birthday'];
        
    }
    if(isset($_POST['email'])){
        
        $email = $_POST['email'];
        
    }
    
    if(isset($_POST['gender'])){
        
        $gender = $_POST['gender'];
        
    }

    if(isset($_POST['school'])){
        
        $school = $_POST['school'];
        
    }
    
    if(isset($_POST['id'])){
        
        $id = $_POST['id'];
        
    }

        $userObject = new User();
        
        $json_update = $userObject->updateProfile($id,$name,$address,$contactNumber,$birthday,$email,$gender,$school);
        
        echo json_encode($json_update);
    
?>