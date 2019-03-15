<body onload="window.print();">
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-4">
            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
                <span style="font-weight: bold;">
                  <center>
                    CLARETIAN UNIVERSITY WODDI HOSPITAL, OWERRI
                  </center>
                </span>
                <img class="profile-user-img img-responsive" src="../../dist/img/qrcode.png" alt="User profile picture" style="margin-top: 5px;">

                <h3 class="profile-username text-center" style="margin-bottom: 10px;"><?=$patient->name ?></h3>

                <!--p class="text-muted text-center">Software Engineer</p-->

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Patient #</b> <a class="pull-right"><?=$patient->uniquid ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Sex</b> <a class="pull-right"><?=$patient->sex ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="pull-right"><?=$patient->emailaddress ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone #</b> <a class="pull-right"><?=$patient->phone ?></a>
                  </li>
                </ul>
                <a href="#" class="btn  btn-block"><b>www.woddi.com</b></a>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
    </section>
  </div>
</body>