<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratorist[]|\Cake\Collection\CollectionInterface $laboratorists
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Laboratorist'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Diagnosisreports'), ['controller' => 'Diagnosisreports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Diagnosisreport'), ['controller' => 'Diagnosisreports', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="laboratorists index large-9 medium-8 columns content">
    <h3><?= __('Laboratorists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('admin_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($laboratorists as $laboratorist): ?>
            <tr>
                <td><?= $this->Number->format($laboratorist->id) ?></td>
                <td><?= $laboratorist->has('user') ? $this->Html->link($laboratorist->user->id, ['controller' => 'Users', 'action' => 'view', $laboratorist->user->id]) : '' ?></td>
                <td><?= h($laboratorist->name) ?></td>
                <td><?= h($laboratorist->address) ?></td>
                <td><?= h($laboratorist->phone) ?></td>
                <td><?= h($laboratorist->created_date) ?></td>
                <td><?= $laboratorist->has('admin') ? $this->Html->link($laboratorist->admin->name, ['controller' => 'Admins', 'action' => 'view', $laboratorist->admin->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $laboratorist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $laboratorist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $laboratorist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $laboratorist->id)]) ?>
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
