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

        
    }
?>