
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HMS</title>
   <?= $this->Html->meta('woddi_logo.PNG') ?>
  <!-- Tell the browser to be responsive to screen width -->   
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <!--link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css"-->
   <?= $this->Html->css('bootstrap/dist/css/bootstrap.min') ?>
  <!-- Font Awesome -->
  <!--link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css"-->
  <?= $this->Html->css('font-awesome/css/font-awesome.min') ?>
  <!-- Ionicons -->
  <!--link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css"-->
  <?= $this->Html->css('Ionicons/css/ionicons.min') ?>
  <!-- DataTables -->
  <!--link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"-->
  <?= $this->Html->css('datatables.net-bs/css/dataTables.bootstrap.min') ?>
  <!-- Theme style -->
  <!--link rel="stylesheet" href="dist/css/AdminLTE.min.css"-->
  <?= $this->Html->css('css/AdminLTE.min') ?>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <!--link rel="stylesheet" href="dist/css/skins/_all-skins.min.css"-->
  <?= $this->Html->css('css/skins/_all-skins.min') ?>
  <!-- Morris chart -->
  <!--link rel="stylesheet" href="bower_components/morris.js/morris.css"-->
  <?= $this->Html->css('morris.js/morris') ?>
  <!-- jvectormap -->
  <!--link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css"-->
  <?= $this->Html->css('jvectormap/jquery-jvectormap') ?>
  <!-- Date Picker -->
  <!--link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"-->
  <?= $this->Html->css('bootstrap-datepicker/dist/css/bootstrap-datepicker.min') ?>
  <!-- Daterange picker -->
  <!--link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css"-->
  <?= $this->Html->css(['bootstrap-daterangepicker/daterangepicker','bootstrap-timepicker.min','select2.min']) ?>
  <!-- bootstrap wysihtml5 - text editor -->
  <!--link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"-->
  <?= $this->Html->css('bootstrap3-wysihtml5.min') ?>
  <!-- custom css -->
  <!--link rel="stylesheet" href="css/custom.css"-->
  <?= $this->Html->css('custom') ?>
<?= $this->fetch('meta') ?>
  <link href="img/woddi_logo.png" rel="icon" type="image/png">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <?= $this->fetch('css') ?>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">
  <?php 
    $userdata = $this->request->getSession()->read('usersinfo');
    $userrole = $this->request->getSession()->read('usersroles');
  ?>
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Precisio</b>HMS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                         <?php if(!empty($userdata['passport'])){  echo 
                          $this->Html->image($userdata['passport'], ['class'=>'img-circle', 'alt'=>'User Image']);}
                          else{echo $this->Html->image('woddi_logo.PNG', ['class'=>'img-circle', 'alt'=>'User Image']);}
                          ?>
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Coming soon</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <?php if(!empty($userdata['passport'])){  echo 
                          $this->Html->image($userdata['passport'], ['class'=>'img-circle', 'alt'=>'User Image']);}
                          else{echo $this->Html->image('woddi_logo.PNG', ['class'=>'img-circle', 'alt'=>'User Image']);}
                          ?>
                      </div>
                      <h4>
                        Woddi Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Coming soon</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                          <?php if(!empty($userdata['passport'])){  echo 
                          $this->Html->image($userdata['passport'], ['class'=>'img-circle', 'alt'=>'User Image']);}
                          else{echo $this->Html->image('woddi_logo.PNG', ['class'=>'img-circle', 'alt'=>'User Image']);}
                          ?>
                          
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Coming soon</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                       <?php if(!empty($userdata['passport'])){  echo 
                          $this->Html->image($userdata['passport'], ['class'=>'img-circle', 'alt'=>'User Image']);}
                          else{echo $this->Html->image('woddi_logo.PNG', ['class'=>'img-circle', 'alt'=>'User Image']);}
                          ?>
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Coming soon?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                         <?php if(!empty($userdata['passport'])){  echo 
                          $this->Html->image($userdata['passport'], ['class'=>'img-circle', 'alt'=>'User Image']);}
                          else{echo $this->Html->image('woddi_logo.PNG', ['class'=>'img-circle', 'alt'=>'User Image']);}
                          ?>
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Coming soon</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
<!--          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                 inner menu: contains the actual data 
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>-->
          <!-- Tasks: style can be found in dropdown.less -->
