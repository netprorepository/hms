<section class="content-header">
  <h1>
    Patient Triage
  </h1>
</section><!--/end section-->
<section class="content">
  <form>
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">General</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="">
      <div class="row">
        <div class="col-md-4">
          <div class="input text required">
            <label for="temp">Temprature(Celcius)</label>
            <input type="text" name="temp" class="form-control" required="required" maxlength="250" id="temp">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input text required">
            <label for="pulse">Pulse(BPM)</label>
            <input type="text" name="pulse" class="form-control" required="required" maxlength="250" id="pulse">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input text required">
            <label for="bp">BP(mmHG)</label>
            <input type="text" name="bp" class="form-control" required="required" maxlength="250" id="bp">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input text required">
            <label for="resp">Respiratory Rate</label>
            <input type="number" name="resp" class="form-control" id="resp" required="required" maxlength="64">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input text required">
            <label for="weight">Weight(Kg)</label>
            <input type="number" name="weight" class="form-control" id="weight" required="required" maxlength="64">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input text required">
            <label for="height">Height(cm)</label>
            <input type="number" name="height" class="form-control" required="required" maxlength="250" id="height">
          </div>
        </div>
        <div class="col-md-12">
          <div class="input text required">
            <label for="bmi">BMI(kgm2)</label>
            <input type="number" name="bmi" class="form-control" required="required" maxlength="250" id="bmi" readonly>
          </div>
        </div>
        <!--div class="col-md-6">
          <div class="input text required">
            <label for="religion">Religion</label>
            <input type="text" name="religion" class="form-control" required="required" maxlength="250" id="religion">
          </div>
        </div-->
        <div class="col-md-12">
          <div class="input textarea required">
            <label for="description">Initial Case History</label>
            <textarea name="description" class="form-control" required="required" maxlength="250" id="description" rows="5"></textarea>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div><!--/end box-->

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
        <div class="col-md-6">
          <div class="input text">
            <label for="hcm">Head Circumference(cm)</label>
            <input type="number" name="hcm" class="form-control" required="required" maxlength="250" id="hcm">
          </div>
        </div>
        <div class="col-md-6">
          <div class="input text">
            <label for="length">Length(cm)</label>
            <input type="number" name="length" class="form-control" required="required" maxlength="250" id="length">
          </div>
        </div>
        <div class="col-md-6">
          <div class="input text">
            <label for="apgar1">Apgar Score (at 1 minute)</label>
            <input type="number" name="apgar1" class="form-control" required="required" maxlength="250" id="apgar1">
          </div>
        </div>
        <div class="col-md-6">
          <div class="input text">
            <label for="apgar2">Apgar Score (at 5 minutes)</label>
            <input type="number" name="apgar2" class="form-control" required="required" maxlength="250" id="apgar2">
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div><!--/end box-->
  <button type="button" class="btn btn-primary btn-lg">Save</button>
  </form>
</section><!--/end section-->
<script type="text/javascript">
  function calcBMI(){
    var w = document.getElementById('weight').value;
    var h = document.getElementById('height').value;
    console.log(w);
    var him = h/100;
    var bmi = document.getElementById('bmi');
    var den = him*2; 
    var wh = (w/den).toFixed(2); 
    bmi.value = wh;
  }
</script>