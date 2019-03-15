<section class="content-header">
  <h1>
    New Diagnosis Type
  </h1>
</section><!--/end section-->
<section class="content">
            
    <?= $this->Form->create($diagnosistype) ?>
    <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">New Diagnosis Type</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    
    <fieldset>
       
        <?php
          echo '<div class="col-md-6">';
            echo $this->Form->control('name',['label'=>'Name','class'=>'form-control']);
              echo '</div>';
            
              echo '<div class="col-md-6">';
            echo $this->Form->control('cost',['label'=>'Cost','class'=>'form-control']);
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