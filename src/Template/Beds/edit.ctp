<section class="content-header">
    <h1>
        Edit Bed
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <?= $this->Form->create($bed, ['class'=>'form-horizontal']) ?>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Bed Number</label>
                            <div class="col-sm-6">
                                <?php
                                    echo $this->Form->control('bed_number', 
                                    ['class'=>'form-control', 'type'=>'text','label'=>false]
                                    );
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-6">
                                <?php
                                    $type = ['ward'=>'Ward', 'cabin'=>'Cabin', 'icu'=>'Icu', 'other'=>'Other'];
                                    echo $this->Form->control('type', 
                                    ['class'=>'form-control', 'type'=>'select','label'=>false, 'options'=>$type]
                                    );
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputExperience" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-6">
                                <?php
                                    echo $this->Form->control('description', 
                                    ['class'=>'form-control', 'type'=>'textarea','label'=>false]
                                    );
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>              
    </div>
</section>
