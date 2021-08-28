<?php

    class Admin extends User{
        
        private $role;
        private $permission;



        // --------Getter and Setters of the attributes-----------
        public function getRole(){
            return $this->role; 
        }

        public function setRole($role){
            $this->role = $role;
        }

        public function getPermission(){
            return $this->permission; 
        }

        public function setPermission($permission){
            $this->permission = $permission;
        }

        public function retrieveUserDetails($username){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("SELECT user.username,email,firstname,lastname,gender,mobile_number,nationality,country,city,address,status,bank_name,account_number,wallet_balance,profile_photo FROM user INNER JOIN service_seeker ON user.username = service_seeker.username where user.username='".$username."'");
                if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $data = array(
                        'username'=>$row['username'],
                        'email'=>$row['email'],
                        'firstname'=>$row['firstname'],
                        'lastname'=>$row['lastname'],
                        'gender'=>$row['gender'],
                        'mobilenumber'=>$row['mobile_number'],
                        'nationality'=>$row['nationality'],
                        'country'=>$row['country'],
                        'city'=>$row['city'],
                        'address'=>$row['address'],
                        'status'=>$row['status'],
                        'bankname'=>$row['bank_name'],
                        'accountnumber'=>$row['account_number'],
                        'walletbalance'=>$row['wallet_balance'],
                        'profilephoto'=>$row['profile_photo']                        
                    );
                    return $data;
                }
                else{
                    return false;
                }
            }
        }

        
    }
?>