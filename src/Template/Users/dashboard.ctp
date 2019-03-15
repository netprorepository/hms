<?php 
  $usersprofile = $this->request->getSession()->read('usersprofile');
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
  $doc = 0; $nurse = 0; $lab = 0; $accountant = 0; $clarks = 0; $pharmacists = 0; $admin = 0; $frontdesk = 0;
 foreach ($users as $user){
     if($user->role_id==1){
         $admin++;
     }
     elseif($user->role_id==2){
         $doc++;
     }
      elseif($user->role_id==3){
         $nurse++;
     }
       elseif($user->role_id==4){
         $pharmacists++;
     }
       elseif($user->role_id==5){
         $lab++;
     }
      elseif($user->role_id==6){
         $accountant++;
     }
      elseif($user->role_id==7){
         $frontdesk ++;
     }
 }
 $paid_invoices = 0; $unpaid_invoices = 0;
 foreach ($invoices as $invoice ){
     if($invoice->status=='Paid'){$paid_invoices++;}else{$unpaid_invoices++;}
 }
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
   <?php if($userrole['id'] == 1){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= $doc ?></h3>
          <p>Doctors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  <?php }?>
  <?php if($userrole['id'] == 1 || $userrole['id'] == 3){?> 
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$patients?></h3>

          <p>Patients</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
       <?= $this->Html->link(__(' More info'), ['controller' => 'Patients', 'action' => 'index'],
                  ['class'=>'small-box-footer fa fa-arrow-circle-right']) ?>
      </div>
    </div>
    <!-- ./col -->
  <?php } ?>
    
     <?php if($userrole['id'] == 1 || $userrole['id'] == 3){?> 
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$admisions?></h3>

          <p>On Admission</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  <?php } ?>
   
  <?php if($userrole['id'] == 1){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$nurse ?></h3>

          <p>Nurse</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  <?php } ?>
  <?php if($userrole['id'] == 1){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$pharmacists ?></h3>

          <p>Pharmacist</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  <?php } ?>
  <?php if($userrole['id'] == 1){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$lab ?></h3>

          <p>Laboratorist</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  <?php } ?>
  <?php if($userrole['id'] == 1){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$accountant ?></h3>

          <p>Accountants</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  <?php } ?>
  <?php if($userrole['id'] == 1){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$appointments?></h3>

          <p>Appointments</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <?php } ?>
    <?php if($userrole['id'] == 1){?>
    
     <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$paid_invoices?></h3>

          <p>Paid Invoices</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
          <?= $this->Html->link(__(' More info'), ['controller' => 'Invoices', 'action' => 'paidinvoices'],
                  ['class'=>'fa fa-arrow-circle-right small-box-footer']) ?>
      </div>
    </div>
    <!-- ./col -->
    
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$unpaid_invoices?></h3>

          <p>Unpaid Invoices</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
          <?= $this->Html->link(__(' More info'), ['controller' => 'Invoices', 'action' => 'unpaidinvoices'],
                  ['class'=>'small-box-footer fa fa-arrow-circle-right']) ?>
           
<!--        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
      </div>
    </div>
    <!-- ./col -->
    
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$payments?></h3>

          <p>Payments</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <?php } ?>
    <?php if($userrole['id'] == 1 || $userrole['id'] == 5){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$bloodbank?></h3>

          <p>Blood Bank</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <?php } ?>
    <?php if($userrole['id'] == 1){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$medicines ?></h3>

          <p>Medicine</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <?php } ?>
    <?php if($userrole['id'] == 1 || $userrole['id'] == 3){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$bedallotments?></h3>

          <p>Bed Allotment</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <?php } ?>
    <?php if($userrole['id'] == 1){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>

          <p>Noticeboard</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <?php } ?>
    <?php if($userrole['id'] == 1){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$frontdesk?></h3>

          <p>Frontdesk</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <?php } ?>
    <?php if($userrole['id'] == 1){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$departtments?></h3>

          <p>Departments</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <?php } ?>
  
    <?php if($userrole['id'] == 4){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>1</h3>

          <p>Medicine Category</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>1</h3>

          <p>Manage Medicine</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <?php } ?>
  
    <?php if($userrole['id'] == 6){?>
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$paid_invoices?></h3>

          <p>Paid Invoices</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    
    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?=$unpaid_invoices?></h3>

          <p>UnPaid Invoices</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <?php } ?>
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->