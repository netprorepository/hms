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
                    <?= $this->Form->create($bedallotment, ['class'=>'form-horizontal']) ?>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Bed Number</label>
                        <div class="col-sm-6">
                            <?php
                                echo $this->Form->control('bed_id', 
                                ['class'=>'form-control', 'type'=>'select','label'=>false,'options'=>$beds]
                                );
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Patient</label>
                        <div class="col-sm-6">
                            <?php
                                echo $this->Form->control('patient_id', 
                                ['class'=>'form-control', 'type'=>'select','label'=>false,'options'=>$patients]
                                );
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Discharge Date</label>
                        <div class="col-sm-6">
                            <?php
                                echo $this->Form->control('discharge_timestamp', 
                                ['class'=>'form-control', 'type'=>'text','label'=>false]
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

