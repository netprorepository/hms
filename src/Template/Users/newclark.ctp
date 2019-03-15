 <section class="content">
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
         <?= $this->Flash->render() ?>
        <div class="box-header with-border">
            <h3 class="box-title">Add New Staff</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php 
          echo $this->Form->create($user,['type'=>'file']);
        ?>
            <div class="box-body">
              <div class="form-group col-md-4">
                  <label>Username</label>
                  <?php
                      echo $this->Form->control('username', 
                      ['class'=>'form-control', 'label'=>false, 'type'=>'email','required']
                      );
                  ?>
              </div>
              <div class="form-group col-md-4">
                  <label>Password</label>
                  <?php
                      echo $this->Form->control('password', 
                      ['class'=>'form-control', 'type'=>'password','label'=>false,'required']
                      );
                  ?>
              </div>  
              
              <div class="form-group col-md-4">
                  <label>First name</label>
                  <?php
                      echo $this->Form->control('fname', 
                      ['class'=>'form-control', 'type'=>'text','label'=>false,'required']
                      );
                  ?>
              </div>   
              <div class="form-group col-md-4">
                  <label>Last name</label>
                  <?php
                      echo $this->Form->control('lname', 
                      ['class'=>'form-control', 'type'=>'text','label'=>false,'required']
                      );
                  ?>
              </div>  
              <div class="form-group col-md-4">
                  <label>Middle name</label>
                  <?php
                      echo $this->Form->control('mname', 
                      ['class'=>'form-control', 'type'=>'text','label'=>false,'required']
                      );
                  ?>
              </div>
              <div class="form-group col-md-4">
                  <label>Gender</label>
                  <?php
                      echo $this->Form->control('gender', 
                      ['class'=>'form-control', 'type'=>'text','label'=>false,'required']
                      );
                  ?>
              </div> 
              <div class="form-group col-md-6">
                  <label>Address</label>
                  <?php
                      echo $this->Form->control('address', 
                      ['class'=>'form-control', 'type'=>'textarea','label'=>false,'required']
                      );
                  ?>
              </div> 
                <div class="form-group col-md-6">
                  <label>Profile</label>
                  <?php
                      echo $this->Form->control('profile', 
                      ['class'=>'form-control', 'type'=>'textarea','label'=>false]
                      );
                  ?>
              </div>
              <div class="form-group col-md-4">
                  <label>Country</label>
                  <?php
                      echo $this->Form->control('country_id', 
                      ['class'=>'form-control', 'label'=>false, 'options'=>$country, 'onchange'=>'getState()','required']
                      );
                  ?>
              </div>
              <div class="form-group col-md-4">
                  <label>State</label>
                  <?php
                      echo $this->Form->control('state_id', 
                      ['class'=>'form-control', 'label'=>false, 'options'=>$state,'required']
                      );
                  ?>
              </div>   
              <div class="form-group col-md-4">
                  <label>Phone</label>
                  <?php
                      echo $this->Form->control('phone', 
                      ['class'=>'form-control', 'type'=>'text','label'=>false,'required']
                      );
                  ?>
              </div> 
              <div class="form-group col-md-4">
                  <label>Department</label>
                  <?php
                      echo $this->Form->control('department_id', 
                      ['class'=>'form-control', 'label'=>false, 'options'=>$department,'required']
                      );
                  ?>
              </div>
                
                <div class="form-group col-md-4">
                  <label>Designation</label>
                  <?php
                      echo $this->Form->control('role_id', 
                      ['class'=>'form-control', 'label'=>false, 'options'=>$roles,'required']
                      );
                  ?>
              </div>
                
              
              <div class="form-group col-md-4">
                  <label>DOB</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <?php
                      echo $this->Form->control('dob', 
                      ['class'=>'form-control pull-right', 'type'=>'text','label'=>false, 'id'=>'datepicker','required']
                      );
                   ?>
                   
                  </div>
              </div>
                
                 <div class="form-group col-md-4">
                  <label>Passport</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-file"></i>
                    </div>
                    <?php
                      echo $this->Form->control('passport', 
                      ['class'=>'form-control', 'type'=>'file','label'=>false]
                      );
                   ?>
                   
                  </div>
              </div> 
                
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
            </div>
        <?= $this->Form->end() ?>
        </div>
        <!-- /.box -->
    </div>
    </div>
</section>   

