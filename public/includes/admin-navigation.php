<?php
   require_once('../app/controllers/admin.php');
   $adminController = new Controller\Admin();
   $adminDetail = $adminController->getUserDetails($_SESSION['username']);
   $base = "http://localhost/seralance/";
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="local freelance system">
  <meta name="author" content="seralance develpers">
  <link href="http://localhost/seralance/app/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="http://localhost/seralance/app/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="http://localhost/seralance/public/assets/css/administrator/seralance-admin.min.css" rel="stylesheet">
  <link href="http://localhost/seralance/public/assets/css/administrator/seralance-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://localhost/seralance/app/vendor/datatables/dataTables.bootstrap4.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://code.highcharts.com/highcharts.js"></script>


</head>

<body id="page-top">
  <div id="wrapper" >
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar" style="color:black !important;;">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="<?php echo $base;?>public/assets/images/seralance-logo.png" id="logo">
        </div>
        <div class="sidebar-brand-text mx-3"></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/seralance/public/admin/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span style="font-weight: bolder;">Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-2x fa-users"></i>
          <span>Users</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           
            <a class="collapse-item" href="http://localhost/seralance/public/admin/adminusers">Admin Users</a>
            <a class="collapse-item" href="http://localhost/seralance/public/admin/serviceproviders">Service providers</a>
            <a class="collapse-item" href="http://localhost/seralance/public/admin/serviceseekers">Service seekers</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fa fa-tasks"></i>
          <span>Projects</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="http://localhost/seralance/public/admin/completedprojects">Completed projects</a>
            <a class="collapse-item" href="http://localhost/seralance/public/admin/ongoingprojects">Ongoing Projects</a>
            <a class="collapse-item" href="http://localhost/seralance/public/admin/announcedprojects">Announced  Projects</a>
            <a class="collapse-item" href="http://localhost/seralance/public/admin/offeredprojects">Offered Projects</a>
            <a class="collapse-item" href="http://localhost/seralance/public/admin/terminatedprojects">Terminated Projects</a>
            <a class="collapse-item" href="http://localhost/seralance/public/admin/bids">Bids</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fa fa-credit-card"></i>
          <span>Transactions</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
            <a class="collapse-item" href="transaction_history.php">Transaction history</a>
            <a class="collapse-item" href="transfered_funds.php">Transferred funds</a>
            <a class="collapse-item" href="fund_transfer_request.php">Fund Transfer requests</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="notification.php">
          <i class="fa fa-bell"></i>
          <span>Notification</span>
        </a>
      </li>
      <!-- dispute -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedispute" aria-expanded="true"
          aria-controls="collapseTable">
           <i class="far fa-thumbs-down"></i>
          <span>Disputes</span>
        </a>
        <div id="collapsedispute" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
            <a class="collapse-item" href="http://localhost/seralance/public/admin/opendisputes">Open Disputes</a>
            <a class="collapse-item" href="http://localhost/seralance/public/admin/closeddisputes">Closed Dsputes</a>
          </div>
        </div>
      </li>
      <!--  -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTicket" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fa fa-ticket" aria-hidden="true"></i>
          <span>Ticket</span>
        </a>
        <div id="collapseTicket" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
            <a class="collapse-item" href="http://localhost/seralance/public/admin/opentickets">Open Ticket</a>
            <a class="collapse-item" href="http://localhost/seralance/public/admin/closedtickets">Closed Ticket</a>
          </div>
        </div>
      </li>
<!--  -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepolicy" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fa fa-ticket" aria-hidden="true"></i>
          <span>Policy</span>
        </a>
        <div id="collapsepolicy" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
            <a class="collapse-item" href="view_policy.php">View policy</a>
            <a class="collapse-item" href="edit_policy.php">Edit policy</a>
          </div>
        </div>
      </li>
      <!--  -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefaq" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fa fa-question-circle" aria-hidden="true"></i>
          <span>FAQS</span>
        </a>
        <div id="collapsefaq" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
            <a class="collapse-item" href="view_faqs.php">View FAQS</a>
            <a class="collapse-item" href="edit_faqs.php">Edit FAQS</a>
          </div>
        </div>
      </li>
   
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/seralance/public/admin/profile">
        <i class="fa fa-user-circle" aria-hidden="true"></i>
          <span>profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0);"  
        data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>
  
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">  
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?php echo $base;?>public/assets/images/administrator/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $adminDetail['firstname']." ".$adminDetail['lastname']?></span>  <i class = "fas fa-2x fa-angle-down " 
                ></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="setting.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="activity_logs.php">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="javascript:void(0);"
                 data-toggle="modal" data-target="#changepasswordmodal">
                  <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                  change password
                </a>
                <a class="dropdown-item" href="javascript:void(0);"
                 data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
     
      
          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="http://localhost/seralance/public/admin/logout" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>
          <!--  -->
<!-- password change modal -->

   <div class="modal fade" id="changepasswordmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header text-center">
               <h5 class="modal-title" id="exampleModalLabel ">Change password</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" style="color: red;">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="col-sm-6 mx-auto">
                  <div class="form-group">
                     <input type="password" class="form-control" placeholder="old password">
                  </div>
                  <div class="form-group">
                     <input type="password" class="form-control" placeholder="new password">
                  </div>
                  <div class="form-group">
                     <input type="password" class="form-control" placeholder="confirm new password">
                  </div>
               </div>
               <div class="form-group text-center">
                  <button class="btn btn-primary btn-sm">
                     <i class="fa fa-check-circle"></i>save</button>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>

<!--  -->
        <!-- navigation ends -->


        


        