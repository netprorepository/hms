 <section class="content">
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
         <?= $this->Flash->render() ?>
        <div class="box-header with-border">
            <h3 class="box-title">Update Password</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($user,['url'=>['controller'=>'Users', 'action'=>'changepassword']])?>
            <div class="box-body">
              
              <div class="form-group">
                  <label>New Password</label>
                  <?php
                      echo $this->Form->control('password', 
                      ['class'=>'form-control', 'type'=>'password','label'=>false]
                      );
                  ?>
              </div> 
                
                 <div class="form-group">
                  <label>Confirm Password</label>
                  <?php
                      echo $this->Form->control('cpassword', 
                      ['class'=>'form-control', 'type'=>'password','label'=>false]
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

