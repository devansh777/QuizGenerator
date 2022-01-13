<?php include "head.php"?>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          MCQ System
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Mcq_controller/home">
              <i class="material-icons">dashboard</i>
              <p><B>DASHBOARD</B></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Mcq_controller/users">
              <i class="material-icons">person</i>
              <p><B>ADD QUESTIONS</B></p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Mcq_controller/createtest">
              <i class="material-icons">content_paste</i>
              <p><b>GENERATE TEST</b></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Mcq_controller/importmcq">
              <i class="material-icons">library_books</i>
              <p><B>IMPORT MCQS</B></p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Mcq_controller/alltest">
              <i class="material-icons">bubble_chart</i>
              <p><B>ALL TESTS</B></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Mcq_controller/addSub">
              <i class="material-icons">content_paste</i>
              <p><B>ADD SUBJECT</B></p>
            </a>
          </li>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Mcq_controller/mcqlist">
              <i class="material-icons">content_paste</i>
              <p><B>MCQ CATALOGUE</B></p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Mcq_controller/addunit">
              <i class="material-icons">content_paste</i>
              <p><B>UNIT</B></p>
            </a>
          </li>
          <!--<li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./rtl.html">
              <i class="material-icons">language</i>
              <p>RTL Support</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="./upgrade.html">
              <i class="material-icons">unarchive</i>
              <p>Upgrade to PRO</p>
            </a>
          </li> -->
        </ul>
      </div>
    </div>
   <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
         
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
               <!--  <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i> -->
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
           <ul class="navbar-nav">
              <!-- <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>  -->
              <li class="nav-item dropdown">
                
                
              
               
              </li>
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div name="drp" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <!-- <div class="dropdown-divider"></div> -->
                  <a class="dropdown-item" href="<?php echo base_url();?>index.php/Mcq_controller/logout">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->


       <div class="content">
        <div class="container-fluid">
     <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Tests</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <form>
                    <?php $no=1;
                      if(!empty($result)){?>
                    <table class="table">
                    <thead class=" text-primary">
                        <th>
                          Sr
                        </th>
                        <th>
                          Test Name
                        </th>
                        <th>
                          Add New Mcqs
                        </th>
                        <th>
                          View Test Mcqs
                        </th>
                        <th>
                          Merge Test
                        </th>
                      </thead>
                      <?php foreach ($result as $row) 
                      { echo "
                        <tbody>
                          <tr>
                            <td>
                              $no
                            </td>
                            <td>
                              $row->test_name
                            </td>"; $no++;?>
                          <td>
                            <a href="<?php echo base_url(); ?>index.php/Mcq_controller/alltestmcqs/<?php echo $row->test_id;?>">Add MCQs</a>
                          </td>
                          <td>
                           <a href="<?php echo base_url(); ?>index.php/Mcq_controller/showmcqs/<?php echo $row->test_id;?>">View</a>
                          </td>
                          <td>
                             <a href="<?php echo base_url(); ?>index.php/Mcq_controller/mrgtst/<?php echo $row->test_id;?>"> Add </a>
                          </td>
                        </tr><?php }} ?>
                      </tbody>
                    </table>
                    </form>
                  </div>
                </div>
              </div>
            </div> 
     <?php include 'footer.php'?>
