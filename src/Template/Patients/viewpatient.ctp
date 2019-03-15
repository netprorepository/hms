<!-- Content Header (Page header) -->
<?php $userrole = $this->request->getSession()->read('usersroles');?>
<section class="content-header">
    <h1>Patient Profile</h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="../../img/woddi_logo.PNG" alt="User profile picture">
                    <h3 class="profile-username text-center"> <?=$patient->name?></h3>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?=$patient->emailaddress?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a class="pull-right"><?=$patient->phone?></a>
                        </li>
                    </ul>
                </div>
            </div><!--/end box box-primary-->
            <!-- end Profile Image -->
            <!-- About Me Box -->
             <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i>Profile</strong>
                    <p class="text-muted"><?=$patient->name?></p>
                    <p class="text-muted"><?=$patient->emailaddress?></p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                    <p class="text-muted"><?=$patient->address?></p>
                    <hr>
                </div><!-- /.box-body -->
             </div><!--/end box box-primary-->
            <!-- end About Me Box -->
        </div><!--/end col-md-3-->
        <div class="col-md-9">
            <?= $this->Flash->render() ?>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#vitals" data-toggle="tab">Vitals</a></li>
                    <li><a href="#consult" data-toggle="tab">Consultation</a></li>
                    <li><a href="#diagnostics" data-toggle="tab">Diagnostics</a></li>
                    <li><a href="#prescription" data-toggle="tab">Prescriptions</a></li>
                    <li><a href="#treatmentplan" data-toggle="tab">Treatment Plan</a></li>
                    <li><a href="#treatments" data-toggle="tab">Treatments</a></li>
                    <li><a href="#appointments" data-toggle="tab">Appointments</a></li>
                </ul><!--/end ul-->
                <div class="tab-content">
                    <div class="active tab-pane" id="vitals">
                        <section class="content">
                             <div class="row">
                                 <div class="col-md-12">
                                    <?php 
                                        foreach($patient->vitals as $vital):
                                    ?>
                                        <div class="box box-solid collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">
                                                    <b>
                                                        <?php echo date('d M, Y', strtotime($vital->date_added))." ".date('H:m a', strtotime($vital->date_added)); ?>
                                                    </b>
                                                </h3>
                                                <div class="box-tools">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body no-padding">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li class="active">
                                                        <a href="#">
                                                            <i class="fa fa-inbox"></i> Blood Presure
                                                            <span class="label label-primary pull-right"><?=$vital->bp?>(mmHg)</span>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">
                                                            <i class="fa fa-envelope-o"></i> Body Temperature
                                                            <span class="label label-primary pull-right"><?=$vital->temp?> F</span>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">
                                                            <i class="fa fa-file-text-o"></i> Pulse Rate
                                                            <span class="label label-primary pull-right"><?=$vital->pulse?>(bpm)</span>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">
                                                            <i class="fa fa-file-text-o"></i> Weight
                                                            <span class="label label-primary pull-right"><?=$vital->weight?>Kg</span>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">
                                                            <i class="fa fa-file-text-o"></i> Hight
                                                            <span class="label label-primary pull-right"><?=$vital->height?>cm</span>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">
                                                            <i class="fa fa-file-text-o"></i> Bmi
                                                            <span class="label label-primary pull-right"><?=$vital->bmi?>Kg/m</span>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">
                                                            <i class="fa fa-file-text-o"></i> Respiratory Rate (In breaths per minute)
                                                            <span class="label label-primary pull-right"><?=$vital->resp?>B/m</span>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">
                                                            <i class="fa fa-file-text-o"></i> Initial Case History
                                                            <span class="label label-primary pull-right"><?=$vital->description?></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.box-body -->
                                        </div><!--/end box solid-->
                                    <?php 
                                         endforeach;
                                    ?>
                                 </div><!--/end col-md-12-->
                             </div><!--/end row-->
                        </section><!--/end section-->
                    </div><!--/end vitals-->
                    <div class="tab-pane" id="consult">
                         <section class="content">
                             <div class="row">
                                 <?php if($userrole['id']==2){?>
                                 <div class="col-md-12">
                                   <?= 
                                    $this->Html->link(
                                        __(' New Consultation'), 
                                        ['controller'=>'Consultations','action' => 'newconsultation',$patient->id],
                                        ['class'=>'fa fa-plus pull-right']
                                    ) 
                                   ?>
                                   <hr>
                                 </div>
                                 <?php } ?>
                                 <div class="col-md-12">
                                    <?php 
                                        foreach($patient->consultations as $consultation):
                                    ?>
                                        <div class="box box-solid collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">
                                                    <b>
                                                        <?php echo date('d M, Y', strtotime($consultation->consultationday))." ".date('H:m a', strtotime($consultation->consultationday)); ?>
                                                    </b>
                                                </h3>
                                                <div class="box-tools">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body no-padding">
                                                <div class="callout callout-info">
                                                    <h4>Presenting Complain</h4>
                                                    <p><?=$consultation->pc?></p>
                                                </div>
                                                <div class="callout callout-info">
                                                    <h4>History Of Presenting Complain</h4>
                                                    <p><?=$consultation->hpc?></p>
                                                </div>
                                                <div class="callout callout-info">
                                                    <h4>PMH</h4>
                                                    <p><?=$consultation->pmh?></p>
                                                </div>
                                                <div class="callout callout-info">
                                                    <h4>PSH</h4>
                                                    <p><?=$consultation->psh?></p>
                                                </div>
                                                <?php if(!$consultation->dh == "" || $consultation->dh = NULL){?>
                                                <div class="callout callout-info">
                                                    <h4>DH</h4>
                                                    <p><?=$consultation->dh?></p>
                                                </div>
                                                <?php } ?>
                                                <?php if(!$consultation->allergies == "" || $consultation->allergies = NULL){?>
                                                <div class="callout callout-info">
                                                    <h4>Allergies</h4>
                                                    <p><?=$consultation->allergies?></p>
                                                </div>
                                                <?php } ?>
                                                <div class="callout callout-info">
                                                    <h4>Social/Family History</h4>
                                                    <p><?=$consultation->socialhistory?></p>
                                                </div>
                                                <?php if(!$consultation->hp == "" || $consultation->hp = NULL){?>
                                                <div class="callout callout-info">
                                                    <h4>HP</h4>
                                                    <p><?=$consultation->hp?></p>
                                                </div>
                                                <?php } ?>
                                                <?php if(!$consultation->poh == "" || $consultation->poh = NULL){?>
                                                <div class="callout callout-info">
                                                    <h4>POH</h4>
                                                    <p><?=$consultation->poh?></p>
                                                </div>
                                                <?php } ?>
                                                <?php if(!$consultation->pgh == "" || $consultation->pgh = NULL){?>
                                                <div class="callout callout-info">
                                                    <h4>PGH</h4>
                                                    <p><?=$consultation->pgh?></p>
                                                </div>
                                                <?php } ?>
                                                <?php if(!$consultation->lmp == "" || $consultation->lmp = NULL){?>
                                                <div class="callout callout-info">
                                                    <h4>LMP</h4>
                                                    <p><?=$consultation->lmp?></p>
                                                </div>
                                                <?php } ?>
                                                <?php if(!$consultation->ga == "" || $consultation->ga = NULL){?>
                                                <div class="callout callout-info">
                                                    <h4>GA</h4>
                                                    <p><?=$consultation->ga?></p>
                                                </div>
                                                <?php } ?>
                                                <?php if(!$consultation->edd == "" || $consultation->edd = NULL){?>
                                                <div class="callout callout-info">
                                                    <h4>EDD</h4>
                                                    <p><?=$consultation->edd?></p>
                                                </div>
                                                <?php } ?>
                                                <?php if(!$consultation->parity == "" || $consultation->parity = NULL){?>
                                                <div class="callout callout-info">
                                                    <h4>Parity</h4>
                                                    <p><?=$consultation->parity?></p>
                                                </div>
                                                <?php } ?>
                                                <div class="callout callout-info">
                                                    <h4>Doctor's Impression</h4>
                                                    <p><?=$consultation->impression?></p>
                                                </div>
                                                 <?php if($userrole['id']==2){?>
                                                <ul class="nav nav-pills nav-stacked">
                                                     <li class="active">
                                                        <a href="#">
                                                            <!--i class="fa fa-edit"></i> Edit Consultation -->
                                                            <span class="">
                                                               <?= $this->Html->link(' Edit Consultation', ['controller' => 'Consultations', 'action' => 'editconsultation',$consultation->id],
                                                                       ['title'=>'update consultation']) ?>
                                                            </span>
                                                        </a>
                                                        <a href="#">
                                                            <!--i class="fa fa-edit"></i> Edit Consultation -->
                                                            <span class="">
                                                               <?= $this->Html->link(' Add Diagnosis', ['controller' => 'Diagnosisreports', 'action' => 'addreport',$consultation->id],
                                                                       ['title'=>'add diagnostic request']) ?>
                                                            </span>
                                                        </a>
                                                        <a href="#">
                                                            <!--i class="fa fa-edit"></i> Edit Consultation -->
                                                            <span class="">
                                                               <?= $this->Html->link(' Add Prescription', ['controller' => 'Prescriptions', 'action' => 'addprescription',$consultation->id,$patient->id],
                                                                       ['title'=>'add prescription request']) ?>
                                                            </span>
                                                        </a>
                                                         
                                                         <a href="#">
                                                            <!--i class="fa fa-edit"></i> Edit Consultation -->
                                                            <span class="">
                                                               <?= $this->Html->link(' Add Treatment Plan', ['controller' => 'Treatmentplans', 'action' => 'newtreatmentplan',$consultation->id],
                                                                       ['title'=>'add treatment plan']) ?>
                                                            </span>
                                                        </a>
                                                         
                                                    </li>
                                                </ul>
                                                 <?php } ?>
                                                <hr/>
                                                <!--diag-->
                                                <section class="content">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="box box-solid collapsed-box">
                                                                <div class="box-header with-border">
                                                                     <h3 class="box-title">
                                                                            <b>
                                                                                Diagnosis
                                                                            </b>
                                                                        </h3>
                                                                </div>
                                                            </div>
                                                            <?php 
                                                                foreach($patient->consultations as $consult):
                                                                    foreach($consult->diagnosisreports as $reports):
                                                            ?>
                                                                <div class="box box-solid collapsed-box">
                                                                    <div class="box-header with-border">
                                                                        <h3 class="box-title">
                                                                            <b>
                                                                                <?php echo date('d M, Y', strtotime($reports->created_date))." ".date('H:m a', strtotime($reports->created_date)); ?>
                                                                            </b>
                                                                        </h3>
                                                                        <div class="box-tools">
                                                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="box-body no-padding">
                                                                        <section class="content">
                                                                            <!-- row -->
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                <!-- The time line -->
                                                                                <ul class="timeline">
                                                                                    <!-- timeline time label -->
                                                                                    <li class="time-label">
                                                                                        <span class="bg-red">
                                                                                        <?php echo $reports->diagnosistype->name. ", ".date('d M. Y', strtotime($reports->created_date));?>
                                                                                        </span>
                                                                                    </li>
                                                                                    <!-- /.timeline-label -->
                                                                                    <!-- timeline item -->
                                                                                    <li>
                                                                                    <i class="fa fa-envelope bg-blue"></i>

                                                                                    <div class="timeline-item">
                                                                                        <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('H:m', strtotime($reports->created_date));?></span>
                                                                                        <h3 class="timeline-header"><a href="#"><?php echo "Dr " .$reports->user->fname." ".$reports->user->lname;?></a> requested for test</h3>
                                                                                        <div class="timeline-body">
                                                                                        <?=$reports->description?>
                                                                                        </div>
                                                                                    </div>
                                                                                    </li>
                                                                                    <!-- END timeline item -->

                                                                                    <!-- timeline item -->
                                                                                    <li>
                                                                                    <i class="fa fa-comments bg-yellow"></i>

                                                                                    <div class="timeline-item">
                                                                                        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                                                                        <h3 class="timeline-header"><a href="#">Report</a></h3>
                                                                                        <?php if($reports->status == "Done"){?> 
                                                                                            <div class="timeline-body">
                                                                                                <?=$reports->report?>
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
                                                                                        <span class="time"><i class="fa fa-clock-o"></i> <?= date('Y-m-d H:m', strtotime($reports->reporttime));?></span>
                                                                                        <h3 class="timeline-header"><a href="#">File(s)</a></h3>
                                                                                        <div class="timeline-body">
                                                                                            <?php if($reports->file_name == "none.png"){
                                                                                                    echo $this->Html->image('none.png', ['class'=>'margin', 'alt'=>'User Image']);
                                                                                                }else{
                                                                                                    echo $this->Html->image($reports->file_name, ['class'=>'margin',
                                                                                                        'alt'=>'User Image','height'=>'41','width'=>'50']);
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
                                                                                <!-- /.col -->
                                                                            </div>
                                                                            <!-- /.row -->
                                                                            </section>
                                                                    </div>
                                                                    <!-- /.box-body -->
                                                                </div><!--/end box solid-->
                                                            <?php 
                                                                    endforeach;
                                                                endforeach;
                                                            ?>
                                                        </div><!--/end col-md-12-->
                                                    </div><!--/end row-->
                                                </section><!--/end section-->
                                                <!--end diag-->
                                            </div>
                                            <!-- /.box-body -->
                                        </div><!--/end box solid-->
                                    <?php 
                                         endforeach;
                                   if($userrole['id']==2){ echo $this->Form->postLink(__('Admit '.$patient->name), 
                                           ['action' => 'admitpatient', $patient->id], 
                                   ['class'=>'btn btn-block btn-primary','confirm' => __('Are you sure you want to admit # {0}?', $patient->name)]);
                                   
                                   }?>
                                 </div><!--/end col-md-12-->
                             </div><!--/end row-->
                        </section><!--/end section-->
                    </div><!--/end consultation-->

                    <div class="tab-pane" id="diagnostics">
                         <section class="content">
                             <div class="row">
                                 <!--div class="col-md-12">
                                   <?= 
                                    $this->Html->link(
                                        __(' New Diagnosis'), 
                                        ['controller'=>'Doctors','action' => 'newprescriptions',$patient->id],
                                        ['class'=>'fa fa-plus pull-right']
                                    ) 
                                   ?>
                                   <hr>
                                 </div-->
                                 <div class="col-md-12">
                                    <?php 
                                        foreach($patient->consultations as $consult):
                                            foreach($consult->diagnosisreports as $reports):
                                    ?>
                                        <div class="box box-solid collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">
                                                    <b>
                                                        <?php echo date('d M, Y', strtotime($reports->created_date))." ".date('H:m a', strtotime($reports->created_date)); ?>
                                                    </b>
                                                </h3>
                                                <div class="box-tools">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body no-padding">
                                                <section class="content">
                                                    <!-- row -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <!-- The time line -->
                                                        <ul class="timeline">
                                                            <!-- timeline time label -->
                                                            <li class="time-label">
                                                                <span class="bg-red">
                                                                  <?php echo $reports->diagnosistype->name. ", ".date('d M. Y', strtotime($reports->created_date));?>
                                                                </span>
                                                            </li>
                                                            <!-- /.timeline-label -->
                                                            <!-- timeline item -->
                                                            <li>
                                                            <i class="fa fa-envelope bg-blue"></i>

                                                            <div class="timeline-item">
                                                                <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('H:m', strtotime($reports->created_date));?></span>
                                                                <h3 class="timeline-header"><a href="#"><?php echo "Dr " .$reports->user->fname." ".$reports->user->lname;?></a> requested for test</h3>
                                                                <div class="timeline-body">
                                                                   <?=$reports->description?>
                                                                </div>
                                                            </div>
                                                            </li>
                                                            <!-- END timeline item -->

                                                            <!-- timeline item -->
                                                            <li>
                                                            <i class="fa fa-comments bg-yellow"></i>

                                                            <div class="timeline-item">
                                                                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                                                <h3 class="timeline-header"><a href="#">Report</a></h3>
                                                                <?php if($reports->status == "Done"){?> 
                                                                    <div class="timeline-body">
                                                                        <?=$reports->report?>
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
                                                                <span class="time"><i class="fa fa-clock-o"></i><?= date('Y-m-d H:m', strtotime($reports->reporttime));?></span>
                                                                <h3 class="timeline-header"><a href="#">File(s)</a></h3>
                                                                <div class="timeline-body">
                                                                    <?php if($reports->file_name == "none.png"){
                                                                            echo $this->Html->image('none.png', ['class'=>'margin', 'alt'=>'User Image']);
                                                                          }else{
                                                                            echo $this->Html->image($reports->file_name, ['class'=>'margin', 'alt'=>'User Image',
                                                                             'height'=>'41','width'=>'50']);
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
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->
                                                    </section>
                                            </div>
                                            <!-- /.box-body -->
                                        </div><!--/end box solid-->
                                    <?php 
                                            endforeach;
                                         endforeach;
                                    ?>
                                 </div><!--/end col-md-12-->
                             </div><!--/end row-->
                        </section><!--/end section-->
                    </div><!--/end consultation-->
                    
                      <!-- tab for prescriptions -->
                     <div class="tab-pane" id="prescription">
                        <section class="content">
                             <div class="row">
                                 <div class="col-md-12">
                                    <?php 
                                        foreach($patient->consultations as $consultation):
                                         foreach($consultation->prescriptions as $prescription):    
                                    ?>
                                     
                                      <div class="box box-solid collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">
                                                    <b>
                                                       <?php echo date('d M, Y', strtotime($prescription->creation_timestamp)); ?>
                                                    </b>
                                                </h3>
                                                <div class="box-tools">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body no-padding">
                                                <div class="callout callout-info">
                                                    <h4>Prescription By </h4>
                                                    <p> <?= $prescription->user->fname.' '.$prescription->user->lname ?></p>
                                                </div>
                                            </div>
                                          
                                          <div class="box-body no-padding">
                                                <div class="callout callout-info">
                                                    <h4>Medication </h4>
                                                    <p> <?=$prescription->medication?></p>
                                                </div>
                                            </div>
                                          
                                           <div class="box-body no-padding">
                                                <div class="callout callout-info">
                                                    <h4>Description </h4>
                                                    <p> <?=$prescription->description?></p>
                                                </div>
                                            </div>
                                          
                                          <?php if(!empty($prescription->medication_from_pharmacist)){?>
                                          <div class="box-body no-padding">
                                                <div class="callout callout-info">
                                                    <h4>Medication From Pharmacist </h4>
                                                    <p>  <?= $prescription->medication_from_pharmacist?>
                                                                </p>
                                                </div>
                                            </div>
                                          <?php }  if($userrole['id'] == 2){?>
                                          
                              <div class="box-body no-padding">
                                   <?= 
                                    $this->Html->link(
                                        __(' Edit Prescription'), 
                                        ['controller'=>'Prescriptions','action' => 'editprescription',$prescription->id],
                                        ['class'=>'fa fa-edit pull-right btn btn-primary','title'=>'edit prescription']
                                    ) 
                                   ?>
                                 <br /> <br />
                                 </div>
                                          <?php } ?>
                                          
                                      </div>
                                     
                                    <?php 
                                    endforeach;
                                         endforeach;
                                    ?>
                                 </div><!--/end col-md-12-->
                             </div><!--/end row-->
                        </section><!--/end section-->
                    </div><!--/end prescription-->
                    <!-- start treatment plan -->
                    <div class="tab-pane" id="treatmentplan">
                        <section class="content">
                             <div class="row">
                                 
                                 <div class="col-md-12">
                                  <?php 
                                        foreach($patient->consultations as $consultation):
                                         foreach($consultation->treatmentplans as $plan):    
                                    ?>
                                      <div class="box box-solid collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">
                                                    <b>
                                                       <?= date('d M, Y', strtotime($plan->datecreated)); ?>
                                                    </b>
                                                </h3>
                                                <div class="box-tools">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body no-padding">
                                                <div class="callout callout-info">
                                                    <h4>Plan By </h4>
                                                    <p> <?= $plan->user->fname.' '.$plan->user->lname ?></p>
                                                </div>
                                            </div>
                                          
                                          <div class="box-body no-padding">
                                                <div class="callout callout-info">
                                                    <h4>Treatment Plan </h4>
                                                    <p> <?= $plan->plan ?></p>
                                                </div>
                                            </div>
                                          
                                           <?php if(!empty($plan->comment)){?>
                                          <div class="box-body no-padding">
                                                <div class="callout callout-info">
                                                    <h4>Comment </h4>
                                                    <p>  <?= $plan->comment?>
                                                                </p>
                                                </div>
                                            </div>
                                          <?php }
                                          if($userrole['id'] == 2){?>
                                          
                              <div class="box-body no-padding">
                                   <?= 
                                    $this->Html->link(
                                        __(' Edit Plan'), 
                                        ['controller'=>'Treatmentplans','action' => 'editplan',$plan->id],
                                        ['class'=>'fa fa-edit pull-right btn btn-primary','title'=>'edit treatment plan']
                                    ) 
                                   ?>
                                 <br /> <br />
                                 </div>
                                          <?php } ?>
                                          
                                      </div>
                                     
                                      <ul class="nav nav-pills nav-stacked">
                                                     <li class="active">
                                                        <a href="#">
                                                            <!--i class="fa fa-edit"></i> Edit Consultation -->
                                                            <span class="">
                                                               <?= $this->Html->link(' Add Treatment', ['controller' => 'Treatments', 'action' => 'addtreatment',$plan->consultation_id],
                                                                       ['title'=>'Add treatment given to the patient']) ?>
                                                            </span>
                                                        </a>
                                                  
                                                         
                                                    </li>
                                                </ul>
                                     
                                                <hr/>
                                   <?php 
                                        endforeach;
                                         endforeach;
                                    ?>
                                 </div><!--/end col-md-12-->
                                  
                             </div><!--/end row-->
                        </section><!--/end section-->
                    </div><!--/ end treatment plan-->
                    
                    <!-- treatment -->
                    
                      <div class="tab-pane" id="treatments">
                        <section class="content">
                             <div class="row">
                                 <div class="col-md-12">
                                    <?php 
                                        foreach($patient->consultations as $consultation):
                                         foreach($consultation->treatments as $treatment):    
                                    ?>
                                     
                                      <div class="box box-solid collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">
                                                    <b>
                                                         <?php echo date('d M, Y H:m a', strtotime($treatment->treatedon)); ?>
                                                    </b>
                                                </h3>
                                                <div class="box-tools">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body no-padding">
                                                <div class="callout callout-info">
                                                    <h4>Treated By </h4>
                                                    <p> <?= $treatment->user->fname.' '.$treatment->user->lname ?></p>
                                                </div>
                                            </div>
                                          
                                          <div class="box-body no-padding">
                                                <div class="callout callout-info">
                                                    <h4>Treatment Given </h4>
                                                    <p> <?= $treatment->treatmentgiven ?></p>
                                                </div>
                                            </div>
                                          
                                            
                                           <?php if(!empty($treatment->comment)){?>
                                          <div class="box-body no-padding">
                                                <div class="callout callout-info">
                                                    <h4>Comment </h4>
                                                    <p>  <?= $treatment->comment ?>
                                                                </p>
                                                </div>
                                            </div>
                                          <?php } ?>
                                          
                                           <div class="box-body no-padding">
                                                <div class="callout callout-info">
                                                    <h4>Next Treatment Date </h4>
                                                    <p> <?php echo date('d M, Y', strtotime($treatment->nexttreatmentdate)); ?> </p>
                                                </div>
                                            </div>
                                        
                                      </div>
                                     
                                    <?php 
                                     endforeach;
                                         endforeach;
                                    ?>
                                 </div><!--/end col-md-12-->
                             </div><!--/end row-->
                        </section><!--/end section-->
                    </div><!--/end vitals-->
                    
                    <!-- end treatment -->
                    <!-- appointments -->
                    
                       <div class="tab-pane" id="appointments">
                        <section class="content">
                             <div class="row">
                                  <?php if($userrole['id']==2){?>
                                 <div class="col-md-12">
                                   <?= 
                                    $this->Html->link(
                                        __(' New Appointment'), 
                                        ['controller' => 'Doctors', 'action' => 'newappointment'],
                                        ['class'=>'fa fa-plus pull-right','title'=>'schedule appointment']
                                    ) 
                                   ?>
                                    
                                   <hr>
                                 </div>
                                 <?php } ?>
                                 <div class="col-md-12">
                                    <?php 
                                        foreach($patient->appointments as $appointment):
                                    ?>
                                        <div class="box box-solid collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">
                                                    <b>
                                                        <?php echo date('d M, Y', strtotime($appointment->created_date)); ?>
                                                    </b>
                                                </h3>
                                                <div class="box-tools">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body no-padding">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li class="active">
                                                        <a href="#">
                                                            <i class="fa fa-clock-o"></i> Appointment Date/Time
                                                            <span class="pull-right">
                                                                <?php if(time()<strtotime($appointment->appointment_date)){
                            echo '<span class="label label-success">'.date('D, d M Y H:m A', strtotime($appointment->appointment_date)).'</span>';
                        } else{
                          echo '<span class="label label-warning">'.date('D, d M Y H:m A', strtotime($appointment->appointment_date)).'</span>';   
                        }  ?>
                                                   
                                                       </span>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">
                                                            <i class="fa fa-user"></i> Doctor
                                                            <span class="label label-primary pull-right"><?=$appointment->user->fname.' '.$appointment->user->lname?> </span>
                                                        </a>
                                                    </li>
                                                 
                                                </ul>
                                            </div>
                                            <!-- /.box-body -->
                                        </div><!--/end box solid-->
                                    <?php 
                                         endforeach;
                                    ?>
                                 </div><!--/end col-md-12-->
                             </div><!--/end row-->
                        </section><!--/end section-->
                    </div><!--/end vitals-->
                    
                    <!-- appointment ends here -->
                  
                </div><!--/end tab-content-->
            </div><!--/end nav-tabs-custom-->
        </div><!--/end col-md-9-->
    </div><!--/end row-->
</section>