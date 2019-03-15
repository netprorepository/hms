<?php $userrole = $this->request->getSession()->read('usersroles');?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manage Invoices</h3>
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
         <th>Actions</th>
            
        </tr>
        </thead>
        
         <tbody>
            <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td><?=$invoice->invoiceid ?></td>
                <td><?= $invoice->has('patient') ? $this->Html->link($invoice->patient->name, ['controller' => 'Patients', 'action' => 'viewpatient', $invoice->patient->id]) : '' ?></td>
                <td><?= h($invoice->title) ?></td>
                <td><?= h($invoice->description) ?></td>
                <td>₦<?= $this->Number->format($invoice->amount) ?></td>
                <td><?= h(date('Y-m-d H:i a', strtotime($invoice->created_date))) ?></td>
                <td <?php if($invoice->status=='Paid'){echo 'class="label-success"';}else{echo 'class="label-warning"';} ?> ><?= h($invoice->status) ?></td>
                <td><?php if($userrole['id'] == 1) { 
                echo $invoice->has('user') ? $this->Html->link($invoice->user->fname, 
                ['controller' => 'Users', 'action' => 'view', $invoice->user->id]) : '';}
                else{echo $invoice->user->fname; }?></td>
                <td class="actions">
                    <?= $this->Html->link(__(' '), ['action' => 'viewinvoice', $invoice->id],['class'=>'fa fa-search-plus view','title'=>'view invoice']) ?>
                    <?= $this->Html->link(__(' '), ['action' => 'editinvoice', $invoice->id],['class'=>'fa fa-edit','title'=>'edit invoice']) ?>
                   
   <?php if($userrole['id'] == 1) { echo $this->Form->postLink(__(' '), ['action' => 'delete', $invoice->id],
           ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id),
               'class'=>'fa fa-trash trash ic','title'=>'delete invoice']);
   
   } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        
    </table>
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