<!--          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                 inner menu: contains the actual data 
                <ul class="menu">
                  <li> Task item 
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                   end task item 
                  <li> Task item 
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                   end task item 
                  <li> Task item 
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                   end task item 
                  <li> Task item 
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                   end task item 
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <?php if(!empty($userdata['passport'])){  echo 
                          $this->Html->image($userdata['passport'], ['class'=>'user-image', 'alt'=>'User Image']);}
                          else{echo $this->Html->image('woddi_logo.PNG', ['class'=>'user-image', 'alt'=>'User Image']);}
                          ?>
            
              <span class="hidden-xs"><?php echo $userdata['fname']. ", ".$userdata['lname'];?></span>
            </a>
            <ul class="dropdown-menu" >
              <!-- User image -->
              <li class="user-header">
               
                    <?php if(!empty($userdata['passport'])){  echo 
                          $this->Html->image($userdata['passport'], ['class'=>'img-circle', 'alt'=>'User Image']);}
                          else{echo $this->Html->image('woddi_logo.PNG', ['class'=>'img-circle', 'alt'=>'User Image',
                              'style'=>'background-color: white;']);}
                          ?>
                <p>
                  <?php echo $userdata['fname']. ", ".$userdata['lname'];?> - <?php echo $userrole['role_name'];?>
                  <small>Member since <?=date('d-m-Y' , strtotime($userdata['created_date']))  ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    <?= $this->Html->link(__(' Profile'), ['controller'=>'users','action' => 'view', $userdata['id'],'view-profile'],['class'=>'btn btn-default btn-flat']) ?>
<!--                  <a href="#" class="btn btn-default btn-flat">Profile</a>-->
                </div>
                <div class="pull-right">
                  <?= $this->Html->link(__(' Sign Out'), ['controller'=>'users','action' => 'logout', $userdata['id']],['class'=>'btn btn-default btn-flat']) ?>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
             <?php if(!empty($userdata['passport'])){  echo 
                          $this->Html->image($userdata['passport'], ['class'=>'img-circle', 'alt'=>'User Image']);}
                          else{echo $this->Html->image('woddi_logo.PNG', ['class'=>'img-circle', 'alt'=>'User Image']);}
                          ?>
         
        </div>
        <div class="pull-left info">
          <p><?php echo $userdata['fname']. ", ".$userdata['lname'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <?= $this->Html->link(
             $this->Html->tag('i', '', array('class' => 'fa fa-dashboard')).'Dashboard', 
             array('controller' => 'Users', 'action' => 'dashboard'), array('escape' => false)
          ) ?>
        </li>
        <?php if($userrole['id'] == 1){?>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i>
            <span>Department</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'List Department', 
                array('controller' => 'Departments', 'action' => 'index'), array('escape' => false)
              ) ?>
            </li>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'New', 
                array('controller' => 'Departments', 'action' => 'add'), array('escape' => false)
              ) ?>
            </li>
          </ul>
        </li>
        <?php }?>
        <?php if($userrole['id'] == 1){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-md"></i>
            <span>Doctor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'List Doctor', 
                array('controller' => 'Users', 'action' => 'listdoctor'), array('escape' => false)
              ) ?>
            </li>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'New', 
                array('controller' => 'Users', 'action' => 'adddoctor'), array('escape' => false)
              ) ?>
            </li>
          </ul>
        </li>
        <?php }?>
        <?php if($userrole['id'] == 1 || $userrole['id'] == 3 || $userrole['id'] == 2 || $userrole['id'] == 7){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Patient</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'List Patients', 
                array('controller' => 'Patients', 'action' => 'index'), array('escape' => false)
              ) ?>
            </li>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'New', 
                array('controller' => 'Patients', 'action' => 'newpatient'), array('escape' => false)
              ) ?>
            </li>
