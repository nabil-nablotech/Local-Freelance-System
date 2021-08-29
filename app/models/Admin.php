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
                $stmt = $conn->query("SELECT user.username,email,firstname,lastname,gender,mobile_number,nationality,country,city,address,join_date,last_login,status,role,user_management, project_management, notification_management, transcation, dispute_management, ticket_management, policy_drafting, faq_drafting FROM user INNER JOIN admin ON user.username = admin.username INNER JOIN permission ON user.username = permission.username where user.username='".$username."'");
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
                    'dispute_management'=>$row['dispute_management'],
                    'policy_drafting'=>$row['policy_drafting'],
                    'faq_drafting'=>$row['faq_drafting'] );

                    $data = array_merge($data,array('permission'=>$permission));
                    return $data;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveAdmins(){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("SELECT user.username,email,firstname,lastname,gender,mobile_number,nationality,country,city,address,join_date,last_login,status,role,user_management, project_management, notification_management, transcation, dispute_management, ticket_management, policy_drafting, faq_drafting FROM user INNER JOIN admin ON user.username = admin.username INNER JOIN permission ON user.username = permission.username");
                if($admins = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    foreach($admins as $admin){
                        $key = array_search($admin, $admins);
                        $permission =array(
                            'user_management'=>$admin['user_management'],
                            'project_management'=>$admin['project_management'],
                            'notification_management'=>$admin['notification_management'],
                            'transcation'=>$admin['transcation'],
                            'ticket_management'=>$admin['ticket_management'],
                            'dispute_management'=>$admin['dispute_management'],
                            'policy_drafting'=>$admin['policy_drafting'],
                            'faq_drafting'=>$admin['faq_drafting'] );
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