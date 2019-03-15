<!-- Content Header (Page header) -->
<?php $userrole = $this->request->getSession()->read('usersroles');?>
<section class="content-header">
    <h1>Patient Consultation</h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="../../dist/img/woddi.jpg" alt="User profile picture">
                    <h3 class="profile-username text-center"> <?=$consultation->patient->name?></h3>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?=$consultation->patient->emailaddress?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a class="pull-right"><?=$consultation->patient->phone?></a>
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
                    <p class="text-muted"><?=$consultation->patient->name?></p>
                    <p class="text-muted"><?=$consultation->patient->emailaddress?></p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                    <p class="text-muted"><?=$consultation->patient->address?></p>
                    <hr>
                </div><!-- /.box-body -->
             </div><!--/end box box-primary-->
            <!-- end About Me Box -->
        </div><!--/end col-md-3-->
        <div class="col-md-9">
            <?= $this->Flash->render() ?>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                   
                    <li class="active"><a href="#consult" data-toggle="tab">Consultation</a></li>
                    
                </ul><!--/end ul-->
                <div class="tab-content">
                  
                    <div class="active tab-pane" id="consult">
                    
                         <section class="content">
                             <div class="row">
                                 
                                 <div class="col-md-12">
                                  
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
                                                <ul class="nav nav-pills nav-stacked">
                                                   
                                                     <li class="active">
                                                        
                                                       
                                                        <a href="#">
                                                            <!--i class="fa fa-edit"></i> Edit Consultation -->
                                                            <span class="">
                                                               <?= $this->Html->link(' View Diagnosis', ['controller' => 'Diagnosisreports', 'action' => 'viewreport',$consultation->id],
                                                                       ['title'=>'update consultation']) ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.box-body -->
                                        </div><!--/end box solid-->
                                  
                                 </div><!--/end col-md-12-->
                             </div><!--/end row-->
                        </section><!--/end section-->
                    </div><!--/end consultation-->

                 
                </div><!--/end tab-content-->
            </div><!--/end nav-tabs-custom-->
        </div><!--/end col-md-9-->
    </div><!--/end row-->
</section>

