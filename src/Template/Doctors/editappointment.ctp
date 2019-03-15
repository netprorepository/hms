 <section class="content">
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update Appointment</h3>
        </div>
<?= $this->Form->create($appointment) ?>
    <fieldset>
       
          
        <?php  echo '<div class="col-md-12"><div class="col-md-6">';
            echo $this->Form->control('appointment_date',['label'=>'Appointment Date','class'=>'form-control','type'=>'text',
                'class'=>'form-control','id'=>'datepicker']);
            echo '</div>';
            ?>
            
            <div class="bootstrap-timepicker col-md-6">
                <div class="form-group">
                  <label>Time picker:</label>

                  <div class="input-group">
                      <input type="text" class="form-control timepicker" name="appointment_time">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
            </div>
            
            <?php
             echo '<div class="col-md-12">';
//            echo $this->Form->control('doctor_id', ['label'=>'Select Doctor','options' => $doctors,'required','class'=>'form-control']);
//            echo '</div>';
             echo '<div class="col-md-6">';
            echo $this->Form->control('patient_id', ['label'=>'Select Patient','options' => $patients,'required','class'=>'form-control select2']);
           // echo $this->Form->control('created_date');
             echo '</div></div>';
        ?>
    </fieldset>
   <br /> <br />
            <div class="col-md-12">
    <?= $this->Form->button('Submit',['class'=>'btn btn-primary pull-right']) ?>
                </div><br /> <br />
            
             <br /> <br />
    <?= $this->Form->end() ?>
  </div>
        <!-- /.box -->
    </div>
    </div>
</section>  

