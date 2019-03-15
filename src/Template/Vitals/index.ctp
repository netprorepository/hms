<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vital[]|\Cake\Collection\CollectionInterface $vitals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vital'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vitals index large-9 medium-8 columns content">
    <h3><?= __('Vitals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_added') ?></th>
                <th scope="col"><?= $this->Paginator->sort('temp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pulse') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vitals as $vital): ?>
            <tr>
                <td><?= $this->Number->format($vital->id) ?></td>
                <td><?= $vital->has('patient') ? $this->Html->link($vital->patient->name, ['controller' => 'Patients', 'action' => 'view', $vital->patient->id]) : '' ?></td>
                <td><?= h($vital->date_added) ?></td>
                <td><?= $this->Number->format($vital->temp) ?></td>
                <td><?= $this->Number->format($vital->pulse) ?></td>
                <td><?= h($vital->bp) ?></td>
                <td><?= h($vital->resp) ?></td>
                <td><?= $this->Number->format($vital->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vital->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vital->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vital->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vital->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
