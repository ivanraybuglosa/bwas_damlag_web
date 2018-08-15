<?php
    session_start();
    include_once 'android_db_connect.php';
    
    class User{
        
        private $db;
        private $db_table = "users";
        public function __construct(){
            $this->db = new DbConnect();
        }
        
        public function isLoginExist($email, $password){
            
            $query = "select * from ".$this->db_table." where email = '$email' AND password = '$password' Limit 1";
            
            $result = mysqli_query($this->db->getDb(), $query);
            
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];

                }
                mysqli_close($this->db->getDb());
                
                return true;
                
            }
            
            mysqli_close($this->db->getDb());
            
            return false;
            
        }
        
        public function createNewRegisterUser($name,$password,$email,$school,$address,$contactNumber,$sport){
              
            if($sport == 'Select Sport'){
                $json['success'] = 0;
                $json['message'] = "Invalid Sport Selection";
            }else{
                
                $passwordmd5 = md5($password);
                $query = "insert into ".$this->db_table." (name, password, email, previous_school, contact, address, created_at, updated_at, type, sport, status) 
                values ('$name', '$passwordmd5', '$email', '$school', '$contactNumber', '$address', NOW(), NOW(), 'Athlete', '$sport', 'Activated')";
                
                mysqli_query($this->db->getDb(), $query);
                        
                        $json['success'] = 1;
                        $json['message'] = "Successfully Registered";
                
                mysqli_close($this->db->getDb());
            }
            
            return $json;
        }

        
        public function loginUsers($email, $password){
            
            
            $canUserLogin = $this->isLoginExist($email, $password);
            if($canUserLogin==true){
                $json['id'] = $_SESSION['id'];
                $json['name'] = $_SESSION['name'];
                $json['email'] = $_SESSION['email'];
                $json['success'] = 1;
                $json['message'] = "Successfully logged in";
                
            }else{
                $json['success'] = 0;
                $json['message'] = "Incorrect details";
                
            
            }
            return $json;
        }
    }
    

    ?>