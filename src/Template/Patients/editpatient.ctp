<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
 <section class="content">
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update Patient</h3>
        </div>
            
    <?= $this->Form->create($patient) ?><?= $this->Flash->render() ?>
            <fieldset> 
<!--        <legend><?= __('Add Patient') ?></legend>-->
        <?php $gender = ['Male'=>'Male','Female'=>'Female'];
            echo '<div class="col-md-4">';
            //echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('name',['label'=>'Name','class'=>'form-control']);
            echo '</div>';
           
             echo '<div class="col-md-4">';
            echo $this->Form->control('phone',['label'=>'Phone','class'=>'form-control']);
             echo '</div>';
             
             echo '<div class="col-md-4">';
            echo $this->Form->control('emailaddress',['label'=>'Email Address','class'=>'form-control','type'=>'email']);
             echo '</div>';
             
             echo '<div class="col-md-4">';
            echo $this->Form->control('sex',['label'=>'Gender','class'=>'form-control','options'=>$gender]);
             echo '</div>';
             echo '<div class="col-md-4">';
            echo $this->Form->control('birth_date',['label'=>'Date Of Birth','class'=>'form-control','type'=>'text',
                'class'=>'form-control','id'=>'datepicker']);
             echo '</div>';
             echo '<div class="col-md-4">';
            echo $this->Form->control('blood_group',['label'=>'Blood Group','class'=>'form-control']);
             echo '</div>';
             
              
             echo '<div class="col-md-8">';
            echo $this->Form->control('address',['label'=>'Address','class'=>'form-control','type'=>'textarea']);
             echo '</div>';
           // echo $this->Form->control('created_date');
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