<!-- Content Header (Page header) -->
<?php $userrole = $this->request->getSession()->read('usersroles');?>
<section class="content-header">
    <h1>Patient Prescription Details</h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="../../img/woddi_logo.PNG" alt="User profile picture">
                    <h3 class="profile-username text-center"> <?=$prescription->patient->name?></h3>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?=$prescription->patient->emailaddress?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a class="pull-right"><?=$prescription->patient->phone?></a>
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
                    <p class="text-muted"><?=$prescription->patient->name?></p>
                    <p class="text-muted"><?=$prescription->patient->emailaddress?></p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                    <p class="text-muted"><?=$prescription->patient->address?></p>
                    <hr>
                </div><!-- /.box-body -->
             </div><!--/end box box-primary-->
            <!-- end About Me Box -->
        </div><!--/end col-md-3-->
        <div class="col-md-9">
            <?= $this->Flash->render() ?>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                   
                    <li class="active" ><a href="#prescription" data-toggle="tab">Prescriptions</a></li>
                   
                </ul><!--/end ul-->
                <div class="tab-content">
               <!-- tab for prescriptions -->
                     <div class="active tab-pane" id="prescription">
                        <section class="content">
                             <div class="row">
                                 <div class="col-md-12">
                                   
                                     
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
                                     
                                  
                                 </div><!--/end col-md-12-->
                             </div><!--/end row-->
                        </section><!--/end section-->
                    </div><!--/end prescription-->
                    <!-- start treatment plan -->
                  
                    
                  
                  
                </div><!--/end tab-content-->
            </div><!--/end nav-tabs-custom-->
        </div><!--/end col-md-9-->
    </div><!--/end row-->
</section>