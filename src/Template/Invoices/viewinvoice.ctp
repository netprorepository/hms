<?php $userrole = $this->request->getSession()->read('usersroles');?> 
<section class="content">
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> Patient Invoice</h3>
        </div>

<!-- Content Wrapper. Contains page content -->
  <div >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice
        <small><?= $invoice->patient->uniquid ?> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>

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
            Email: info@precisiohms.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?= $invoice->has('patient') ? $this->Html->link($invoice->patient->name, 
                    ['controller' => 'Patients', 'action' => 'viewpatient', $invoice->patient->id]) : '' ?></strong><br>
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
               <td><?=$invoice->invoiceid ?></td>
                <td><?= $invoice->has('patient') ? $this->Html->link($invoice->patient->name, ['controller' => 'Patients', 'action' => 'viewpatient', $invoice->patient->id]) : '' ?></td>
                <td><?= h($invoice->title) ?></td>
                <td><?= h($invoice->description) ?></td>
                <td>₦<?= $this->Number->format($invoice->amount) ?></td>
                <td><?= h(date('Y-m-d', strtotime($invoice->created_date))) ?></td>
                <td <?php if($invoice->status=='Paid'){echo 'class="label-success"';}else{echo 'class="label-warning"';} ?> ><?= h($invoice->status) ?></td>
                <td><?= $invoice->has('user') ? $this->Html->link($invoice->user->fname, ['controller' => 'Users', 'action' => 'view', $invoice->user->id]) : '' ?></td>
                
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
          <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

<!--          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>-->
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

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
            <?= $this->Html->link(__(' Print'), ['controller' => 'Invoices', 'action' => 'printinvoice',$invoice->id],
          ['class'=>'btn btn-default fa fa-credit-print','target'=>'blank'])?>
  <!--           <a href="viewinvoice/"<?=$invoice->id?> target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
         <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> 
          </button>-->
          <?php if($userrole['id'] == 6){ if($invoice->status=='Unpaid'){ 
              echo $this->Html->link(__(' Set As Paid'), ['controller' => 'Invoices', 'action' => 'updateinvoice',$invoice->id,'Paid'],
          ['class'=>'btn btn-success pull-right fa fa-credit-card']);}
          
         else {
             echo $this->Html->link(__(' Set As Unpaid'), ['controller' => 'Invoices', 'action' => 'updateinvoice',$invoice->id,'Unpaid'],
          ['class'=>'btn btn-success pull-right fa fa-credit-card']); 
          }
          }
          ?>
<!--          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>-->
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
  </div>
        <!-- /.box -->
    </div>
    </div>
</section> 
  
  