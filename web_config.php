<?php
    class Config {

        private $db;

        function __construct($config){
            $this->db = $config;
        }

        //Query methods
        public function login($email,$password){
            try{
                $query = $this->db->prepare("SELECT email FROM users WHERE email = :email AND password = :password");
                $query->bindparam(":email", $email);
                $query->bindparam(":password", $password);
                $query->execute();
                return $result = $query->fetch();
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function signup($name,$contact,$address,$school,$sport,$email,$password,$created_at,$updated_at,$type){
            try{
                $query = $this->db->prepare("INSERT INTO users(name,contact,address,school,sport,email,password,created_at,updated_at,type) VALUES(:name, :contact, :address, :school, :sport, :email, :password, :created_at, :updated_at, :type)");
                $query->bindparam(":name", $name);
                $query->bindparam(":contact", $contact);
                $query->bindparam(":address", $address);
                $query->bindparam(":school", $school);
                $query->bindparam(":sport", $sport);
                $query->bindparam(":email", $email);
                $query->bindparam(":password", $password);
                $query->bindparam(":created_at", $created_at);
                $query->bindparam(":updated_at", $updated_at);
                $query->bindparam(":type", $type);
                $query->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }   
        }

        public function findClient($id){
            try{
                $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
                $query->bindparam(":id", $id);
                $query->execute();
                return $result = $query->fetch();
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function updateUser($id,$name,$contact,$address,$school,$sport,$email,$password,$updated_at){
            try{
                $query = $this->db->prepare("UPDATE users SET name=:name, contact=:contact, address=:address, school=:school, sport=:sport, email=:email, password=:password, updated_at=:updated_at WHERE id=:id");
                $query->bindparam(":id", $id);
                $query->bindparam(":name", $name);
                $query->bindparam(":contact", $contact);
                $query->bindparam(":address", $address);
                $query->bindparam(":school", $school);
                $query->bindparam(":sport", $sport);
                $query->bindparam(":email", $email);
                $query->bindparam(":password", $password);
                $query->bindparam(":updated_at", $updated_at);
                $query->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteUser($id){
            try{
                $query = $this->db->prepare("DELETE FROM users WHERE id=:id");
                $query->bindparam(":id", $id);
                $query->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
    }



?>