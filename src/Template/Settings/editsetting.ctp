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
            <h3 class="box-title">Update System Settings</h3>
        </div>
    <?= $this->Form->create($setting) ?>
    <fieldset>
<!--        <legend><?= __('Edit Setting') ?></legend>-->
        <?php
         echo '<div class="col-md-4">';
            echo $this->Form->control('type',['label'=>'Type','class'=>'form-control']);
             echo '</div>';
              echo '<div class="col-md-4">';
            echo $this->Form->control('description',['label'=>'Description','class'=>'form-control']);
             echo '</div>';
              echo '<div class="col-md-4">';
            echo $this->Form->control('regfee',['label'=>'Registration Fee','class'=>'form-control']);
             echo '</div>';
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
