
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Patient Profile
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="../index">Patients</a></li>
    <li class="active">Patient profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

            <h3 class="profile-username text-center"> <?=$labtest->prescription->patient->name?></h3>

<!--            <p class="text-muted text-center">Patient</p>-->

            <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Email</b> <a class="pull-right"><?=$labtest->prescription->patient->emailaddress?></a>
            </li>
            <li class="list-group-item">
                <b>Phone</b> <a class="pull-right"><?=$labtest->prescription->patient->phone?></a>
            </li>

            </ul>

            <!--a href="#" class="btn btn-primary btn-block"><b>Follow</b></a-->
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i>Profile</strong>

            <p class="text-muted">
                <?=$labtest->prescription->patient->name?>
            </p>
            
             <p class="text-muted">
            <?=$labtest->prescription->patient->emailaddress?>
                 
                  </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

            <p class="text-muted"><?=$labtest->prescription->patient->address?></p>

            
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <!--li class="active"><a href="#activity" data-toggle="tab">Activity</a></li-->
            <li class="active"><a href="#timeline" data-toggle="tab">Data</a></li>
            <!--li><a href="#settings" data-toggle="tab">Settings</a></li-->
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="timeline">
            <!-- The timeline -->
            <ul>
      
   

<div class="diagnosisreports view large-9 medium-8 columns content">
   
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Comment') ?></th>
            <td><?= h($labtest->comment) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td> <?=$labtest->status?>
                                       </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Result') ?></th>
            <td><?= $labtest->result?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($labtest->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Laboratorist') ?></th>
            <td><?= $labtest->has('user') ? $this->Html->link($labtest->user->fname.' '.$labtest->user->lname, ['controller' => 'Users', 'action' => 'view', $labtest->user->id]) : '' ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td>&nbsp; <?= h(date('Y-m-d h:i a', strtotime($labtest->date_added))) ?></td>
        </tr>
    </table>
</div>

                     <hr />
            </ul>
</div>
                <!-- END timeline item -->
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
            
            </div>
        </div>
        <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
   
    <!-- /.row -->

</section>
<!-- /.content -->


