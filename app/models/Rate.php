<?php

    class Rate extends Model{
        
        private $rateId;
        private $rater;
        private $ratee;
        private $projectId;
        private $score;
        private $comment;
        private $date;


        // --------Getter and Setters of the attributes-----------
        public function getRateId(){
            return $this->rateId; 
        }

        public function setRateId($rateId){
            $this->rateId = $rateId;
        }

        public function getRater(){
            return $this->rater; 
        }

        public function setRater($rater){
            $this->rater = $rater;
        }

        public function getRatee(){
            return $this->ratee; 
        }

        public function setRatee($ratee){
            $this->ratee = $ratee;
        }

        public function getProjectId(){
            return $this->projectId; 
        }

        public function setProjectId($projectId){
            $this->projectId = $projectId;
        }

        public function getScore(){
            return $this->score; 
        }

        public function setScore($score){
            $this->score = $score;
        }

        public function getComment(){
            return $this->comment; 
        }

        public function setComment($comment){
            $this->comment = $comment;
        }

        public function getDate(){
            return $this->date; 
        }

        public function setDate($date){
            $this->date = $date;
        }

        //-------- End of getters and setters -----------

        public function computeRate($username){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("select AVG(score) AS computedrate, count(comment) AS totalreviews from rate where ratee='".$username."'");
                if($rate = $stmt->fetch(PDO::FETCH_ASSOC)){
                    return $rate;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveRate($username){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("select * from rate where ratee='".$username."' ORDER BY date DESC");
                if($rate = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $rate;
                }
                else{
                    return false;
                }
            }
        }

        public function checkRatingExists($projectId){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("select * from rate where project_id='".$projectId."'");
                if($stmt->fetch(PDO::FETCH_ASSOC)){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        public function validateRateProvider($input){
            
            // $rateData holds the data to be inserted to Service provider table
            $rateData = array();
            $error=array();


            if(empty($input['score'])){
                $rateData = array_merge($rateData,array('score' => 0));
            }
            elseif($input['score']>5){
                $error = array_merge($error,array('rate' => 'Invalid input.'));
            }
            else{
                $rateData = array_merge($rateData,array('score' => $this->cleanInput($input['score'])));
            }

            if(empty($input['comment'])){
                $error = array_merge($error,array('rate' => 'This field is required.'));
            }
            else{
                $rateData = array_merge($rateData,array('comment' => $this->cleanInput($input['comment'])));
            }

            $rateData = array_merge($rateData,array('serviceprovider' => $this->cleanInput($input['serviceprovider'])));
            $rateData = array_merge($rateData,array('projectid' => $this->cleanInput($input['projectid'])));

            if(empty($error)){
                return array('valid'=>1 ,'data'=>$rateData);
            }
            else{
                return array('valid'=>0,'data'=>$rateData,'error'=>$error);
            }
        }

        public function rateProvider($data){
            $response = $this->validateRateProvider($data);
            if($response['valid']==true){
                $this->setRater($_SESSION['username']);
                $this->setRatee($response['data']['serviceprovider']);
                $this->setProjectId($response['data']['projectid']);
                $this->setScore($response['data']['score']);
                $this->setComment($response['data']['comment']);
                
    
                //The variables below are arguments to be passed to insert data to their respective table 
                $rateTb = array(
                    'rater' => "'".$this->getRater()."'",
                    'ratee' => "'".$this->getRatee()."'",
                    'project_id' => "'".$this->getProjectId()."'",
                    'score' => $this->getScore(),
                    'comment' => "'".$this->getComment()."'",
                    'date' => "UTC_TIMESTAMP"
                );

                $this->insert('rate',$rateTb);
                return array('valid'=>1);
            } 
            else{
                return $response;
            }      
        }

    }
?>