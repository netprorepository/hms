<?php $userrole = $this->request->getSession()->read('usersroles');?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Treatment</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <?= $this->Form->create($treatment) ?>
    <fieldset>
       
       
        <div class="box-body pad">
                    <label>Treatment Given</label>
               <?= $this->Form->control('treatmentgiven',['label'=>false,'class'=>'ckeditor',
                         'row'=>10,'cols'=>80,'required'])?>      
                </div>  
        
        <div class="box-body pad">
                    <label>Comment(optional)</label>
               <?= $this->Form->control('comment',['label'=>false,'class'=>'ckeditor',
                         'row'=>10,'cols'=>80])?>      
                </div>  
        
         <?php
            
         echo '<div class="box-body pad">';
            echo $this->Form->control('nexttreatmentdate',['label'=>'Next Treatment Date','class'=>'form-control','type'=>'text',
                'class'=>'form-control','id'=>'datepicker']);
             echo '</div>';
             
           
        ?>
        
    </fieldset>
    <?= $this->Form->button('Submit',['class'=>'btn btn-primary pull-right']) ?>
              <?= $this->Form->end() ?>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </row>
</section>
