 <?php $userrole = $this->request->getSession()->read('usersroles');?>
 <section class="content-header">
    <h1>Patient Treatment Summary Page for :  <?=$patient->name.' (ID : '.$patient->uniquid.')'?></h1>
</section>
 <section class="content">
    <div class="row">
        <!-- left column -->
     
        <div class="col-md-12">
            <div class="box box-info collapsed-box">
                <div class="box-header">
                    <h3 class="box-title">Invoices
                        <small>Patient's Invoices</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body pad">
                   <table id="example1" class="table table-bordered table-striped" >
        <thead>
        <tr>
           
            <th> ID</th>
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
            <?php foreach ($patient->invoices as $invoice): ?>
            <tr>
                <td><?=$invoice->invoiceid ?></td>
                <td><?= h($invoice->title) ?></td>
                <td><?= h($invoice->description) ?></td>
                <td>₦<?= $this->Number->format($invoice->amount) ?></td>
                <td><?= h(date('Y-m-d H:i a', strtotime($invoice->created_date))) ?></td>
                <td <?php if($invoice->status=='Paid'){echo 'class="label-success"';}else{echo 'class="label-warning"';} ?> ><?= h($invoice->status) ?></td>
                <td><?= $invoice->has('user') ? $this->Html->link($invoice->user->fname, ['controller' => 'Users', 'action' => 'view', $invoice->user->id]) : '' ?></td>
               
            </tr>
            <?php endforeach; ?>
        </tbody>
        
    </table>
                </div>
                <!-- /.box-header -->
               
            </div><!--/end box-info-->

            <div class="box box-info collapsed-box">
                <div class="box-header">
                    <h3 class="box-title">Admission
                        <small>Patients's Admission History</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                  <div class="box-body pad">
                <table id="xample" class="table table-bordered table-striped">
        <thead>
        <tr>
          
          <th>Request By</th>
          <th>Admission Date</th>
          <th>Duration</th>
           <th>Admitted By</th>
         <th>Actions</th>
            <?= $this->Flash->render() ?>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($patient->admissions as $admitrequest): ?>
            <tr>
         
        
               <?= $this->Form->create(null,['url'=>['controller'=>'Admissions','action'=>'dischargeadmission']]) ?>
            
                <td><?= h($admitrequest->user->fname) ?></td>
                <td><?= h(date('Y-m-d H:m A', strtotime($admitrequest->admissiondate))) ?></td>
                 <td><?php $datediff = time() - strtotime($admitrequest->admissiondate);
                 echo round($datediff/(60*60*24)); ?> Day(s)</td>
             
                <?= $this->Form->control('admission_id', ['type' => 'hidden','value'=>$admitrequest->id])?>
                
               
                 <td><?= $admitrequest->admittedby?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Discharge'), ['controller'=>'Admissions','action' => 'dischargeadmission',$admitrequest->id],['class'=>'btn btn-block btn-primary']) ?>
                   
              
                  <?= $this->Form->end() ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
                  </div>
            </div><!--/end box-info-->

            <div class="box box-info collapsed-box">
                <div class="box-header">
                    <h3 class="box-title">Treatments
                        <small>Treatments Given</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                <table id="xample" class="table table-bordered table-striped">
        <thead>
            <tr>
                
                <th ><?= $this->Paginator->sort('Staff') ?></th>
                <th><?= $this->Paginator->sort('Treatment Date') ?></th>
                <th><?= $this->Paginator->sort('treatment Given') ?></th>
              
                <th><?= $this->Paginator->sort('comment') ?></th>
                
              
            </tr>
        </thead>
        <tbody>
            <?php  //debug(json_encode($patient->consultations, JSON_PRETTY_PRINT)); exit;
            foreach ($patient->consultations as $consultations): 
               
     foreach ($consultations->treatments as $treatment):
                
                ?>
            <tr>
                
                <td><?= $treatment->has('user') ? $this->Html->link($treatment->user->fname, ['controller' => 'Users', 'action' => 'view', $treatment->user->id]) : '' ?></td>
                <td><?= (date('Y-m-d', strtotime($treatment->treatedon))) ?></td>
                <td><?= ($treatment->treatmentgiven) ?></td>
            
                <td><?= ($treatment->comment) ?></td>
                              
            </tr>
            <?php endforeach;
        endforeach;?>
        </tbody>
    </table>
                </div>
            </div><!--/end box-info-->
  
        </div><!--end col-md-12-->
 
    </div><!--/end row-->
</section>  
