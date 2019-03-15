<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountant[]|\Cake\Collection\CollectionInterface $accountants
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Accountant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accountants index large-9 medium-8 columns content">
    <h3><?= __('Accountants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('admin_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accountants as $accountant): ?>
            <tr>
                <td><?= $this->Number->format($accountant->id) ?></td>
                <td><?= $accountant->has('user') ? $this->Html->link($accountant->user->id, ['controller' => 'Users', 'action' => 'view', $accountant->user->id]) : '' ?></td>
                <td><?= h($accountant->name) ?></td>
                <td><?= h($accountant->address) ?></td>
                <td><?= h($accountant->phone) ?></td>
                <td><?= $accountant->has('admin') ? $this->Html->link($accountant->admin->name, ['controller' => 'Admins', 'action' => 'view', $accountant->admin->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $accountant->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $accountant->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $accountant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountant->id)]) ?>
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
