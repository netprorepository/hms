<section class="content">
         <?php $userrole = $this->request->getSession()->read('usersroles');?>   
  <?= $this->Form->create(null,['url'=>['controller'=>'Invoices','action'=>'searchinvoice']]) ?>
    <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Search Invoices</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
     
    <fieldset>
      
        <?php
            echo '<div class="col-md-4">';
            echo $this->Form->control('startdate',['label'=>'Start Date','class'=>'form-control','type'=>'text',
                'class'=>'form-control','id'=>'datepicker']);
             echo '</div>';
           echo '<div class="col-md-4">';
            echo $this->Form->control('enddate',['label'=>'Start Date','class'=>'form-control','type'=>'text',
                'class'=>'form-control','id'=>'enddate']);
             echo '</div>';
             
              echo '<div class="col-md-4">';
             $status = ['Paid'=>'Paid', 'Unpaid'=>'Unpaid'];
            echo $this->Form->control('status', ['options' => $status,'class'=>'form-control']);
             echo '</div>';
            
        ?>
    <br /> <br />
            <div class="col-md-12">
                 <br /> <br />
    <?= $this->Form->button('Search',['class'=>'btn btn-primary pull-right']) ?>
                </div><br /> <br />
            
             <br /> <br />
    <?= $this->Form->end() ?> <br /> <br />
  </div> <br /> <br />
        <!-- /.box -->
   
        
        <div class="box">
    <div class="box-header">
        <h3 class="box-title"> Invoices</h3>
    </div> 
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
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
<!--         <th>Actions</th>-->
            
        </tr>
        </thead>
        
         <tbody>
            <?php $total = 0; foreach ($invoices as $invoice): ?>
            <tr>
                <td><?=$invoice->invoiceid ?></td>
                <td><?= $invoice->has('patient') ? $this->Html->link($invoice->patient->name, ['controller' => 'Patients', 'action' => 'viewpatient', $invoice->patient->id]) : '' ?></td>
                <td><?= h($invoice->title) ?></td>
                <td><?= h($invoice->description) ?></td>
                <td>₦<?= $this->Number->format($invoice->amount) ?></td>
                <td><?= h(date('Y-m-d H:i a', strtotime($invoice->created_date))) ?></td>
                <td <?php $total = $total + $invoice->amount;
                if($invoice->status=='Paid'){echo 'class="label-success"';}else{echo 'class="label-warning"';} ?> ><?= h($invoice->status) ?></td>
                <td><?= $invoice->has('user') ? $this->Html->link($invoice->user->fname, ['controller' => 'Users', 'action' => 'view', $invoice->user->id]) : '' ?></td>
<!--                <td class="actions">
                    <?= $this->Html->link(__(' '), ['action' => 'viewinvoice', $invoice->id],['class'=>'fa fa-search-plus view','title'=>'view invoice']) ?>
                    <?= $this->Html->link(__(' '), ['action' => 'editinvoice', $invoice->id],['class'=>'fa fa-edit','title'=>'edit invoice']) ?>
                   
   <?php if($userrole['id'] == 1) { echo $this->Form->postLink(__(' '), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id),'class'=>'fa fa-trash trash ic','title'=>'delete invoice']);} ?>
                </td>-->
            </tr>
            <?php endforeach; ?>
        </tbody>
       
    </table>
       <b>  Total : ₦<?= $this->Number->format($total) ?></b>
<!--    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>-->
</div>
     </div>
        
</section>  

