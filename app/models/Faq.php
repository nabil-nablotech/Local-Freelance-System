<?php

    class Faq extends Model{
        
        private $faqId;
        private $question;
        private $answer;
        private $category;


        // --------Getter and Setters of the attributes-----------
        public function getFaqId(){
            return $this->faqId; 
        }

        public function setFaqId($faqId){
            $this->faqId = $faqId;
        }

        public function getQuestion(){
            return $this->question; 
        }

        public function setQuestion($question){
            $this->question = $question;
        }

        public function getAnswer(){
            return $this->answer; 
        }

        public function setAnswer($answer){
            $this->answer = $answer;
        }

        public function getCategory(){
            return $this->category; 
        }

        public function setCategory($category){
            $this->category = $category;
        }

    }
?>