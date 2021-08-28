<?php

    class Rate extends Model{
        
        private $rateId;
        private $rater;
        private $ratee;
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
                $stmt = $conn->query("select * from rate where ratee='".$username."'");
                if($rate = $stmt->fetch(PDO::FETCH_ASSOC)){
                    return $rate;
                }
                else{
                    return false;
                }
            }
        }

    }
?>