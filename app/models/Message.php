<?php

    class Message extends Model{
        
        private $messageId;
        private $content;
        private $sender;
        private $receiver;
        private $dateTime;
        private $openedByReceiver;


        // --------Getter and Setters of the attributes-----------
        public function getMessageId(){
            return $this->messageId; 
        }

        public function setMessageId($messageId){
            $this->messageId = $messageId;
        }

        public function getContent(){
            return $this->content; 
        }

        public function setContent($content){
            $this->content = $content;
        }

        public function getSender(){
            return $this->sender; 
        }

        public function setSender($sender){
            $this->sender = $sender;
        }

        public function getReceiver(){
            return $this->receiver; 
        }

        public function setReceiver($receiver){
            $this->receiver = $receiver;
        }

        public function getDateTime(){
            return $this->dateTime; 
        }

        public function setDateTime($dateTime){
            $this->dateTime = $dateTime;
        }

        public function getOpenedByReceiver(){
            return $this->openedByReceiver; 
        }

        public function setOpenedByReceiver($openedByReceiver){
            $this->openedByReceiver = $openedByReceiver;
        }

        /*End of getters and setters */

        public function insertMessage($send,$reciever,$message){
            
            $messageTb = array(
                'sender' => "'".$send."'",
                'receiver' => "'".$reciever."'",
                'content' => "'".$this->cleanInput($message)."'",
                'datetime' =>"UTC_TIMESTAMP",
                'opened_by_receiver' => "FALSE"

            );

            $this->insert('message',$messageTb);

        }

        public function retrieveChatHistory($username){
            
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $combination = []; // to put the latest combination
                $chats = []; // to store all the the latest chats between sender and reciever
                $sql = "SELECT * FROM message WHERE sender='".$username."' or receiver = '".$username."' GROUP BY sender,receiver,datetime ORDER BY datetime DESC";
                $stmt = $conn->query($sql);
                if($messages = $stmt->fetchAll(PDO::FETCH_ASSOC)){                    
                    foreach($messages as $message){

                        if( !in_array(array($message['sender'],$message['receiver']),$combination) && !in_array(array($message['receiver'],$message['sender']),$combination) ){
                            $combination = array_merge($combination,array(array($message['sender'],$message['receiver'])));
                            $chats = array_merge($chats,array($message));
                            
                        }
                        
                    }
                    return $chats;
                }
                else{
                    return false;
                }
            }

        }

        public function retrieveMessages($username,$recipient){
            
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "SELECT * FROM message WHERE (sender='".$username."' or receiver = '".$username."') and (sender='".$recipient."' or receiver = '".$recipient."')  ORDER BY datetime DESC";
                $stmt = $conn->query($sql);
                if($messages = $stmt->fetchAll(PDO::FETCH_ASSOC)){                    
                    return $messages;
                }
                else{
                    return false;
                }
            }

        }

    }
?>