<!--            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'List Patients-NEW', 
                array('controller' => 'Patients', 'action' => 'newpatient2'), array('escape' => false)
              ) ?>
            </li>-->
          </ul>
        </li>
        <?php }?>
   
        <?php if($userrole['id'] == 2 || $userrole['id'] == 3){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus-square"></i>
            <span>Discharge</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <?php if($userrole['id'] == 2){
              echo $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Request Discharge', 
                array('controller' => 'Patients', 'action' => 'requestdischarge'), array('escape' => false)
              );} ?>
            </li>
            <li>
              <?php if($userrole['id'] == 3){
              echo $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'View Discharge Requests', 
                array('controller' => 'Admissions', 'action' => 'viewdischargerequests'), array('escape' => false)
              );} ?>
            </li>
          </ul>
        </li>
        <?php }?>
         
        <?php if($userrole['id'] == 1){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus-square"></i>
            <span>Nurse</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'List Nurse', 
                array('controller' => 'Users', 'action' => 'listnurse'), array('escape' => false)
              ) ?>
            </li>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'New', 
                array('controller' => 'Users', 'action' => 'addnurse'), array('escape' => false)
              ) ?>
            </li>
          </ul>
        </li>
        <?php }?>
        
        
         
        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus-square"></i>
            <span>Invoices</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Generate Invoice', 
                array('controller' => 'Invoices', 'action' => 'newinvoice'), array('escape' => false)
              ) ?>
            </li>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Paid Invoices', 
                array('controller' => 'Invoices', 'action' => 'paidinvoices'), array('escape' => false)
              ) ?>
            </li>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Unpaid Invoices', 
                array('controller' => 'Invoices', 'action' => 'unpaidinvoices'), array('escape' => false)
              ) ?>
            </li>
             <?php if($userrole['id'] == 1||$userrole['id'] == 7 ||$userrole['id'] == 6){?>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'List Invoices', 
                array('controller' => 'Invoices', 'action' => 'index'), array('escape' => false)
              ) ?>
            </li>
            
              <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Search Invoices', 
                array('controller' => 'Invoices', 'action' => 'searchinvoice'), array('escape' => false)
              ) ?>
            </li>
            <?php }?>
          </ul>
        </li>
        
        
       
        <?php if($userrole['id'] == 1){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-medkit"></i>
            <span>Pharmacist</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'List Pharmacist', 
                array('controller' => 'Users', 'action' => 'listpharmacist'), array('escape' => false)
              ) ?>
            </li>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'New', 
                array('controller' => 'Users', 'action' => 'addpharmacist'), array('escape' => false)
              ) ?>
            </li>
          </ul>
        </li>
        <?php } ?>
        <?php if($userrole['id'] == 1){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-flask"></i>
            <span>Laboratorist</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'List Laboratorist', 
                array('controller' => 'Users', 'action' => 'listlaboratorist'), array('escape' => false)
              ) ?>
            </li>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'New', 
                array('controller' => 'Users', 'action' => 'addlaboratorist'), array('escape' => false)
              ) ?>
            </li>
          </ul>
        </li>
        <?php } ?>
        <?php if($userrole['id'] == 1){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Accountant</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'List Accountant', 
                array('controller' => 'Users', 'action' => 'listaccountant'), array('escape' => false)
              ) ?>
            </li>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'New', 
                array('controller' => 'Users', 'action' => 'addaccountant'), array('escape' => false)
              ) ?>
            </li>
          </ul>
        </li>
        <?php }?>
        <?php if($userrole['id'] == 1){?>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-database"></i>
            <span>Front Desk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'List Frontdesk', 
                array('controller' => 'Users', 'action' => 'listfrontdesk'), array('escape' => false)
              ) ?>
            </li>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'New', 
                array('controller' => 'Users', 'action' => 'addfrontdesk'), array('escape' => false)
              ) ?>
            </li>
          </ul>
        </li>
        <?php }?>
        <?php if($userrole['id'] == 2 || $userrole['id'] == 3){?>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-bed"></i>
            <span>Bed Ward</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
           <?php if($userrole['id'] == 3){?>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Manage Bed', 
                array('controller' => 'Beds', 'action' => 'index'), array('escape' => false)
              ) ?>
            </li>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Admissions Request', 
                array('controller' => 'Admissions', 'action' => 'admissionrequests'), array('escape' => false)
              ) ?>
            </li>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Admissions List', 
                array('controller' => 'Admissions', 'action' => 'index'), array('escape' => false)
              ) ?>
            </li>
            <?php } ?>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Manage Bed Allotment', 
                array('controller' => 'Bedallotments', 'action' => 'index'), array('escape' => false)
              ) ?>
            </li>
          </ul>
        </li>
        <?php }?>
        
        <?php if($userrole['id'] == 2 || $userrole['id'] == 3){?>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-bed"></i>
            <span>Admission</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
           <?php if($userrole['id'] == 3){?>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Admissions Requests', 
                array('controller' => 'Admissions', 'action' => 'admissionrequests'), array('escape' => false)
              ) ?>
            </li>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Admissions List', 
                array('controller' => 'Admissions', 'action' => 'index'), array('escape' => false)
              ) ?>
            </li>
            <?php } ?>
          </ul>
        </li>
        <?php }?>

        <?php if($userrole['id'] == 2 || $userrole['id'] == 5){?>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-tint"></i>
            <span>Blood Bank</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
              <?php if($userrole['id'] == 3){?>
                <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Manage Blood Bank', 
                    array('controller' => 'Bloodbanks', 'action' => 'index'), array('escape' => false)
                  ) ?>
                </li>
              <?php } ?>
              <?php if($userrole['id'] == 3){?>
                <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Manage Blood Donor', 
                    array('controller' => 'Blooddonors', 'action' => 'index'), array('escape' => false)
                  ) ?>
                </li>
              <?php } ?>
              <?php if($userrole['id'] == 2){?>
                <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Blood Donor List', 
                    array('controller' => 'Blooddonors', 'action' => 'index'), array('escape' => false)
                  ) ?>
                </li>
                <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Blood Bank List', 
                    array('controller' => 'Blooddonors', 'action' => 'index'), array('escape' => false)
                  ) ?>
                </li>
              <?php } ?>
            </ul>
        </li>
        <?php }?>
        <?php if($userrole['id'] == 2 || $userrole['id'] == 3){?>
<!--        <li class="treeview">
          <a href="#">
            <i class="fa  fa-calendar"></i>
            <span>Manage Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
                <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Operation Report', 
                    array('controller' => 'Bloodbanks', 'action' => 'index'), array('escape' => false)
                  ) ?>
                </li>
                <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Birth Report', 
                    array('controller' => 'Blooddonors', 'action' => 'index'), array('escape' => false)
                  ) ?>
                </li>
                <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Death Report', 
                    array('controller' => 'Blooddonors', 'action' => 'index'), array('escape' => false)
                  ) ?>
                </li>
            </ul>
        </li>-->
        <?php }?>
        
        <!-- appointments for doctors  -->
           <?php if(($userrole['id'] == 1) || ($userrole['id'] == 3)|| ($userrole['id'] == 2)){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Appointment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'View Appointments', 
                array('controller' => 'Doctors', 'action' => 'viewappointments'), array('escape' => false)
              ) ?>
            </li>
            <?php if($userrole['id'] == 2){?>
            <li>
              <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Schedule Appointment', 
                array('controller' => 'Doctors', 'action' => 'newappointment'), array('escape' => false)
              ) ?>
            </li>
            <?php }?>
          </ul>
        </li>
        <?php }?>
        <!-- appointment ends here  -->
            
        <!-- strat here for prescription for doctors -->
          <?php if(($userrole['id'] == 1) || ($userrole['id'] == 4) || ($userrole['id'] == 2)){?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Prescriptions</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'View Prescriptions', 
                    array('controller' => 'Prescriptions', 'action' => 'index'), array('escape' => false)
                  ) ?>
                </li>
                
                <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'View Consultations', 
                    array('controller' => 'Consultations', 'action' => 'index'), array('escape' => false)
                  ) ?>
                </li>
                
                               
                  <?php if(($userrole['id'] == 1) || ($userrole['id'] == 2)){?>
<!--                <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'New Prescription', 
                    array('controller' => 'Doctors', 'action' => 'newprescriptions'), array('escape' => false)
                  ) ?>
                </li>-->
                <?php }?>
              </ul>
            </li>
            <?php }?>
          <!--prescription ends here  -->
      
        <?php if($userrole['id'] == 4){?>
          <li class="treeview">
            <a href="#">
              <i class="fa  fa-edit"></i>
              <span>Medicine Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                  <li>
                    <?= $this->Html->link(
                      $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'List Category', 
                      array('controller' => 'Categories', 'action' => 'index'), array('escape' => false)
                    ) ?>
                  </li>
                  <li>
                    <?= $this->Html->link(
                      $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'New', 
                      array('controller' => 'Categories', 'action' => 'add'), array('escape' => false)
                    ) ?>
                  </li>
              </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa  fa-medkit"></i>
              <span>Manage Medicine</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                  <li>
                    <?= $this->Html->link(
                      $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'List Medicine', 
                      array('controller' => 'Medicines', 'action' => 'index'), array('escape' => false)
                    ) ?>
                  </li>
                  <li>
                    <?= $this->Html->link(
                      $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'New', 
                      array('controller' => 'Medicines', 'action' => 'add'), array('escape' => false)
                    ) ?>
                  </li>
              </ul>
          </li>
          <li>
            <?= $this->Html->link(
              $this->Html->tag('i', '', array('class' => 'fa fa-stethoscope')).'Provide Medication', 
              array('controller' => 'Prescriptions', 'action' => 'index'), array('escape' => false)
            ) ?>
          </li>
        <?php }?>

        <?php if($userrole['id'] == 1){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-crosshairs"></i>
            <span>Monitor Hospital</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li>
            <?= $this->Html->link(
              $this->Html->tag('i', '', array('class' => 'fa fa-stethoscope')).'Activity Logs', 
              array('controller' => 'Users', 'action' => 'activitylogs'), array('escape' => false)
            ) ?>
          </li>
           <li>
            <?= $this->Html->link(
              $this->Html->tag('i', '', array('class' => 'fa fa-stethoscope')).'User Logs', 
              array('controller' => 'Users', 'action' => 'viewlogins'), array('escape' => false)
            ) ?>
          </li>
           <li>
            <?= $this->Html->link(
              $this->Html->tag('i', '', array('class' => 'fa fa-stethoscope')).'View Payments', 
              array('controller' => 'Payments', 'action' => 'index'), array('escape' => false)
            ) ?>
          </li>
          <li>
            <?= $this->Html->link(
              $this->Html->tag('i', '', array('class' => 'fa fa-stethoscope')).'Staff List', 
              array('controller' => 'Users', 'action' => 'index'), array('escape' => false)
            ) ?>
          </li>
       <!--      <li><a href=""><i class="fa fa-circle-o"></i>View Blood Bank</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i>View Medicine</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i>View Operation</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i>View Birth Report</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i>View Death Report</a></li>-->
          </ul>
        </li>
        <?php }?>
        
        
         <?php if($userrole['id'] == 5){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i>
            <span>Diagnosis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'View Diagnosis Requests', 
                    array('controller' => 'Diagnosisreports', 'action' => 'index'), array('escape' => false)
                  ) ?>
                </li>
          </ul>
        </li>
        <?php }?>
        
        
        <?php if($userrole['id'] == 1){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Reset Password', 
                    array('controller' => 'Users', 'action' => 'allstaff'), array('escape' => false)
                  ) ?>
                </li>
           <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Manage DiagnosisTypes', 
                    array('controller' => 'Diagnosistypes', 'action' => 'index'), array('escape' => false)
                  ) ?>
                </li>
            <li>
                  <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-circle-o')).'Manage System Settings', 
                    array('controller' => 'Settings', 'action' => 'editsetting',1), array('escape' => false)
                  ) ?>
                </li>
            
          </ul>
        </li>
        <?php }?>
        <li class="header"></li>
        <li>
          <?= $this->Html->link(
             $this->Html->tag('i', '', array('class' => 'fa fa-circle-o text-green')).'Profile', 
             array('controller' => 'Users', 'action' => 'view', $userdata['id']), array('escape' => false)
          ) ?>
        </li>
        <li>
          <?= $this->Html->link(
             $this->Html->tag('i', '', array('class' => 'fa fa-circle-o text-red')).'Logout', 
             array('controller' => 'Users', 'action' => 'logout', $userdata['id']), array('escape' => false)
          ) ?>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="https://netpro.com.ng">NetPro International</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p> phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!--script src="bower_components/jquery/dist/jquery.min.js"></script-->
<?= $this->Html->script([
  'jquery.min','bootstrap.min','dataTables.bootstrap.min','jquery.dataTables.min',
  'jQueryUI/jquery-ui.min','jquery.sparkline.min','jquery.knob.min','jquery-jvectormap-1.2.2.min','select2.full.min',
  'jquery-jvectormap-world-mill-en','daterangepicker','moment.min','jquery.slimscroll.min','bootstrap-timepicker.min',
  'bootstrap-datepicker.min','fastclick','demo','adminlte.min','bootstrap3-wysihtml5.all.min',
  'custom','ckeditor/ckeditor'
  ]
) ?>
<!-- jQuery UI 1.11.4 -->
<!--script src="bower_components/jquery-ui/jquery-ui.min.js"></script-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<?= $this->fetch('script') ?>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
    
    
    //Date picker
    $('#enddate').datepicker({
      autoclose: true
    });
    
     //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

    $('.pregnant').click(function(){
      if($(this).is(':checked')){
        $('#pregnant').show();
      }else{
        $('#pregnant').hide();
      }
    });
    
     $('.select2').select2();
</script>
</body>
</html>
