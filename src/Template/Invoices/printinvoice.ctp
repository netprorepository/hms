<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
            <i class="fa fa-globe"></i> Precisio HMS
            <small class="pull-right">Date: <?=date('d/M/Y')?></small>
          </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
     <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Precisio HMS.</strong><br>
            29 Umaru Dikko Street<br>
            Jabi Abuja<br>
            Phone: (804) 123-5432<br>
            Email: info@hms.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?= $invoice->patient->name ?></strong><br>
            <?= $invoice->patient->address ?><br>
           
            Phone:  <?= $invoice->patient->phone ?><br>
            Email:  <?= $invoice->patient->emailaddress ?><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b><?= $invoice->patient->uniquid ?></b><br>
          <br>
          
          <b>Payment Due:</b> <?= h(date('Y-m-d', strtotime($invoice->created_date))) ?><br>
          <b>Account:</b> 968-34567
        </div>
        <!-- /.col -->
      </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
         <table class="table table-striped">
            <thead>
            <tr>
           
            <th> ID</th>
            <th>Patient</th>
            <th>Invoice Title</th>
           <th>Description</th>
<!--           <th>Date Of Birth</th>-->
          <th>Amount</th>
          <th>Date</th>
          <th>Status</th>
          <th>Created By</th>
         
            
        </tr>
            </thead>
            <tbody>
           
           <tr>
               <td>HMS/INV/<?= $this->Number->format($invoice->id) ?></td>
                <td><?= $invoice->patient->name?></td>
                <td><?= h($invoice->title) ?></td>
                <td><?= h($invoice->description) ?></td>
                <td>₦<?= $this->Number->format($invoice->amount) ?></td>
                <td><?= h(date('Y-m-d', strtotime($invoice->created_date))) ?></td>
                <td <?php if($invoice->status=='Paid'){echo 'class="label-success"';}else{echo 'class="label-warning"';} ?> ><?= h($invoice->status) ?></td>
                <td><?=$invoice->user->fname?></td>
                
            </tr>
            </tbody>
          </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Payment Methods:</p> The Payment Method Used
<!--        <img src="../../dist/img/credit/visa.png" alt="Visa">
        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="../../dist/img/credit/american-express.png" alt="American Express">
        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">-->

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
         <?= h($invoice->description) ?>.
        </p>
      </div>
      <!-- /.col -->
       <div class="col-xs-6">
          <p class="lead">Amount Due <?= h(date('Y-m-d', strtotime($invoice->created_date))) ?></p>

          <div class="table-responsive">
            <table class="table">
             
              <tr>
                <th>Total:</th>
                <td>₦<?= $this->Number->format($invoice->amount) ?></td>
              </tr>
            </table>
          </div>
        </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
