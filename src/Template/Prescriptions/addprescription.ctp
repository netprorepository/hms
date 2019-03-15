<?php $userrole = $this->request->getSession()->read('usersroles');?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Prescription</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?= $this->Form->create($prescription) ?>
                <!-- textarea -->
                <div class="box-body pad">
                    <label>Medication</label>
                   <?= $this->Form->control('medication',['label'=>false,'class'=>'ckeditor',
                         'row'=>10,'cols'=>80])?>

                </div>
                <!-- textarea -->
                <div class="box-body pad">
                    <label>Description</label>
                   <?= $this->Form->control('description',['label'=>false,'class'=>'ckeditor',
                         'row'=>10,'cols'=>80])?>
<!--                    <textarea name="description" class="ckeditor" rows="10" cols="80"></textarea>-->
                </div>
                <!-- textarea -->
                <?php if($userrole['id'] == 4){?>
                <div class="box-body pad">
                    <label>Medication from Pharmacist</label>
               <?= $this->Form->control('medication_from_pharmacist',['label'=>false,'class'=>'ckeditor',
                         'row'=>10,'cols'=>80])?>      
<!--                    <textarea name="medication_from_pharmacist" class="ckeditor" rows="10" cols="80"></textarea>-->
                </div>
                <?php } ?>
                <?= $this->Form->button('Submit',['class'=>'btn btn-primary pull-right']) ?>
              <?= $this->Form->end() ?>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </row>
</section>
