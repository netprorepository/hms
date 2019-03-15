 <section class="content">
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update Prescription</h3>
        </div>
 <?= $this->Form->create($prescription) ?>
    <fieldset>
        
        <?php
           
          //  echo $this->Form->control('doctor_id', ['options' => $doctors]);
        echo '<div class="col-md-6">';
            echo $this->Form->control('patient_id', ['label'=>'Select Patient','options' => $patients,'class'=>'form-control',]);
            echo '</div>';
              echo '<div class="col-md-6">';
            echo $this->Form->control('case_history',['label'=>'Case History','class'=>'form-control',
                'class'=>'form-control','required']);
            echo '</div>';
            
              echo '<div class="col-md-6">';
            echo $this->Form->control('medication',['label'=>'Medication','class'=>'form-control',
                'class'=>'form-control','required']);
            echo '</div>';
            
              echo '<div class="col-md-6">';
            echo $this->Form->control('medication_from_pharmacist',['label'=>'Medications From Pharmacist','class'=>'form-control',
                'class'=>'form-control','required']);
            echo '</div>';
            
              echo '<div class="col-md-6">';
            echo $this->Form->control('description',['label'=>'Description','class'=>'form-control',
                'class'=>'form-control','required']);
            echo '</div>';
        ?>
   <br /> <br />
            <div class="col-md-12">
    <?= $this->Form->button('Submit',['class'=>'btn btn-primary pull-right']) ?>
                <br /> <br />
                </div><br /> <br />
            
             <br /> <br />
    <?= $this->Form->end() ?>
  </div>
        <!-- /.box -->
    </div>
    </div>
</section>  
