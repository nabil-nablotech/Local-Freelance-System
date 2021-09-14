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
                $stmt = $conn->query("SELECT user.username,email,firstname,lastname,gender,mobile_number,nationality,country,city,address,join_date,last_login,status,role,user_management, project_management, notification_management, transcation, dispute_management, ticket_management FROM user INNER JOIN admin ON user.username = admin.username INNER JOIN permission ON user.username = permission.username where user.username='".$username."'");
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
                        'joindate'=>$row['join_date'],
                        'lastlogin'=>$row['last_login'],
                        'status'=>$row['status'],
                        'role'=>$row['role'],
                                               
                    );

                    $permission =array(
                    'user_management'=>$row['user_management'],
                    'project_management'=>$row['project_management'],
                    'notification_management'=>$row['notification_management'],
                    'transcation'=>$row['transcation'],
                    'ticket_management'=>$row['ticket_management'],
                    'dispute_management'=>$row['dispute_management'] );

                    $data = array_merge($data,array('permission'=>$permission));
                    return $data;
                }
                else{
                    return false;
                }
            }
        }

        public function validateUpdateProfile($input){
            
            // $adminData holds the data to be inserted to Service provider table
            $adminData = array();


            if(!empty($input['firstname'])){
                $adminData = array_merge($adminData,array('firstname' => $this->cleanInput($input['firstname'])));
            }

            if(!empty($input['lastname'])){
                $adminData = array_merge($adminData,array('lastname' => $this->cleanInput($input['lastname'])));
            }

            
            if(!empty($input['nationality'])){
                $cleanData = $this->cleanInput($input['nationality']);                
                require_once '../app/models/countries.php';
                if(in_array($cleanData,Countries::$countries)){
                    $adminData = array_merge($adminData,array('nationality' => $cleanData));
                }                                
            }

            if(!empty($input['country'])){                
                $cleanData = $this->cleanInput($input['country']);                
                require_once '../app/models/countries.php';
                if(in_array($cleanData,Countries::$countries)){
                    $adminData = array_merge($adminData,array('country' => $cleanData));
                }
            }

            if(!empty($input['city'])){
                $adminData = array_merge($adminData,array('city' => $this->cleanInput($input['city'])));
            }

            if(!empty($input['address'])){
                $adminData = array_merge($adminData,array('address' => $this->cleanInput($input['address'])));
            }


            return $adminData;
        }

        public function updateProfile($data){
            $response = $this->validateUpdateProfile($data);
            
            $this->setUsername($_SESSION['username']);
            if(!empty($response['firstname'])){
                $this->setFirstName($response['firstname']);
            }
            if(!empty($response['lastname'])){
                $this->setLastName($response['lastname']);
            }
            if(!empty($response['nationality'])){
                $this->setNationality($response['nationality']);
            }
            if(!empty($response['country'])){
                $this->setCountry($response['country']);
            }
            if(!empty($response['city'])){
                $this->setCity($response['city']);
            }
            if(!empty($response['address'])){
                $this->setAddress($response['address']);
            }

        
            //The variables below are arguments to be passed to insert data to their respective table
            
            $userTb = array();
            if(!empty($this->getFirstName())){
                $userTb = array_merge($userTb,array('firstname' => "'".$this->getFirstName()."'"));
            }
            if(!empty($this->getLastName())){
                $userTb = array_merge($userTb,array('lastname' => "'".$this->getLastName()."'"));
            }
            if(!empty($this->getNationality())){
                $userTb = array_merge($userTb,array('nationality' => "'".$this->getNationality()."'"));
            }
            if(!empty($this->getCountry())){
                $userTb = array_merge($userTb,array('country' => "'".$this->getCountry()."'"));
            }
            if(!empty($this->getCity())){
                $userTb = array_merge($userTb,array('city' => "'".$this->getCity()."'"));
            }
            if(!empty($this->getAddress())){
                $userTb = array_merge($userTb,array('address' => "'".$this->getAddress()."'"));
            }

            $this->update('user',$userTb,"WHERE username ='". $this->getUsername() . "'");
              
        }

        public function retrieveAdmins(){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("SELECT user.username,email,firstname,lastname,gender,mobile_number,nationality,country,city,address,join_date,last_login,status,role,user_management, project_management, notification_management, transcation, dispute_management, ticket_management FROM user INNER JOIN admin ON user.username = admin.username INNER JOIN permission ON user.username = permission.username");
                if($admins = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    foreach($admins as $admin){
                        $key = array_search($admin, $admins);
                        $permission =array(
                            'user_management'=>$admin['user_management'],
                            'project_management'=>$admin['project_management'],
                            'notification_management'=>$admin['notification_management'],
                            'transcation'=>$admin['transcation'],
                            'ticket_management'=>$admin['ticket_management'],
                            'dispute_management'=>$admin['dispute_management'] );
                        $admins[$key] = array_merge($admins[$key], array('permission'=>$permission)) ; 

                    }
                    return $admins;
                }
                else{
                    return false;
                }
            }
        }

        
    }
?>