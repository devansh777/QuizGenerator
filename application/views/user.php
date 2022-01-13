<?php include "head.php"?>

<body class="">

  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
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
          <li class="nav-item active ">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Mcq_controller/users">
              <i class="material-icons">person</i>
              <p><b>add questions</b></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Mcq_controller/createtest">
              <i class="material-icons">content_paste</i>
              <p><b>GENERATE TEST</b></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Mcq_controller/importmcq">
              <i class="material-icons">library_books</i>
              <p><b>IMPORT MCQS</b></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Mcq_controller/alltest">
              <i class="material-icons">bubble_chart</i>
              <p><B>All TESTS</B></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Mcq_controller/addSub">
              <i class="material-icons">content_paste</i>
              <p><B>ADD SUBJECT</B></p>
            </a>
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
          <!--</li>
          <li class="nav-item ">
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
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New Questions</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <form action="<?php echo base_url();?>index.php/Mcq_controller/addmcq" method="POST">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Question:</label>
                          <input type="text" class="form-control" name="txtQuestion">
                        </div>
                      </div>
                      </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Option A:</label>
                          <input type="text" name="txtOptionA" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Option B:</label>
                          <input type="text" name="txtOptionB" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Option C:</label>
                          <input type="text" name="txtOptionC" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Option D:</label>
                          <input type="text" name="txtOptionD" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12"><br></div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Answer :</label>
                          <select class="form-control" name="txtAnswer">
                             <option value="">Select Answer</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                          </select>
                          <!-- <input type="text" name="txtAnswer" class="form-control"> -->
                        </div>
                      </div>
                    
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Select Subject :</label>
                            <!-- <select name="txtsubject" id="txtsubject" class="form-control">
                            <?php foreach($result as $row){
                                echo"<option value='$row->subId'> $row->sub_name</option>";}
                              ?>
                            </select>  -->

                              <select name="country" id="country" class="form-control input-lg">
                              <option value="">Select Subject</option>
                              <?php
                              foreach($result as $row)
                              {
                               echo '<option value="'.$row->subId.'">'.$row->sub_name.'</option>';
                              }
                              ?>
                             </select> 
                        </div>
                      </div>
                       <div class="col-md-4">
                      <div class="form-group">
                            <label class="bmd-label-floating"> Select Unit :</label>
                       <!--  <select name="txtunit" id="txtunit" class="form-control">
                          <option value="">Select Unit</option>
                        </select> -->
                        <select name="state" id="state" class="form-control input-lg">
                        <option value="">Select Unit</option>
                       </select>


                      </div>
                    </div>
                  </div>
                </div>
                  <button type="submit" name="btnSubmit" class="btn btn-primary pull-right">Add Question</button> 
                  </form>
                </div>
              </div>
            </div>
          </div>
     <?php include 'footer.php'?>

<script>
  $(document).ready(function(){
    $('#country').change(function(){
      var country_id = $('#country').val();
      if(country_id != '')
        {$.ajax({
          url:"<?php echo base_url();?>index.php/Mcq_controller/fetch_unit",
          method:"POST",
          data:{country_id:country_id},
          success:function(data)
          {
            $('#state').html(data);
          }
        });
      }
    });
  });
</script>
