<?php

    class Policy extends Model{
        
        private $policyId;
        private $name;
        private $file;


        // --------Getter and Setters of the attributes-----------
        public function getPolicyId(){
            return $this->policyId; 
        }

        public function setPolicyId($policyId){
            $this->policyId = $policyId;
        }

        public function getName(){
            return $this->name; 
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getFile(){
            return $this->file; 
        }

        public function setFile($file){
            $this->file = $file;
        }

    }
?>