<?php

    class Notification extends Model{
        
        private $notificationId;
        private $title;
        private $content;
        private $dateTime;
        private $status;
        private $recipient;
        private $url;


        // --------Getter and Setters of the attributes-----------
        public function getNotificationId(){
            return $this->notificationId; 
        }

        public function setNotificationId($notificationId){
            $this->notificationId = $notificationId;
        }

        public function getTitle(){
            return $this->title; 
        }

        public function setTitle($title){
            $this->title = $title;
        }

        public function getContent(){
            return $this->content; 
        }

        public function setContent($content){
            $this->content = $content;
        }

        public function getDateTime(){
            return $this->dateTime; 
        }

        public function setDateTime($dateTime){
            $this->dateTime = $dateTime;
        }

        public function getStatus(){
            return $this->status; 
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function getRecipient(){
            return $this->recipient; 
        }

        public function setRecipient($recipient){
            $this->recipient = $recipient;
        }

        public function getUrl(){
            return $this->url; 
        }

        public function setUrl($url){
            $this->url = $url;
        }


        // End of getters and setters
        public function retrieveAllNotifications($id=""){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                
                if($_SESSION['usertype'] ==='serviceseeker' || $_SESSION['usertype'] ==='serviceprovider'){
                    $sql = "SELECT * FROM notification  where recipient = '".$id."'";
                }                
                elseif($_SESSION['usertype'] ==='admin'){
                    $sql = "SELECT * FROM notification";
                }

                $stmt = $conn->query($sql);
                if($notifications = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $notifications;
                }
                else{
                    return false;
                }
            }
        }

        public function validatePushNotification($input){
            
            // $notificationData holds the data to be inserted to Service provider table
            $notificationData = array();
            $error=array();


            if(empty($input['title'])){
                $error = array_merge($error,array('title' => 'This field is required.'));
            }
            else{
                $notificationData = array_merge($notificationData,array('title' => $this->cleanInput($input['title'])));
            }

            if(empty($input['content'])){
                $error = array_merge($error,array('content' => 'This field is required.'));
            }
            else{
                $notificationData = array_merge($notificationData,array('content' => $this->cleanInput($input['content'])));
            }

            if(empty($input['recipientselect'])){
                $error = array_merge($error,array('recipient' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['recipientselect']);
                if($cleanData>=1 && $cleanData<=4){
                    if($cleanData==4){

                        if(empty($input['recipient'])){
                            $error = array_merge($error,array('recipient' => 'Enter the username.'));
                        }
                        else{
                            $username = $this->cleanInput($input['recipient']);
                            require_once('../app/models/User.php');
                            $user = new User();
                            if($user->checkUserExists($username)){
                                $notificationData = array_merge($notificationData,array('recipient' => $username));
                            }
                            else{
                                $error = array_merge($error,array('recipient' => 'Username does not exist.'));
                            }
                        }                        
                    }

                    else{
                        if($cleanData==1){$notificationData = array_merge($notificationData,array('recipient' => "All service providers"));}
                        if($cleanData==2){$notificationData = array_merge($notificationData,array('recipient' => "All service seekers"));}
                        if($cleanData==3){$notificationData = array_merge($notificationData,array('recipient' => "All"));}
                    }
                    
                }
                else{
                    $error = array_merge($error,array('recipient' => 'Invalid input.'));
                }
            }            

            if(empty($error)){
                return array('valid'=>1 ,'data'=>$notificationData);
            }
            else{
                return array('valid'=>0,'data'=>$notificationData,'error'=>$error);
            }
        }

        public function pushNotification($data){
            $response = $this->validatePushNotification($data);
            if($response['valid']==true){
                $this->setTitle($response['data']['title']);
                $this->setContent($response['data']['content']);
                $this->setRecipient($response['data']['recipient']);
                $this->setStatus('closed');
                
                if($this->getRecipient()=='All'){

                    require_once('../app/models/ServiceProvider.php');
                    $serviceProvider = new ServiceProvider();
                    $serviceProviders = $serviceProvider->retrieveServiceProviders();
                    foreach($serviceProviders as $provider){                        
                        $notificationTb = array(
                            'title' => "'".$this->getTitle()."'",
                            'content' => "'".$this->getContent()."'",
                            'datetime' => "UTC_TIMESTAMP",
                            'recipient' => "'".$provider['username']."'",
                            'status' => "'".$this->getStatus()."'",
                            'admin_id' => "'".$_SESSION['username']."'"
                        );    
                        $this->insert('notification',$notificationTb);
                    }

                    require_once('../app/models/ServiceSeeker.php');
                    $serviceSeeker = new ServiceSeeker();
                    $serviceSeekers = $serviceSeeker->retrieveServiceSeekers();
                    foreach($serviceSeekers as $seeker){                        
                        $notificationTb = array(
                            'title' => "'".$this->getTitle()."'",
                            'content' => "'".$this->getContent()."'",
                            'datetime' => "UTC_TIMESTAMP",
                            'recipient' => "'".$seeker['username']."'",
                            'status' => "'".$this->getStatus()."'",
                            'admin_id' => "'".$_SESSION['username']."'"
                        );    
                        $this->insert('notification',$notificationTb);
                    }
                    
                    return array('valid'=>1);
                }

                elseif($this->getRecipient()=='All service providers'){

                    require_once('../app/models/ServiceProvider.php');
                    $serviceProvider = new ServiceProvider();
                    $serviceProviders = $serviceProvider->retrieveServiceProviders();
                    foreach($serviceProviders as $provider){                        
                        $notificationTb = array(
                            'title' => "'".$this->getTitle()."'",
                            'content' => "'".$this->getContent()."'",
                            'datetime' => "UTC_TIMESTAMP",
                            'recipient' => "'".$provider['username']."'",
                            'status' => "'".$this->getStatus()."'",
                            'admin_id' => "'".$_SESSION['username']."'"
                        );    
                        $this->insert('notification',$notificationTb);
                    }
                    
                    return array('valid'=>1);
                }

                elseif($this->getRecipient()=='All service seekers'){

                    require_once('../app/models/ServiceSeeker.php');
                    $serviceSeeker = new ServiceSeeker();
                    $serviceSeekers = $serviceSeeker->retrieveServiceSeekers();
                    foreach($serviceSeekers as $seeker){                        
                        $notificationTb = array(
                            'title' => "'".$this->getTitle()."'",
                            'content' => "'".$this->getContent()."'",
                            'datetime' => "UTC_TIMESTAMP",
                            'recipient' => "'".$seeker['username']."'",
                            'status' => "'".$this->getStatus()."'",
                            'admin_id' => "'".$_SESSION['username']."'"
                        );    
                        $this->insert('notification',$notificationTb);
                    }
                    
                    return array('valid'=>1);
                }

                else{
                    
                    $notificationTb = array(
                        'title' => "'".$this->getTitle()."'",
                        'content' => "'".$this->getContent()."'",
                        'datetime' => "UTC_TIMESTAMP",
                        'recipient' => "'".$this->getRecipient()."'",
                        'status' => "'".$this->getStatus()."'",
                        'admin_id' => "'".$_SESSION['username']."'"
                    );

                    $this->insert('notification',$notificationTb);
                    return array('valid'=>1);
                }

                
            } 
            else{
                return $response;
            }      
        }

    }
?>