
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

            <h3 class="profile-username text-center"> <?=$diagnosisreport->consultation->patient->name?></h3>

<!--            <p class="text-muted text-center">Patient</p>-->

            <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Email</b> <a class="pull-right"><?=$diagnosisreport->consultation->patient->emailaddress?></a>
            </li>
            <li class="list-group-item">
                <b>Phone</b> <a class="pull-right"><?=$diagnosisreport->consultation->patient->phone?></a>
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
                <?=$diagnosisreport->consultation->patient->name?>
            </p>
            
             <p class="text-muted">
                <?=$diagnosisreport->consultation->patient->emailaddress?>
            </p>
            <hr>
            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
            <p class="text-muted"><?=$diagnosisreport->consultation->patient->address?></p>
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#timeline" data-toggle="tab">Data</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="timeline">
                 <!-- The timeline -->
                    <ul class="timeline">
                        <!-- timeline time label -->
                        <li class="time-label">
                            <span class="bg-red">
                                <?php echo $diagnosisreport->diagnosistype->name. ", ".date('d M. Y', strtotime($diagnosisreport->created_date));?>
                            </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('D d M Y, H:m A', strtotime($diagnosisreport->created_date));?></span>
                            <h3 class="timeline-header"><a href="#"><?php echo "Requested By Dr " .$diagnosisreport->user->fname.' '.$diagnosisreport->user->lname;?></a></h3>
                            <div class="timeline-body">
                                <?=$diagnosisreport->description?>
                            </div>
                        </div>
                        </li>
                        <!-- END timeline item -->

                        <!-- timeline item -->
                        <li>
                        <i class="fa fa-comments bg-yellow"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> <?=$diagnosisreport->reporttime?></span>

                            <h3 class="timeline-header"><a href="#">Report(By <?=$diagnosisreport->reportby?> )</a></h3>
                            <?php if($diagnosisreport->status == "Done"){?> 
                                <div class="timeline-body">
                                    <?=$diagnosisreport->report?>
                                </div>
                            <?php }else{?>
                                <div class="timeline-body">
                                    <a class="btn btn-warning btn-flat btn-xs">Report not done</a>
                                </div>
                            <?php }?>
                        </div>
                        </li>
                        <!-- END timeline item -->
                        
                        <!-- timeline item -->
                        <li>
                        <i class="fa fa-camera bg-purple"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> <?=$diagnosisreport->reporttime?> </span>
                            <h3 class="timeline-header"><a href="#">File(s)</a></h3>
                            <div class="timeline-body">
                                <?php if($diagnosisreport->file_name == "none.png"){
                                        echo $this->Html->image('none.png', ['class'=>'margin', 'alt'=>'User Image']);
                                        }else{
                                        echo $this->Html->image($diagnosisreport->file_name, ['class'=>'margin',
                                            'alt'=>'User Image','height'=>'141','width'=>'150']);
                                        }
                                ?>
                            </div>
                        </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                        </li>
                </ul>
                </div>
            </div>
        <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</section>
<!-- /.content -->




