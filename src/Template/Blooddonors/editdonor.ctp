 <section class="content">
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Blooddonor</h3>
        </div>
    <?= $this->Form->create($blooddonor) ?>
    <fieldset>
       
        <?php
          echo '<div class="col-md-6">';
            echo $this->Form->control('name',['label'=>'Donor Name','class'=>'form-control','required']);
            echo '</div>';
            
            echo '<div class="col-md-2">';
            echo $this->Form->control('blood_group',['label'=>'Blood Group','class'=>'form-control','required']);
             echo '</div>';
            $gender = ['Male'=>'Male','Female'=>'Female'];
              echo '<div class="col-md-2">';
            echo $this->Form->control('sex',['label'=>'Gender','class'=>'form-control','required','options'=>$gender]);
            echo '</div>';
             echo '<div class="col-md-2">';
            echo $this->Form->control('age',['label'=>'Age','class'=>'form-control','required']);
            echo '</div>';
             echo '<div class="col-md-3">';
            echo $this->Form->control('phone',['label'=>'Phone','class'=>'form-control','required']);
            echo '</div>';
             echo '<div class="col-md-3">';
            echo $this->Form->control('email',['label'=>'Email Address','class'=>'form-control','required']);
            echo '</div>';
             echo '<div class="col-md-6">';
            echo $this->Form->control('address',['label'=>'Address','class'=>'form-control','required']);
            echo '</div>';
          //  echo $this->Form->control('last_donation_timestamp');
           // echo $this->Form->control('nurse_id', ['options' => $nurses]);
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