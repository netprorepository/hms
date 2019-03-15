<?php $userrole = $this->request->getSession()->read('usersroles');?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Treatment Plan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <?= $this->Form->create($treatmentplan) ?>
    <fieldset>
<!--        <legend><?= __('Add Treatmentplan') ?></legend>-->
     
        <div class="box-body pad">
                    <label>Treatment Plan</label>
               <?= $this->Form->control('plan',['label'=>false,'class'=>'ckeditor',
                         'row'=>10,'cols'=>80])?>      
                </div>  
        
        <div class="box-body pad">
                    <label>Comment</label>
               <?= $this->Form->control('comment',['label'=>false,'class'=>'ckeditor',
                         'row'=>10,'cols'=>80])?>      
                </div>   
    </fieldset>
    <?= $this->Form->button('Submit',['class'=>'btn btn-primary pull-right']) ?>
              <?= $this->Form->end() ?>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </row>
</section>
