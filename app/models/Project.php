<?php

    class Project extends Model{
        
        private $projectId;
        private $announcedDate;
        private $title;
        private $description;
        private $category;
        private $skillRequired;
        private $fileAttachment;
        private $deliveredFile;
        private $budget;
        private $price;
        private $offerType;
        private $status; //Pending, Pending Deposit, Ongoing, Terminated, Completed
        private $startDate;
        private $endDate;


        // --------Getter and Setters of the attributes-----------
        public function getProjectId(){
            return $this->projectId; 
        }

        public function setProjectId($projectId){
            $this->projectId = $projectId;
        }

        public function getAnnouncedDate(){
            return $this->announcedDate; 
        }

        public function setAnnouncedDate($announcedDate){
            $this->announcedDate = $announcedDate;
        }

        public function getTitle(){
            return $this->title; 
        }

        public function setTitle($title){
            $this->title = $title;
        }

        public function getDescription(){
            return $this->description; 
        }

        public function setDescription($description){
            $this->description = $description;
        }

        public function getCategory(){
            return $this->category; 
        }

        public function setCategory($category){
            $this->category = $category;
        }

        public function getSkillRequired(){
            return $this->skillRequired; 
        }

        public function setSkillRequired($skillRequired){
            $this->skillRequired = $skillRequired;
        }

        public function getFileAttachment(){
            return $this->fileAttachment; 
        }

        public function setFileAttachment($fileAttachment){
            $this->fileAttachment = $fileAttachment;
        }

        public function getDeliveredFile(){
            return $this->deliveredFile; 
        }

        public function setDeliveredFile($deliveredFile){
            $this->deliveredFile = $deliveredFile;
        }

        public function getBudget(){
            return $this->budget; 
        }

        public function setBudget($budget){
            $this->budget = $budget;
        }

        public function getPrice(){
            return $this->price; 
        }

        public function setPrice($price){
            $this->price = $price;
        }

        public function getOfferType(){
            return $this->offerType; 
        }

        public function setOfferType($offerType){
            $this->offerType = $offerType;
        }

        public function getStatus(){
            return $this->status; 
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function getStartDate(){
            return $this->startDate; 
        }

        public function setStartDate($startDate){
            $this->startDate = $startDate;
        }

        public function getEndDate(){
            return $this->endDate; 
        }

        public function setEndDate($endDate){
            $this->endDate = $endDate;
        }

        //------------End of getters and setters --------//

        public function validateProjectAnnouncment($input,$files){
            
            // $projectData holds the data to be inserted to Service provider table
            $projectData = array();
            $skillData = array();
            $error=array();


            if(empty($input['title'])){
                $error = array_merge($error,array('title' => 'This field is required.'));
            }
            else{
                $projectData = array_merge($projectData,array('title' => $this->cleanInput($input['title'])));
            }

            if(empty($input['category'])){
                $error = array_merge($error,array('category' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['category']);               
                if($cleanData!=='Graphics and Design' && $cleanData!=='Writing and Translation' && $cleanData!=='Video and Animation' && $cleanData!=='Programming and Tech'){
                    $error = array_merge($error,array('category' => 'This field is required.'));
                }
                else{
                    $projectData = array_merge($projectData,array('category' => $cleanData));
                }
                
            }

            if(empty($input['description'])){
                $error = array_merge($error,array('description' => 'This field is required.'));
            }
            else{
                $projectData = array_merge($projectData,array('description' => $this->cleanInput($input['description'])));
            }

            if(!empty($files['projectfile']['name'])){         
                $extension = explode('.',$files['projectfile']['name']);
                $file_ext=strtolower(end($extension));
                if(!in_array($file_ext,array('jpeg','gif','png','jpg','zip', 'pdf'))){
                    $error = array_merge($error,array('projectfile' => 'JPG, JPEG, PNG, GIF, ZIP and PDF are only supported.'));
                }
                elseif($files['projectfile']['size']>2097152){
                    $error = array_merge($error,array('projectfile' => 'File should not be more than 2MB.'));
                }
                elseif(empty($error)){
                    $cleanData = 'app/upload/projects/announcements/'.time().$files['projectfile']['name'];
                    move_uploaded_file($files['projectfile']['tmp_name'],"../".$cleanData);
                    $projectData = array_merge($projectData,array('projectfile' => $cleanData));
                }
            }

            if(empty($input['skill'])){
                $error = array_merge($error,array('skill' => 'This field is required.'));
            }
            else{
                $skill_ids = [];
                require_once('../app/models/ServiceSeeker.php');
                $seeker = new ServiceSeeker();
                foreach($seeker->retrieveAllSkills() as $skill){
                    array_push($skill_ids,$skill['skill_id']);
                }
                for($i = 0; $i < count($input['skill']);$i++){
                    $cleanData = $this->cleanInput($input['skill'][$i]);
                    if(in_array($cleanData,$skill_ids) == false){
                        echo '<script>window.alert(breaking)</script>';
                        $error = array_merge($error,array('skill' => 'Invalid Input.'));
                        break;
                    }
                    $skillData = array_merge($skillData,array($cleanData));                               
                }
                if(empty($error)){
                    $projectData = array_merge($projectData,array('skill' => $skillData));  
                }                
            }

            if(empty($input['minbudget']) || empty($input['maxbudget'])){
                $error = array_merge($error,array('minmax' => 'Both fields are required.'));
            }
            else{
                $minCleanData = $this->cleanInput($input['minbudget']);
                $minCleanData = (float)$minCleanData;
                $maxCleanData = $this->cleanInput($input['maxbudget']);
                $maxCleanData = (float)$maxCleanData;
                if($minCleanData > $maxCleanData){
                    $error = array_merge($error,array('minmax' => 'Whoops!! Minimum budget should be greater than maximum.'));
                }
                
                $projectData = array_merge($projectData,array('minbudget' => $minCleanData));
                $projectData = array_merge($projectData,array('maxbudget' => $maxCleanData));
             
            }

            $projectData = array_merge($projectData,array('offertype' => $this->cleanInput($input['offertype'])));
            if(!empty($input['assignto'])){
                $projectData = array_merge($projectData,array('assignto' => $this->cleanInput($input['assignto'])));
            }


            if(empty($error)){
                return array('valid'=>1 ,'data'=>$projectData);
            }
            else{
                return array('valid'=>0,'data'=>$projectData,'error'=>$error);
            }
        }

        public function createProject($data, $files){
            $response = $this->validateProjectAnnouncment($data, $files);
            if($response['valid']==true){
                $this->setTitle($response['data']['title']);
                $this->setDescription($response['data']['description']);
                $this->setCategory($response['data']['category']);
                $this->setSkillRequired($response['data']['skill']);
                if(!empty($response['data']['projectfile'])){
                    $this->setFileAttachment($response['data']['projectfile']);
                }                
                $this->setBudget(array('min'=>$response['data']['minbudget'],'max'=>$response['data']['maxbudget']));
                $this->setOfferType($response['data']['offertype']);
                $this->setStatus('Pending');

                //The variables below are arguments to be passed to insert data to their respective table 
                $projectTb = array(
                    'announced_date' => "UTC_TIMESTAMP",
                    'title' => "'".$this->getTitle()."'",
                    'category' => "'".$this->getCategory()."'",
                    'description' => "'".$this->getDescription()."'",
                    'budget_min' => $this->getBudget()['min'],
                    'budget_max' => $this->getBudget()['max'],
                    'offer_type' => "'".$this->getOfferType()."'",
                    'status' => "'".$this->getStatus()."'",
                    'announced_by' => "'".$_SESSION['username']."'"
                );

                if(!empty($this->getFileAttachment())){
                    $projectTb = array_merge($projectTb,array('file' => "'".$this->getFileAttachment()."'"));
                } 
                if(!empty($response['data']['assignto'])){
                    $projectTb = array_merge($projectTb,array('assigned_to' => "'".$this->cleanInput($response['data']['assignto'])."'"));
                } 

                $this->insert('project',$projectTb);
                $this->setProjectId($this->getLatestInserted());
                
                $projectSkillTb = [];                
                foreach($this->getSkillRequired() as $skill){
                    array_push($projectSkillTb,array('project_id' => $this->getProjectId(),'skill_id' => $skill));                
                }

                foreach($projectSkillTb as $skill){
                    $this->insert('project_skill',$skill);
                }

                return array('valid'=>1);
            } 
            else{
                return $response;
            }      
        }

        public function getLatestInserted(){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("SELECT MAX(project_id) AS recent from project");
                if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    return $row['recent'];
                }
                else{
                    return false;
                }
            }
        }
    }
?>