<!--<div class="consultations form large-9 medium-8 columns content">
    <?= $this->Form->create($consultation) ?>
    <fieldset>
        <legend><?= __('Edit Consultation') ?></legend>
        <?php
           // echo $this->Form->control('patient_id', ['options' => $patients]);
           // echo $this->Form->control('user_id', ['options' => $users]);
           // echo $this->Form->control('consultationday');
            echo $this->Form->control('pc');
            echo $this->Form->control('hpc');
            echo $this->Form->control('pmh');
            echo $this->Form->control('psh');
            echo $this->Form->control('dh');
            echo $this->Form->control('allergies');
            echo $this->Form->control('socialhistory');
            echo $this->Form->control('impression');
            echo $this->Form->control('hp');
            echo $this->Form->control('poh');
            echo $this->Form->control('pgh');
            echo $this->Form->control('lmp');
            echo $this->Form->control('ga');
            echo $this->Form->control('edd');
            echo $this->Form->control('parity');
            echo $this->Form->control('diagnosis');
            echo $this->Form->control('treatmentplan_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->


 <?php $userrole = $this->request->getSession()->read('usersroles');?>
 <section class="content-header">
    <h1>Patient Consultation</h1>
</section>
 <section class="content">
    <div class="row">
        <!-- left column -->
        <?= $this->Form->create($consultation) ?>
        <div class="col-md-12">
            <div class="box box-info collapsed-box">
                <div class="box-header">
                    <h3 class="box-title">PC
                        <small>Presenting Complain</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                     <?= $this->Form->control('pc',['label'=>false,'class'=>'ckeditor','style'=>'visibility: hidden; display: none;',
                         'row'=>10,'cols'=>80])?>
                    
                </div>
            </div><!--/end box-info-->

            <div class="box box-info collapsed-box">
                <div class="box-header">
                    <h3 class="box-title">HPC
                        <small>History Of Presenting Complain</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                   <?= $this->Form->control('hpc',['label'=>false,'class'=>'ckeditor','style'=>'visibility: hidden; display: none;',
                         'row'=>10,'cols'=>80])?>
                </div>
            </div><!--/end box-info-->

            <div class="box box-info collapsed-box">
                <div class="box-header">
                    <h3 class="box-title">PMH
                        <small>Past Medical History</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <?= $this->Form->control('pmh',['label'=>false,'class'=>'ckeditor','style'=>'visibility: hidden; display: none;',
                         'row'=>10,'cols'=>80])?>
                </div>
            </div><!--/end box-info-->

            <div class="box box-info collapsed-box">
                <div class="box-header">
                    <h3 class="box-title">PSH
                        <small>Past Surgical History</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <?= $this->Form->control('psh',['label'=>false,'class'=>'ckeditor','style'=>'visibility: hidden; display: none;',
                         'row'=>10,'cols'=>80])?>
                </div>
            </div><!--/end box-info-->

            <div class="box box-info collapsed-box">
                <div class="box-header">
                    <h3 class="box-title">DH
                        <small>Drug History</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <?= $this->Form->control('dh',['label'=>false,'class'=>'ckeditor','style'=>'visibility: hidden; display: none;',
                         'row'=>10,'cols'=>80])?>
                </div>
            </div><!--/end box-info-->

            <div class="box box-info collapsed-box">
                <div class="box-header">
                    <h3 class="box-title">Allergies
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <?= $this->Form->control('allergies',['label'=>false,'class'=>'ckeditor','style'=>'visibility: hidden; display: none;',
                         'row'=>10,'cols'=>80])?>
                </div>
            </div><!--/end box-info-->

            <div class="box box-info collapsed-box">
                <div class="box-header">
                    <h3 class="box-title">Social/Family History
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <?= $this->Form->control('socialhistory',['label'=>false,'class'=>'ckeditor','style'=>'visibility: hidden; display: none;',
                         'row'=>10,'cols'=>80])?>
                </div>
            </div><!--/end box-info-->

            <div class="checkbox">
                <label>
                    <input type="checkbox" class="pregnant">
                    Is Patient Pregnant?
                </label>
            </div>
            <div id="pregnant" style="display: none;">
                <div class="box box-info collapsed-box">
                    <div class="box-header">
                        <h3 class="box-title">HOP
                        <small>History Of Prgenancy</small>
                        </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-plus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <?= $this->Form->control('hop',['label'=>false,'class'=>'ckeditor','style'=>'visibility: hidden; display: none;',
                         'row'=>10,'cols'=>80])?>
                    </div>
                </div><!--/end box-info-->

                <div class="box box-info collapsed-box">
                    <div class="box-header">
                        <h3 class="box-title">POH
                        <small>Past Obstetric History</small>
                        </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-plus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <?= $this->Form->control('poh',['label'=>false,'class'=>'ckeditor','style'=>'visibility: hidden; display: none;',
                         'row'=>10,'cols'=>80])?>
                    </div>
                </div><!--/end box-info-->

                <div class="box box-info collapsed-box">
                    <div class="box-header">
                        <h3 class="box-title">PGH
                        <small>Past Gynea History</small>
                        </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-plus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <?= $this->Form->control('pgh',['label'=>false,'class'=>'ckeditor','style'=>'visibility: hidden; display: none;',
                         'row'=>10,'cols'=>80])?>
                    </div>
                </div><!--/end box-info-->

                <div class="box box-info collapsed-box">
                    <div class="box-header">
                        <h3 class="box-title">LMP
                        <small>Last Menstural Period</small>
                        </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-plus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                       <?= $this->Form->control('lmp',['label'=>false,'class'=>'ckeditor','style'=>'visibility: hidden; display: none;',
                         'row'=>10,'cols'=>80])?>
                    </div>
                </div><!--/end box-info-->

                <div class="box box-info collapsed-box">
                    <div class="box-header">
                        <h3 class="box-title">GA/EDD/Parity
                        <small>Gestational Age/Expected Delivery Date/Parity</small>
                        </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-plus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                       <div class="row">
                            <div class="col-xs-3">
<!--                                <label>GA</label>
                                <input type="text" name="ga" class="form-control" placeholder="Gestational Age">-->
                                <?= $this->Form->control('ga',['label'=>'GA','class'=>'form-control','placeholder'=>'Gestational Age'])?>
                            </div>
                            <div class="col-xs-4">
<!--                                 <label>EDD</label>-->
                                  <?= $this->Form->control('edd',['label'=>'EDD','class'=>'form-control','placeholder'=>'Expected Day Of Delivefy'])?>
                                 
                            </div>
                            <div class="col-xs-5">
<!--                                <label>Parity</label>-->
                                 <?= $this->Form->control('parity',['label'=>'Parity','class'=>'form-control','placeholder'=>'Parity'])?>
                                
                            </div>
                        </div>
                    </div>
                </div><!--/end box-info-->

            </div><!--/end pregnant-->
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Doctor's Impression
                    <small>Doctors Impression</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                   <?= $this->Form->control('impression',['label'=>false,'class'=>'ckeditor','style'=>'visibility: hidden; display: none;',
                         'row'=>10,'cols'=>80])?>
                </div>
            </div><!--/end box-info-->
             <?= $this->Form->button('Submit',['class'=>'btn btn-primary pull-right']) ?>
          
        </div><!--end col-md-12-->
       
    <?= $this->Form->end() ?>
    </div><!--/end row-->
</section>  