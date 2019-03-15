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
                    <textarea name="pc" class="ckeditor" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
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
                    <textarea name="hpc" class="ckeditor" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
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
                    <textarea name="pmh" class="ckeditor" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
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
                    <textarea name="psh" class="ckeditor" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
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
                    <textarea name="dh" class="ckeditor" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
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
                    <textarea name="allergies" class="ckeditor" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
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
                    <textarea name="socialhistory" class="ckeditor" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
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
                        <textarea name="hop" class="ckeditor" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
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
                        <textarea name="poh" class="ckeditor" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
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
                        <textarea name="pgh" class="ckeditor" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
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
                        <textarea name="lmp" class="ckeditor" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
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
                                <label>GA</label>
                                <input type="text" name="ga" class="form-control" placeholder="Gestational Age">
                            </div>
                            <div class="col-xs-4">
                                 <label>EDD</label>
                                 <input type="text"name="edd" class="form-control" placeholder="Expected Delivery Date">
                            </div>
                            <div class="col-xs-5">
                                <label>Parity</label>
                                <input type="text" name="parity" class="form-control" placeholder="Parity">
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
                    <textarea name="impression" class="ckeditor" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
                </div>
            </div><!--/end box-info-->
             <?= $this->Form->button('Submit',['class'=>'btn btn-primary pull-right']) ?>
          
        </div><!--end col-md-12-->
       
    <?= $this->Form->end() ?>
    </div><!--/end row-->
</section>  