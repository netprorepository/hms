<section class="content-header">
  <h1>
    Patient Triage
  </h1>
</section><!--/end section-->

<section class="content">
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> New Patient Triage</h3>
        </div>
    <?= $this->Form->create($vital) ?>
    <fieldset>
        <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">General</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
        <!--legend><?= __('Add Vital') ?></legend-->
        <?php
        // echo '<div class="col-md-4">';
           // echo $this->Form->control('patient_id', ['options' => $patients]);
           // echo $this->Form->control('date_added');
           echo ' <div class="box-body" style="">
      <div class="row">';
           echo '<div class="col-md-3">';
            echo $this->Form->control('temp',['label'=>'Temperature(Celcius)','class'=>'form-control']);
            echo '</div>';

            echo '<div class="col-md-3">';
            echo $this->Form->control('pulse',['label'=>'Pulse(bpm)','class'=>'form-control']);
            echo '</div>';

            echo '<div class="col-md-3">';
            echo $this->Form->control('bp',['label'=>'BP(mmHg)','class'=>'form-control']);
            echo '</div>';

            echo '<div class="col-md-3">';
            echo $this->Form->control('resp',['label'=>'Respiratory Rate','class'=>'form-control']);
            echo '</div>';
            
            echo '<div class="col-md-4">';
            echo $this->Form->control('weight',['label'=>'Weight(Kg)','class'=>'form-control','id'=>'weight',
                 'onChange'=>'calcBMI()']);
            echo '</div>';
            
            echo '<div class="col-md-4">';
            echo $this->Form->control('height',['label'=>'Height(cm)','class'=>'form-control','id'=>'height',
                'onChange'=>'calcBMI()']);
            echo '</div>';
            
            echo '<div class="col-md-4">';
            echo $this->Form->control('bmi',['label'=>'Bmi(Kg/m)','class'=>'form-control','id'=>'bmi','readonly']);
            echo '</div>';

            echo '<div class="col-md-12">';
            echo $this->Form->control('description',['label'=>'Initial Case History','class'=>'form-control','type'=>'textarea']);
            echo '</div></div></div></div>';

            
           // echo $this->Form->control('status');
        ?>
        </div>
          <div class="box box-default  collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title">For Babies</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="">
      <div class="row">
          <?php 
           echo '<div class="col-md-3">';
            echo $this->Form->control('hcm',['label'=>'Head Circumference(cm)','class'=>'form-control']);
            echo '</div>';
            
             echo '<div class="col-md-3">';
            echo $this->Form->control('blength',['label'=>'Length(cm)','class'=>'form-control']);
            echo '</div>';
            
            echo '<div class="col-md-3">';
            echo $this->Form->control('apgar1',['label'=>'Apgar Score (at 1 minute)','class'=>'form-control']);
            echo '</div>';
            
             echo '<div class="col-md-3">';
            echo $this->Form->control('apgar2',['label'=>'Apgar Score (at 5 minutes)','class'=>'form-control']);
            echo '</div>';
          
          ?>
      
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div><!--/end box-->
            
            
            
    </fieldset>
   <br /> <br />
            <div class="col-md-12">
    <?= $this->Form->button('Submit',['class'=>'btn btn-primary btn-lg pull-right']) ?>
                </div><br /> <br />
            
             <br /> <br />
    <?= $this->Form->end() ?>
  </div>
        <!-- /.box -->
    </div>
    </div>
</section>  
<script type="text/javascript">
  function calcBMI(){
    var w = document.getElementById('weight').value;
    var h = document.getElementById('height').value;
   // console.log(w);
    var him = h/100;
    var bmi = document.getElementById('bmi');
    var den = him*2; 
    var wh = (w/den).toFixed(2); 
    bmi.value = wh;
    //alert(bmi);
  }
</script>
