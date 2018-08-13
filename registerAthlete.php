<?php
    include_once 'android_db_connect.php';
    class User{
        
        private $db;
        private $db_table = "users";
        public function __construct(){
            $this->db = new DbConnect();
        }
        public function createNewRegisterUser($name,$address,$contactNumber,$birthday,$email,$password,$gender,$school,$sport,$position){
                
            if($sport == 'Select Sport' || $school == 'Select Last School Attended' || $position == 'Select Position' || $gender == 'Gender'){
                $json['success'] = 0;
                $json['message'] = "Invalid Input Details";
            }else{
                
                $passwordmd5 = md5($password);
                $query = "insert into ".$this->db_table." (name, password, email, previous_school, contact, address, created_at, updated_at, type, sport, status,birthdate,position,gender) 
                values ('$name', '$passwordmd5', '$email', '$school', '$contactNumber', '$address', NOW(), NOW(), 'Athlete', '$sport', 'Activated','$birthday','$position','$gender')";
                
                mysqli_query($this->db->getDb(), $query);
                        
                        $json['success'] = 1;
                        $json['message'] = "Successfully Registered";
                
                mysqli_close($this->db->getDb());
            }
            
            return $json;
        }
    }
    
    $name = "";
    $address = "";
    $contactNumber = "";
    $birthday = "";
    $email = "";
    $password = "";
    $gender="";
    $school = "";
    $sport = "";
    $position = "";
    
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
    
    if(isset($_POST['password'])){
        
        $password = $_POST['password'];
        
    }
    if(isset($_POST['gender'])){
        
        $gender = $_POST['gender'];
        
    }
    if(isset($_POST['school'])){
        
        $school = $_POST['school'];
        
    }
    if(isset($_POST['sport'])){
        
        $sport = $_POST['sport'];
        
    }
    if(isset($_POST['position'])){
        
        $position = $_POST['position'];
        
    }
    
        $userObject = new User();
        
        $hashed_password = md5($password);
        
        $json_registration = $userObject->createNewRegisterUser($name,$address,$contactNumber,$birthday,$email,$password,$gender,$school,$sport,$position);
        
        echo json_encode($json_registration);
    
?>