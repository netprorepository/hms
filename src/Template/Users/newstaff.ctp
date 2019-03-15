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
            <h3 class="box-title">New Staff</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($user,['type'=>'file']) ?>
            <div class="box-body">
                <div class="form-group col-md-6">
                    <label>Username</label> 
                    <?php
                   
                        echo $this->Form->control('username', 
                        ['class'=>'form-control', 'label'=>false, 'type'=>'email', 'required']
                        );
                        
                    ?>
                </div>
                 <div class="form-group col-md-6">
                    <label>Password</label> 
                    <?php
                   
                        echo $this->Form->control('password', 
                        ['class'=>'form-control', 'label'=>false, 'type'=>'password', 'placeholder'=>'password']
                        );
                        
                    ?>
                </div>
                  <div class="form-group col-md-3">
                    <label>Confirm Password</label> 
                    <?php
                   
                        echo $this->Form->control('cpassword', 
                        ['class'=>'form-control', 'label'=>false, 'type'=>'password', 'placeholder'=>'confirm password']
                        );
                        
                    ?>
                </div>
                <div class="form-group col-md-3">
                    <label>Role</label>
                    <?php
                        echo $this->Form->control('role_id', 
                        ['class'=>'form-control', 'label'=>false, 'options'=>$roles,'required']
                        );
                    ?>
                </div>
                <div class="form-group col-md-3">
                    <label>First name</label>
                    <?php
                        echo $this->Form->control('fname', 
                        ['class'=>'form-control', 'label'=>false]
                        );
                    ?>
                </div>
                <div class="form-group col-md-3">
                    <label>Last name</label>
                    <?php
                        echo $this->Form->control('lname', 
                        ['class'=>'form-control', 'label'=>false]
                        );
                    ?>
                </div>
                <div class="form-group col-md-3">
                    <label>Middle name</label>
                    <?php
                        echo $this->Form->control('mname', 
                        ['class'=>'form-control', 'label'=>false]
                        );
                    ?>
                </div>
                <div class="form-group col-md-3">
                    <label>Gender</label>
                    <?php $gender = ['Male'=>'Male','Female'=>'Female'];
                        echo $this->Form->control('gender', 
                        ['class'=>'form-control', 'label'=>false,'options'=>$gender]
                        );
                    ?>
                </div>
                 <div class="form-group col-md-3">
                  <label>Country</label>
                  <?php
                      echo $this->Form->control('country_id', 
                      ['class'=>'form-control select2', 'label'=>false, 'options'=>$countries, 'onchange'=>'getState(this.value)']
                      );
                  ?>
              </div>
                <div class="form-group col-md-3" id="dstates">
                  <label>State</label>
                  <?php
                      echo $this->Form->control('state_id', 
                      ['class'=>'form-control select2', 'label'=>false, 'options'=>$states]
                      );
                  ?>
              </div>
                <div class="form-group">
                    <label>Address</label>
                    <?php
                        echo $this->Form->control('address', 
                        ['class'=>'form-control', 'label'=>false, 'type'=>'textarea']
                        );
                    ?>
                </div>
                <div class="form-group col-md-3">
                    <label>Phone</label>
                    <?php
                        echo $this->Form->control('phone', 
                        ['class'=>'form-control', 'label'=>false]
                        );
                    ?>
                </div>
                
                <div class="form-group col-md-3">
                    <label>Department</label>
                    <?php
                        echo $this->Form->control('department_id', 
                        ['class'=>'form-control', 'label'=>false, 'options'=>$departments]
                        );
                    ?>
                </div>
                
                <div class="form-group col-md-3">
                    <label>DOB</label>
                   <?php
                      echo $this->Form->control('dob', 
                      ['class'=>'form-control pull-right', 'type'=>'text','label'=>false, 'id'=>'datepicker']
                      );
                   ?>
                </div> 
                
                <div class="form-group col-md-3">
                    <label>Passport</label>
                    <?php
                        echo $this->Form->control('passport', 
                        ['class'=>'form-control', 'label'=>false,'type'=>'file']
                        );
                    ?>
                </div> 
                
                <div class="form-group">
                    <label>Profile</label>
                    <?php
                        echo $this->Form->control('profile', 
                        ['class'=>'form-control', 'label'=>false, 'type'=>'textarea']
                        );
                    ?>
                </div>
                
                 <?php
                      echo $this->Form->control('created_by', 
                      ['class'=>'form-control pull-right', 'type'=>'hidden','label'=>false, 'value'=>$userdata['id']]
                      );
                   ?>                   
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
<script type="text/javascript">
    function getState(stateid){
 //alert('am called');
    $.ajax({
        url: '../users/getstates/'+stateid,
        method: 'GET',
        dataType: 'text',
        success: function(response) {
        //    console.log(response); return;
            document.getElementById('dstates').innerHTML = "";
            document.getElementById('dstates').innerHTML = response;
            //location.href = redirect;
        }
    });

}
    </script>