

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
         <?= $this->Flash->render() ?>
        <div class="box-header with-border">
            <h3 class="box-title">Add Accountant</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php 
          echo $this->Form->create(null, [
              'url' => ['controller' => 'Users', 'action' => 'addaccountant']
          ]);
        ?>
            <div class="box-body">
              <div class="form-group col-md-6">
                  <label>Username</label>
                  <?php
                      echo $this->Form->control('username', 
                      ['class'=>'form-control', 'label'=>false, 'type'=>'email']
                      );
                  ?>
              </div>
              <div class="form-group col-md-6">
                  <label>Password</label>
                  <?php
                      echo $this->Form->control('password', 
                      ['class'=>'form-control', 'type'=>'password','label'=>false]
                      );
                  ?>
              </div>  
              
              <div class="form-group col-md-6">
                  <label>First name</label>
                  <?php
                      echo $this->Form->control('fname', 
                      ['class'=>'form-control', 'type'=>'text','label'=>false]
                      );
                  ?>
              </div>   
              <div class="form-group col-md-6">
                  <label>Last name</label>
                  <?php
                      echo $this->Form->control('lname', 
                      ['class'=>'form-control', 'type'=>'text','label'=>false]
                      );
                  ?>
              </div>  
              <div class="form-group col-md-6">
                  <label>Middle name</label>
                  <?php
                      echo $this->Form->control('mname', 
                      ['class'=>'form-control', 'type'=>'text','label'=>false]
                      );
                  ?>
              </div>
              <div class="form-group col-md-6">
                  <label>Gender</label>
                  <?php $gender = ['Male'=>'Male', 'Female'=>'Female'];
                      echo $this->Form->control('gender', 
                      ['class'=>'form-control', 'options'=>$gender,'label'=>false]
                      );
                  ?>
              </div> 
              <div class="form-group">
                  <label>Address</label>
                  <?php
                      echo $this->Form->control('address', 
                      ['class'=>'form-control', 'type'=>'textarea','label'=>false]
                      );
                  ?>
              </div> 
              <div class="form-group col-md-3">
                  <label>Country</label>
                  <?php
                      echo $this->Form->control('country_id', 
                      ['class'=>'form-control', 'label'=>false, 'options'=>$country, 'onchange'=>'getState()']
                      );
                  ?>
              </div>
              <div class="form-group col-md-3">
                  <label>State</label>
                  <?php
                      echo $this->Form->control('state_id', 
                      ['class'=>'form-control', 'label'=>false, 'options'=>$state]
                      );
                  ?>
              </div>   
              <div class="form-group col-md-3">
                  <label>Phone</label>
                  <?php
                      echo $this->Form->control('phone', 
                      ['class'=>'form-control', 'type'=>'text','label'=>false]
                      );
                  ?>
              </div> 
              <div class="form-group col-md-3">
                  <label>Department</label>
                  <?php
                      echo $this->Form->control('department_id', 
                      ['class'=>'form-control', 'label'=>false, 'options'=>$department]
                      );
                  ?>
              </div>
              <div class="form-group">
                  <label>Profile</label>
                  <?php
                      echo $this->Form->control('profile', 
                      ['class'=>'form-control', 'type'=>'textarea','label'=>false]
                      );
                  ?>
              </div>
              <div class="form-group">
                  <label>DOB</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <?php
                      echo $this->Form->control('dob', 
                      ['class'=>'form-control pull-right', 'type'=>'text','label'=>false, 'id'=>'datepicker']
                      );
                   ?>
                   <?php
                      echo $this->Form->control('created_by', 
                      ['class'=>'form-control pull-right', 'type'=>'hidden','label'=>false, 'value'=>$userdata['id']]
                      );
                   ?>
                  </div>
              </div>             
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        <?= $this->Form->end() ?>
        </div>
        <!-- /.box -->
    </div>
    </div>
</section>   
