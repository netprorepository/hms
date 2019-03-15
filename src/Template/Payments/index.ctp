<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Accountant</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Purpose</th>
            <th>Invoice Title</th>
            <th>Patient</th>
            <th>Mode</th>
            <th>Description</th>
            <th>Amount</th>
           <th>Date</th>
<!--            <th></th>-->
        </tr>
        </thead>
        <tbody>
            <?php $total = 0; foreach ($payments as $payment): $total = $total + $payment->amount; ?>
            <tr>
                <td><?= $this->Number->format($payment->id) ?></td>
                <td><?= h($payment->payment_for) ?></td>
                <td><?= $payment->has('invoice') ? $this->Html->link($payment->invoice->title, ['controller' => 'Invoices', 'action' => 'viewinvoice', $payment->invoice->id]) : '' ?></td>
                <td><?= $payment->has('patient') ? $this->Html->link($payment->patient->name, ['controller' => 'Patients', 'action' => 'view', $payment->patient->id]) : '' ?></td>
                <td><?= h($payment->payment_method) ?></td>
                <td><?= h($payment->description) ?></td>
                <td><?= $this->Number->format($payment->amount) ?></td>
                <td><?= h(date('Y-m-d H:m A', strtotime($payment->created_date))) ?></td>
<!--                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $payment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
                </td>-->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
         <b>  Total : ₦<?= $this->Number->format($total) ?></b>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
