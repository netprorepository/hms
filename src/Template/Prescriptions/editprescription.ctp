<?php $userrole = $this->request->getSession()->read('usersroles');?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Update Prescription</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?= $this->Form->create($prescription) ?>
                <!-- textarea -->
                <div class="box-body pad">
                    <label>Medication</label>
                    <textarea name="medication" class="ckeditor" rows="10" cols="80" <?php if($userrole['id'] == 4){echo 'disabled';} ?>><?=$prescription->medication?></textarea>
                </div>
                <!-- textarea -->
                <div class="box-body pad">
                    <label>Description</label>
                    <textarea name="description" class="ckeditor" rows="10" cols="80" <?php if($userrole['id'] == 4){echo 'disabled';} ?>><?=$prescription->description?></textarea>
                </div>
                <!-- textarea -->
                <?php if($userrole['id'] == 4){?>
                <div class="box-body pad">
                    <label>Medication from Pharmacist</label>
                    <textarea name="medication_from_pharmacist" class="ckeditor" rows="10" cols="80"><?=$prescription->medication_from_pharmacist?></textarea>
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
