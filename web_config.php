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

        public function signup($name,$contact,$address,$school,$sport,$email,$birthdate,$gender,$password,$created_at,$updated_at,$type,$status){
            try{
                $query = $this->db->prepare("INSERT INTO users(name,contact,address,school,sport,email,birthdate,gender,password,created_at,updated_at,type,status) VALUES(:name, :contact, :address, :school, :sport, :email, :birthdate, :gender, :password, :created_at, :updated_at, :type, :status)");
                $query->bindparam(":name", $name);
                $query->bindparam(":contact", $contact);
                $query->bindparam(":address", $address);
                $query->bindparam(":school", $school);
                $query->bindparam(":sport", $sport);
                $query->bindparam(":email", $email);
                $query->bindparam(":birthdate", $birthdate);
                $query->bindparam(":gender", $gender);
                $query->bindparam(":password", $password);
                $query->bindparam(":created_at", $created_at);
                $query->bindparam(":updated_at", $updated_at);
                $query->bindparam(":type", $type);
                $query->bindparam(":status", $status);
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
                $query = $this->db->prepare("UPDATE users SET name=:name, contact=:contact, address=:address, school=:school, sport=:sport, email=:email, password=:password, updated_at=:updated_at, image=:image WHERE id=:id");
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

        public function updateUserImage($id,$name,$contact,$address,$school,$sport,$email,$password,$updated_at,$image){
            try{
                $query = $this->db->prepare("UPDATE users SET name=:name, contact=:contact, address=:address, school=:school, sport=:sport, email=:email, password=:password, updated_at=:updated_at, image=:image WHERE id=:id");
                $query->bindparam(":id", $id);
                $query->bindparam(":name", $name);
                $query->bindparam(":contact", $contact);
                $query->bindparam(":address", $address);
                $query->bindparam(":school", $school);
                $query->bindparam(":sport", $sport);
                $query->bindparam(":email", $email);
                $query->bindparam(":password", $password);
                $query->bindparam(":updated_at", $updated_at);
                $query->bindparam(":image", $image);
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

        public function checkEmail($email){
            try{
                $query = $this->db->prepare("SELECT * from users where email=:email");
                $query->bindparam(":email", $email);
                $query->execute();
                return $request = $query->fetch();
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function fetchUsers(){
            try{
                $query = $this->db->prepare("SELECT * FROM users WHERE type!='Admin'");
                $query->execute();
                return $request = $query->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function fetchAthletes($sport,$school){
            try{
                $query = $this->db->prepare("SELECT * from users WHERE sport=:sport AND school=:school AND type='Athlete'");
                $query->bindparam(":sport", $sport);
                $query->bindparam(":school", $school);
                $query->execute();
                return $request = $query->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function fetchAllAthletes($sport){
            try{
                $query = $this->db->prepare("SELECT * FROM users WHERE sport=:sport AND type='Athlete'");
                $query->bindparam(":sport", $sport);
                $query->execute();
                return $request = $query->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function fetchCoaches(){
            try{
                $query = $this->db->prepare("SELECT * from users WHERE type='Coach' AND status='Deactivated'");
                $query->execute();
                return $request = $query->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function fetchSchool($school){
            try{
                $query = $this->db->prepare("SELECT * FROM users WHERE school='$school' AND status='Activated'");
                $query->bindparam(":school", $school);
                $query->execute();
                return $request = $query->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function fetchSport($sport){
            try{
                $query = $this->db->prepare("SELECT * from users WHERE sport='$sport' AND status='Activated'");
                $query->bindparam(":sport", $sport);
                $query->execute();
                return $request = $query->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function updateStatus($id,$status){
            try{
                $query = $this->db->prepare("UPDATE users SET status=:status WHERE id=:id");
                $query->bindparam(":id", $id);
                $query->bindparam(":status", $status);
                $query->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function searchUser($search){
            $searched = "%$search%";
            try{
                $query = $this->db->prepare("SELECT * FROM users WHERE name LIKE :name AND type != 'Admin'");
                $query->bindparam(":name", $searched);
                $query->execute();
                return $result = $query->fetchAll();
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function searchAthlete($searchAthlete,$searchGender,$searchAge,$searchPosition,$sport){
            $name = "%".$searchAthlete."%";
            $gender = "%".$searchGender."%";
            $position = "%".$searchPosition."%";

            $now = date('Y-m-d');
            $date = strtotime($now." -".$searchAge." years");
            $age_format = date('Y', $date);
                if($age_format == 1970){
                    $age = "%%";
                }else{
                    $age = "%".$age_format."%";
                }
            

            try{
                $query = $this->db->prepare("SELECT * FROM users
                                            WHERE (name LIKE :name AND
                                                gender LIKE :gender AND
                                                position LIKE :position AND
                                                YEAR(birthdate) LIKE :age) AND sport=:sport AND type='Athlete'");
                $query->bindparam(":name", $name);
                $query->bindparam(":gender", $gender);
                $query->bindparam(":age", $age);
                $query->bindparam(":position", $position);
                $query->bindparam(":sport", $sport);
                $query->execute();
                return $request = $query->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function searchSportUsers($search,$sport){
            $searched = "%$search%";
            try{
                $query = $this->db->prepare("SELECT * from users WHERE name LIKE :name AND sport=:sport");
                $query->bindparam(":sport", $sport);
                $query->bindparam(":name", $searched);
                $query->execute();
                return $request = $query->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function searchSchoolUsers($search,$school){
            $searched = "%$search%";
            try{
                $query = $this->db->prepare("SELECT * from users WHERE name LIKE :name AND school=:school");
                $query->bindparam(":school", $school);
                $query->bindparam(":name", $searched);
                $query->execute();
                return $request = $query->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }
        
        public function retrieveSports(){
            try{
                $query = $this->db->prepare("SELECT * from sports");
                $query->execute();
                return $request = $query->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function athleteInvites($coach,$athlete,$message,$created_at){
            try{
                $query = $this->db->prepare("INSERT INTO invites(coach_id,athlete_id,message,created_at) VALUES(:coach, :athlete, :message, :created_at)");
                $query->bindparam(":coach", $coach);
                $query->bindparam(":athlete", $athlete);
                $query->bindparam(":message", $message);
                $query->bindparam(":created_at", $created_at);
                $query->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }   
        }

        public function invitedAthletes($coach_id){
            try{
                $query = $this->db->prepare("SELECT * FROM invites INNER JOIN users ON invites.athlete_id=users.id WHERE coach_id=:coach");
                $query->bindparam(":coach", $coach_id);
                $query->execute();
                return $request = $query->fetchAll();
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            } 
        }

        public function schoolAthletes($school, $sport){
            try{
                $query = $this->db->prepare("SELECT * FROM users WHERE school=:school AND sport=:sport AND type='Athlete'");
                $query->bindparam(":sport", $sport);
                $query->bindparam(":school", $school);
                $query->execute();
                return $request = $query->fetchAll();
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            } 
        }

        public function BasketballPlayerStats($athlete_id){
            try{
                $query = $this->db->prepare("SELECT * FROM Basketball INNER JOIN users ON basketball.user_id=users.id WHERE user_id=:athlete");
                $query->bindparam(":athlete", $athlete_id);
                $query->execute();
                return $request = $query->fetch();
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            } 
        }

        public function VolleyballPlayerStats($athlete_id){
            try{
                $query = $this->db->prepare("SELECT * FROM Volleyball INNER JOIN users ON volleyball.user_id=users.id WHERE user_id=:athlete");
                $query->bindparam(":athlete", $athlete_id);
                $query->execute();
                return $request = $query->fetch();
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            } 
        }

        public function removeInvite($id){
            try{
                $query = $this->db->prepare("DELETE FROM invites WHERE invite_id=:id");
                $query->bindparam(":id", $id);
                $query->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            } 
        }

        public function checkInvite($athlete_id, $coach_id){
            try{
                $query = $this->db->prepare("SELECT * FROM invites WHERE athlete_id=:athlete AND coach_id=:coach");
                $query->bindparam(":athlete", $athlete_id);
                $query->bindparam(":coach", $coach_id);
                $query->execute();
                return $request = $query->fetch();
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            } 
        }

        public function userImage($id){
            try{
                $query = $this->db->prepare("SELECT image FROM users WHERE id=:id");
                $query->bindparam(":id", $id);
                $query->execute();
                return $request = $query->fetch();
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            } 
        }

        public function deleteInvites($invite_id){
            try{
                $query = $this->db->prepare("DELETE FROM invites WHERE invite_id=:invite");
                $query->bindparam(":invite", $invite_id);
                $query->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            } 
        }

    }
?>