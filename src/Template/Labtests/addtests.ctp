 <section class="content">
      <?php $userrole = $this->request->getSession()->read('usersroles');?>
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Lab test</h3>
             <?= $this->Flash->render() ?>
        </div>
    <?= $this->Form->create($labtest) ?>
    <fieldset>
        <!--legend><?= __('Add Labtest') ?></legend-->
        <?php
           // echo $this->Form->control('prescription_id', ['options' => $prescriptions]);
           // echo $this->Form->control('date_added');
           // echo $this->Form->control('user_id', ['options' => $users]);
            
              echo '<div class="col-md-12">';
              
            echo $this->Form->control('description',['label'=>'Description','class'=>'form-control',
                'class'=>'form-control','required','type'=>'textarea']);
            echo '</div>';
          
          //  echo $this->Form->control('status');
        ?>
    </fieldset>
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
