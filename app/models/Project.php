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
        private $status; //Pending, Pending Deposit, {Ongoing,Submitted}, Terminated, Completed, Cancelled
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

        public function retrieveSkills($projectId){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("select skill_id,skill_name from skill WHERE skill_id in (SELECT project_skill.skill_id FROM project INNER JOIN project_skill ON project.project_id = project_skill.project_id where project.project_id='".$projectId."')");
                if($skills = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $skills;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveProjectDetails($projectId){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){

                $sql = "SELECT * FROM project where project_id='".$projectId."'";
                
                $stmt = $conn->query($sql);
                if($project = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $project = array_merge($project, array('skill'=>$this->retrieveSkills($project['project_id'])));
                    return $project;
                }
                else{
                    return false;
                }
            }
        }

        public function generateFilterQuery($input){

            if(isset($input['filter_btn'])){
                
                
                if(empty($input['title']) && empty($input['category']) && empty($input['minbudget']) && empty($input['maxbudget'])){
                    return "SELECT * FROM project WHERE offer_type='Announcement' and status='Pending' and assigned_to IS NULL AND project_id NOT IN (select project_id FROM bid WHERE made_by = '".$_SESSION['username']."' ) ORDER BY announced_date DESC";
                }

                

                $query="SELECT * FROM project WHERE offer_type='Announcement' and status='Pending' and assigned_to IS NULL AND project_id NOT IN (select project_id FROM bid WHERE made_by = '".$_SESSION['username']."' ) ";
                $condition="";

                if(!empty($input['title'])){
                    $cleanData = $this->cleanInput($input['title']);
                    $cleanData = strtolower($cleanData);
                    $condition = " AND LOWER(title) LIKE '%".$cleanData."%'";
                }

                if(!empty($input['category'])){
                    $cleanData = $this->cleanInput($input['category']);      

                    if($cleanData=='Graphics and Design' || $cleanData=='Writing and Translation' || $cleanData=='Video and Animation' || $cleanData=='Programming and Tech'){
                      $condition .= " AND category = '".$cleanData."'";                        
                    }
                }

                if(!empty($input['minbudget'])){
                    $cleanData = $this->cleanInput($input['minbudget']);
                    $condition .= " AND budget_min >= ".$cleanData;                    
                }

                if(!empty($input['maxbudget'])){
                    $cleanData = $this->cleanInput($input['maxbudget']);
                    $condition .= " AND budget_min <= ".$cleanData;                    
                }

                $condition .= " ORDER BY announced_date DESC";

                /* echo "<h1>Hi there I am testing the application</h1>";
                echo "<h1>Hi there I am testing the application</h1>";
                echo "<h1>Hi there I am testing the application</h1>";
                echo "<h1>Hi there I am testing the application</h1>";
                echo "<p>".$query." ".$condition."</p>";
                exit();  */

               return $query . $condition;
                
            }
        }

        public function retrieveProjects($filter=""){
            require_once('../app/Core/Database.php');
            $sql = "";
            if($filter==""){
                $sql = "SELECT * FROM project WHERE offer_type='Announcement' and status='Pending' and assigned_to IS NULL AND project_id NOT IN (select project_id FROM bid WHERE made_by = '".$_SESSION['username']."' ) ORDER BY announced_date DESC";
            }
            else{
                $sql =  $this->generateFilterQuery($filter);
            }

            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query($sql);
                if($projects = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    require_once('../app/models/Bid.php');
                    $bid = new Bid();
                    foreach($projects as $project){
                        $key = array_search($project, $projects);
                        $projects[$key] = array_merge($projects[$key], array('skill'=>$this->retrieveSkills($project['project_id']))) ; 
                        $projects[$key] = array_merge($projects[$key], array('totalbids'=>$bid->totalBids($project['project_id'])['total_bids'])) ; 
                    }
                    return $projects;
                }
                else{
                    return false;
                }
            }
        }
        
        public function retrieveStatistics($username=""){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            $statistics = [];
            if($conn !== null){
                $sql = "";
                
                //Announced projects
                if($_SESSION['usertype']==='serviceseeker'){
                    $sql = "SELECT count(*) as announced_projects FROM project where (status='Pending' OR status='Pending Deposit') AND offer_type ='Announcement' and announced_by='" . $username . "'";
                }

                elseif($_SESSION['usertype']==='serviceprovider'){
                    $sql = "SELECT count(*) as announced_projects FROM project where (status='Cancelled' OR status='Pending Deposit') AND offer_type ='Announcement' and assigned_to='" . $username . "'";
                }

                elseif($_SESSION['usertype']==='admin'){
                    $sql = "SELECT count(*) as announced_projects FROM project where (status='Cancelled' OR status='Pending Deposit') AND offer_type ='Announcement'  ORDER BY announced_date DESC";
                }

                $stmt = $conn->query($sql);
                $statistics = array_merge($statistics,$stmt->fetch(PDO::FETCH_ASSOC));

                // Offered projects
                if($_SESSION['usertype']==='serviceseeker'){
                    $sql = "SELECT count(*) as offered_projects FROM project where offer_type ='Offer' AND (status='Pending' OR status='Pending Deposit' OR status='Cancelled') and announced_by='" . $username . "'";
                }
                
                elseif($_SESSION['usertype']==='serviceprovider'){
                    $sql = "SELECT count(*) as offered_projects FROM project where (status='Pending' OR status='Pending Deposit' OR status='Cancelled') AND offer_type ='Offer' and assigned_to='" . $username . "'";
                }

                elseif($_SESSION['usertype']==='admin'){
                    $sql = "SELECT count(*) as offered_projects FROM project where (status='Pending' OR status='Pending Deposit' OR status='Cancelled') AND offer_type ='Offer' ORDER BY announced_date DESC";
                }                

                $stmt = $conn->query($sql);
                $statistics = array_merge($statistics,$stmt->fetch(PDO::FETCH_ASSOC));

                //Ongoing projects
                if($_SESSION['usertype']==='serviceseeker'){
                    $sql = "SELECT count(*) as ongoing_projects FROM project where (status='Ongoing' OR status='Submitted') and announced_by='" . $username . "'";
                }
                
                elseif($_SESSION['usertype']==='serviceprovider'){
                    $sql = "SELECT count(*) as ongoing_projects FROM project where (status='Ongoing' OR status='Submitted') and assigned_to='" . $username . "'";
                }

                elseif($_SESSION['usertype']==='admin'){
                    $sql = "SELECT count(*) as ongoing_projects FROM project where (status='Ongoing' OR status='Submitted')";
                }                

                $stmt = $conn->query($sql);
                $statistics = array_merge($statistics,$stmt->fetch(PDO::FETCH_ASSOC));

                //Terminated projects
                if($_SESSION['usertype']==='serviceseeker'){
                    $sql = "SELECT count(*) as terminated_projects FROM project where status='Terminated' and announced_by='" . $username . "'";
                }
                
                elseif($_SESSION['usertype']==='serviceprovider'){
                    $sql = "SELECT count(*) as terminated_projects FROM project where status='Terminated' and assigned_to='" . $username . "'";
                }

                elseif($_SESSION['usertype']==='admin'){
                    $sql = "SELECT count(*) as terminated_projects FROM project where status='Terminated'";
                }                

                $stmt = $conn->query($sql);
                $statistics = array_merge($statistics,$stmt->fetch(PDO::FETCH_ASSOC));

                //Completed projects
                if($_SESSION['usertype']==='serviceseeker'){
                    $sql = "SELECT count(*) as completed_projects FROM project where status='Completed' and announced_by='" . $username . "'";
                }
                
                elseif($_SESSION['usertype']==='serviceprovider'){
                    $sql = "SELECT count(*) as completed_projects FROM project where status='Completed' and assigned_to='" . $username . "'";
                }

                elseif($_SESSION['usertype']==='admin'){
                    $sql = "SELECT count(*) as completed_projects FROM project where status='Completed'";
                }                

                $stmt = $conn->query($sql);
                $statistics = array_merge($statistics,$stmt->fetch(PDO::FETCH_ASSOC));

                return $statistics;
                
            }
        }

        public function retrieveAllAnnouncedProjects($username=""){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                
                if($_SESSION['usertype']==='serviceseeker'){
                    $sql = "SELECT * FROM project where (status='Pending' OR status='Pending Deposit') AND offer_type ='Announcement' and announced_by='" . $username . "' ORDER BY announced_date DESC";
                }

                elseif($_SESSION['usertype']==='serviceprovider'){
                    $sql = "SELECT * FROM project where (status='Cancelled' OR status='Pending Deposit') AND offer_type ='Announcement' and assigned_to='" . $username . "' ORDER BY announced_date DESC";
                }

                elseif($_SESSION['usertype']==='admin'){
                    $sql = "SELECT * FROM project where (status='Pending' OR status='Cancelled' OR status='Pending Deposit') AND offer_type ='Announcement'  ORDER BY announced_date DESC";
                }

                $stmt = $conn->query($sql);
                if($announcedProjects = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $announcedProjects;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveAllOfferedProjects($username=""){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                
                if($_SESSION['usertype']==='serviceseeker'){
                    $sql = "SELECT * FROM project where offer_type ='Offer' AND (status='Pending' OR status='Pending Deposit' OR status='Cancelled') and announced_by='" . $username . "' ORDER BY announced_date DESC";
                }
                
                elseif($_SESSION['usertype']==='serviceprovider'){
                    $sql = "SELECT * FROM project where (status='Pending' OR status='Pending Deposit' OR status='Cancelled') AND offer_type ='Offer' and assigned_to='" . $username . "' ORDER BY announced_date DESC";
                }

                elseif($_SESSION['usertype']==='admin'){
                    $sql = "SELECT * FROM project where (status='Pending' OR status='Pending Deposit' OR status='Cancelled') AND offer_type ='Offer' ORDER BY announced_date DESC";
                }                

                $stmt = $conn->query($sql);
                if($offeredProjects = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $offeredProjects;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveAllOngoingProjects($username=""){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                
                if($_SESSION['usertype']==='serviceseeker'){
                    $sql = "SELECT * FROM project where (status='Ongoing' OR status='Submitted') and announced_by='" . $username . "' ORDER BY start_date DESC";
                }
                
                elseif($_SESSION['usertype']==='serviceprovider'){
                    $sql = "SELECT * FROM project where (status='Ongoing' OR status='Submitted') and assigned_to='" . $username . "' ORDER BY start_date DESC";
                }

                elseif($_SESSION['usertype']==='admin'){
                    $sql = "SELECT * FROM project where (status='Ongoing' OR status='Submitted') ORDER BY start_date DESC";
                }                

                $stmt = $conn->query($sql);
                if($ongoingProjects = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $ongoingProjects;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveAllTerminatedProjects($username=""){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                
                if($_SESSION['usertype']==='serviceseeker'){
                    $sql = "SELECT * FROM project where status='Terminated' and announced_by='" . $username . "' ORDER BY end_date DESC";
                }
                
                elseif($_SESSION['usertype']==='serviceprovider'){
                    $sql = "SELECT * FROM project where status='Terminated' and assigned_to='" . $username . "' ORDER BY end_date DESC";
                }

                elseif($_SESSION['usertype']==='admin'){
                    $sql = "SELECT * FROM project where status='Terminated' ORDER BY end_date DESC";
                }                

                $stmt = $conn->query($sql);
                if($terminatedProjects = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $terminatedProjects;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveAllCompletedProjects($username=""){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                
                if($_SESSION['usertype']==='serviceseeker'){
                    $sql = "SELECT * FROM project where status='Completed' and announced_by='" . $username . "' ORDER BY end_date DESC";
                }
                
                elseif($_SESSION['usertype']==='serviceprovider'){
                    $sql = "SELECT * FROM project where status='Completed' and assigned_to='" . $username . "' ORDER BY end_date DESC";
                }

                elseif($_SESSION['usertype']==='admin'){
                    $sql = "SELECT * FROM project where status='Completed' ORDER BY end_date DESC";
                }                

                $stmt = $conn->query($sql);
                if($completedProjects = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $completedProjects;
                }
                else{
                    return false;
                }
            }
        }


        public function retrieveOngoingPrice($username){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){

                $sql = "SELECT sum(price) as totalprice FROM project where (status='Ongoing' OR status='Submitted') and announced_by='" . $username . "'";
                $stmt = $conn->query($sql);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }

        public function updateStatus($projectId,$status){                
            $data = array('status'=>"'".$status."'");
            $condition = "";
            if($_SESSION['usertype']=='serviceseeker'){
                $condition= "WHERE project_id ='". $projectId ."' and project_id IN (select project_id from project where announced_by = '".$_SESSION['username']."')" ;
                
                if($status == "Ongoing"){
                    $projectDetails = $this->retrieveProjectDetails($projectId);
                    require_once('../app/Models/Notification.php');
                    $notification = new Notification();
                    $notification->autoNotify(
                                                "Start project",
                                                "Please start working on project ".$projectId. ".",
                                                $projectDetails['assigned_to'],
                                                "serviceprovider/ongoingprojects"
                                            );
                }
                
            } 
            elseif($_SESSION['usertype']=='admin'){
                $condition= "WHERE project_id ='". $projectId ."'" ;
                
            }       

            if($this->update('project',$data,$condition)){
                return 1;
            }             
            
            return 0;
        }

        public function endProject($projectId,$status){                
            $data = array('end_date'=>"UTC_TIMESTAMP");
            $condition= "" ;
            
            if($_SESSION['usertype']=='serviceseeker'){
                $condition= "WHERE project_id ='". $projectId ."' and project_id IN (select project_id from project where announced_by = '".$_SESSION['username']."')" ;
  
            } 
            elseif($_SESSION['usertype']=='admin'){
                $condition= "WHERE project_id ='". $projectId ."'" ;
                
            } 
            
            $this->updateStatus($projectId,$status);

            if($this->update('project',$data,$condition)){
                
                $projectDetails = $this->retrieveProjectDetails($projectId);
                require_once('../app/Models/Notification.php');
                $notification = new Notification();

                if($status=='Completed'){
                    $notification->autoNotify(
                        "Project completed",
                        "Project ".$projectId. " has been completed.",
                        $projectDetails['assigned_to'],
                        "serviceprovider/completedprojects"
                    );
                }

                elseif($status=='Terminated'){

                    $notification->autoNotify(
                        "Project terminated",
                        "Project ".$projectId. " has been terminated.",
                        $projectDetails['assigned_to'],
                        "serviceprovider/terminatedprojects"
                    );

                    $notification->autoNotify(
                        "Project terminated",
                        "Project ".$projectId. " has been terminated.",
                        $projectDetails['announced_by'],
                        "serviceseeker/terminatedprojects"
                    );
                }
                
                
                return 1;
            }             
            
            return 0;
        }


        public function deleteProject($projectId){                
            $data = array('status'=>'\'Cancelled\'');            
            $condition= "WHERE project_id ='". $projectId ."' and project_id IN (select project_id from project where announced_by = '".$_SESSION['username']."')" ;
            if($this->update('project',$data,$condition)){
                return 1;
            }             
            
            return 0;
        }

        public function rejectProject($projectId){                
            $data = array('status'=>'\'Cancelled\'');             
            $condition= "WHERE project_id ='". $projectId ."' and project_id IN (select project_id from project where assigned_to = '".$_SESSION['username']."')" ;
            if($this->update('project',$data,$condition)){
                $projectDetails = $this->retrieveProjectDetails($projectId);
                require_once('../app/Models/Notification.php');
                $notification = new Notification();
                $notification->autoNotify(
                                            "Project offer rejected",
                                            "Offered project ".$projectId. " has been rejected.",
                                            $projectDetails['announced_by'],
                                            "serviceseeker/offeredprojects"
                                        );
                return 1;
            }             
            
            return 0;
        }

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

                //To send notification to service provider if project type is offer instead of announcement
                if(!empty($response['data']['assignto'])){
                    require_once('../app/Models/Notification.php');
                    $notification = new Notification();
                    $notification->autoNotify(
                                                "New project offer",
                                                "A project has been offered by ".$_SESSION['username'].".",
                                                $this->cleanInput($response['data']['assignto']),
                                                "serviceprovider/offeredprojects"
                                            );
                }

                return array('valid'=>1);
            } 
            else{
                return $response;
            }      
        }

        public function validateAcceptOffer($input){
            
            // $acceptOfferData holds the data to be inserted to Service provider table
            $acceptOfferData = array();
            $error=array();


            if(empty($input['price'])){
                $error = array_merge($error,array('accept' => 'This field is required.'));
            }
            else{
                $acceptOfferData = array_merge($acceptOfferData,array('price' => $this->cleanInput($input['price'])));
            }

            $acceptOfferData = array_merge($acceptOfferData,array('projectid' => $this->cleanInput($input['projectid'])));


            if(empty($error)){
                return array('valid'=>1 ,'data'=>$acceptOfferData);
            }
            else{
                return array('valid'=>0,'data'=>$acceptOfferData,'error'=>$error);
            }
        }

        public function acceptOffer($data){
            $response = $this->validateAcceptOffer($data);
            if($response['valid']==true){
                $this->setProjectId($response['data']['projectid']);
                $this->setPrice($response['data']['price']);
                $this->setStartDate("UTC_TIMESTAMP");
                $this->setStatus('Pending Deposit');

                //The variables below are arguments to be passed to insert data to their respective table 

                $projectTb = array(
                    'price' => $this->getPrice(),
                    'start_date' => $this->getStartDate(),
                    'status' => "'".$this->getStatus()."'"
                );

                $condition = "WHERE project_id = '".$this->getProjectId()."'";              
                if($this->update('project',$projectTb,$condition)){

                    $projectDetails = $this->retrieveProjectDetails($this->getProjectId());
                    require_once('../app/Models/Notification.php');
                    $notification = new Notification();
                    $notification->autoNotify(
                                                "Project offer accepted",
                                                "Offered project ".$this->getProjectId(). " has been accepted.",
                                                $projectDetails['announced_by'],
                                                "serviceseeker/offeredprojects"
                                            );
                    return array('valid'=>1);
                }                
            } 
            else{
                return $response;
            }      
        }

        public function validateDeliverProject($input,$files){
           
            $deliverProjectData = array();
            $error=array();


            if(!empty($files['deliveredfile']['name'])){         
                $extension = explode('.',$files['deliveredfile']['name']);
                $file_ext=strtolower(end($extension));

                $cleanData = 'app/upload/projects/delivered/'.time().$files['deliveredfile']['name'];
                move_uploaded_file($files['deliveredfile']['tmp_name'],"../".$cleanData);
                $deliverProjectData = array_merge($deliverProjectData,array('deliveredfile' => $cleanData));
                
            

                $deliverProjectData = array_merge($deliverProjectData,array('projectid' => $this->cleanInput($input['projectid'])));

            
                return array('valid'=>1 ,'data'=>$deliverProjectData);
             }
            
        }

        public function deliverProject($data,$files){
            $response = $this->validateDeliverProject($data,$files);
            if($response['valid']==true){
                $this->setProjectId($response['data']['projectid']);
                $this->setDeliveredFile($response['data']['deliveredfile']);
                $this->setStatus('Submitted');

                //The variables below are arguments to be passed to insert data to their respective table 

                $projectTb = array(
                    'delivered_file' => "'".$this->getDeliveredFile()."'",
                    'status' => "'".$this->getStatus()."'"
                );
                
                $condition = "WHERE project_id = '".$this->getProjectId()."'";              
                if($this->update('project',$projectTb,$condition)){

                    $projectDetails = $this->retrieveProjectDetails($this->getProjectId());
                    require_once('../app/Models/Notification.php');
                    $notification = new Notification();
                    $notification->autoNotify(
                            "Project submitted",
                            "Project ".$this->getProjectId(). " has been submitted.",
                            $projectDetails['announced_by'],
                            "serviceseeker/ongoingprojects"
                        );
                    return array('valid'=>1);
                }                
            } 
            else{
                return $response;
            }      
        }

        public function approveBid($projectId,$price,$serviceprovider){
                $this->setProjectId($projectId);
                $this->setPrice($price);
                $this->setStartDate("UTC_TIMESTAMP");
                $this->setStatus('Pending Deposit');

                //The variables below are arguments to be passed to insert data to their respective table 

                $projectTb = array(
                    'price' => $this->getPrice(),
                    'start_date' => $this->getStartDate(),
                    'assigned_to' => "'".$serviceprovider."'",
                    'status' => "'".$this->getStatus()."'"
                );

                $condition = "WHERE project_id = '".$this->getProjectId()."'";              
                $this->update('project',$projectTb,$condition);             
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