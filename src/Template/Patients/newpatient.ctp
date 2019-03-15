<section class="content-header">
<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
  <h1>
    Patient Registration
  </h1>
</section><!--/end section-->
<section class="content">
            
    <?= $this->Form->create($patient) ?>
    <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Personal Information</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
            <fieldset> 
<!--        <legend><?= __('Add Patient') ?></legend>-->
        <?php $gender = ['Male'=>'Male','Female'=>'Female'];
            echo ' <div class="box-body" style="">
      <div class="row">';
            
              echo '<div class="col-md-4">';
            echo $this->Form->control('surname',['label'=>'Surname','class'=>'form-control']);
             echo '</div>';
            
            echo '<div class="col-md-4">';
            //echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('name',['label'=>'First Name','class'=>'form-control']);
            echo '</div>';
            
           
             echo '<div class="col-md-4">';
            echo $this->Form->control('phone',['label'=>'Phone','class'=>'form-control']);
             echo '</div>';
             
             echo '<div class="col-md-4">';
            echo $this->Form->control('emailaddress',['label'=>'Email Address','class'=>'form-control','type'=>'email']);
             echo '</div>';
             
             echo '<div class="col-md-2">';
            echo $this->Form->control('sex',['label'=>'Gender','class'=>'form-control','options'=>$gender]);
             echo '</div>';
             
              echo '<div class="col-md-2">';
            echo $this->Form->control('age',['label'=>'Age','class'=>'form-control']);
             echo '</div>';
             $bloodgroup = ['A-'=>'A-','A+'=>'A+','B-'=>'B-','B+'=>'B+','AB+'=>'AB+','AB-'=>'AB-','O+'=>'O+','O-'=>'O-'];
              echo '<div class="col-md-2">';
            echo $this->Form->control('blood_group',['label'=>'Blood Group','class'=>'form-control','options'=>$bloodgroup]);
             echo '</div>';
             
             echo '<div class="col-md-2">';
            echo $this->Form->control('birth_date',['label'=>'Date Of Birth','class'=>'form-control','type'=>'text',
                'class'=>'form-control','id'=>'datepicker']);
             echo '</div>';
             
            
             
             echo '<div class="col-md-4">';
            echo $this->Form->control('tribe',['label'=>'Tribe','class'=>'form-control']);
             echo '</div>';
             
             echo '<div class="col-md-4">';
            echo $this->Form->control('religion',['label'=>'Religion','class'=>'form-control']);
             echo '</div>';
             
             echo '<div class="col-md-4">';
            echo $this->Form->control('occupation',['label'=>'Occupation','class'=>'form-control']);
             echo '</div>';
            
             
                
             echo '<div class="col-md-12">';
            echo $this->Form->control('address',['label'=>'Address','class'=>'form-control','type'=>'textarea']);
             echo '</div></div></div></div>';
             
           // echo $this->Form->control('created_date');
        ?>
                
                 <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">NOK Information</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
                     
                     <?php 
                     echo '<div class="box-body" style="">
      <div class="row">';
        echo '<div class="col-md-4">';
            echo $this->Form->control('nokname',['label'=>'NOK Name','class'=>'form-control','required']);
             echo '</div>';  
             
             echo '<div class="col-md-4">';
            echo $this->Form->control('nokphone',['label'=>'NOK Phone','class'=>'form-control','required']);
             echo '</div>';  
                     
              echo '<div class="col-md-4">';
            echo $this->Form->control('nokrelation',['label'=>'Relationship','class'=>'form-control','required']);
             echo '</div>';
             
                echo '<div class="col-md-12">';
            echo $this->Form->control('nokaddress',['label'=>'NOK Address','class'=>'form-control','required','type'=>'textarea']);
             echo '</div>';
                     
                     ?>
                     
    <!-- /.box-header -->
    
       
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div><!--/end box-->
                
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