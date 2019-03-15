<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pharmacist[]|\Cake\Collection\CollectionInterface $pharmacists
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacist'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medicines'), ['controller' => 'Medicines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medicine'), ['controller' => 'Medicines', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacists index large-9 medium-8 columns content">
    <h3><?= __('Pharmacists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacists as $pharmacist): ?>
            <tr>
                <td><?= $this->Number->format($pharmacist->id) ?></td>
                <td><?= $pharmacist->has('user') ? $this->Html->link($pharmacist->user->id, ['controller' => 'Users', 'action' => 'view', $pharmacist->user->id]) : '' ?></td>
                <td><?= h($pharmacist->name) ?></td>
                <td><?= h($pharmacist->address) ?></td>
                <td><?= h($pharmacist->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacist->id)]) ?>
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
