<section class="content-header">
<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
  <h1>
    Patient Registration
  </h1>
</section><!--/end section-->
<section class="content">
  <form>
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Personal Information</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="">
      <div class="row">
        <div class="col-md-4">
          <div class="input text required">
            <label for="surname">Surname</label>
            <input type="text" name="surname" class="form-control" required="required" maxlength="250" id="surname">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input text required">
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" class="form-control" required="required" maxlength="250" id="firstname">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input text required">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" required="required" maxlength="250" id="age">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input text required">
            <label for="datepicker">Date Of Birth</label>
            <input type="text" name="birth_date" class="form-control" id="datepicker" required="required" maxlength="64">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input select required">
            <label for="sex">Gender</label>
            <select name="sex" class="form-control" required="required" id="sex">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="input text required">
            <label for="tribe">Tribe</label>
            <input type="text" name="tribe" class="form-control" required="required" maxlength="250" id="tribe">
          </div>
        </div>
        <div class="col-md-6">
          <div class="input text required">
            <label for="occupation">Occupation</label>
            <input type="text" name="accupation" class="form-control" required="required" maxlength="250" id="occupation">
          </div>
        </div>
        <div class="col-md-6">
          <div class="input text required">
            <label for="religion">Religion</label>
            <input type="text" name="religion" class="form-control" required="required" maxlength="250" id="religion">
          </div>
        </div>
        <div class="col-md-12">
          <div class="input textarea required">
            <label for="address">Address</label>
            <textarea name="address" class="form-control" required="required" maxlength="250" id="address" rows="5"></textarea>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div><!--/end box-->

  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">NOK Information</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="">
      <div class="row">
        <div class="col-md-4">
          <div class="input text required">
            <label for="nokname">NOK Name</label>
            <input type="text" name="nokname" class="form-control" required="required" maxlength="250" id="nokname">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input text required">
            <label for="nokphone">NOK Phone</label>
            <input type="text" name="nokphone" class="form-control" required="required" maxlength="250" id="nokphone">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input text required">
            <label for="nokrelation">Relationship</label>
            <input type="text" name="nokrelation" class="form-control" required="required" maxlength="250" id="nokrelation">
          </div>
        </div>
        <div class="col-md-12">
          <div class="input textarea required">
            <label for="nokaddress">NOK Address</label>
            <textarea name="nokaddress" class="form-control" required="required" maxlength="250" id="nokaddress" rows="5"></textarea>
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
