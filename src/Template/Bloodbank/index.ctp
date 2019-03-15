<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bloodbank[]|\Cake\Collection\CollectionInterface $bloodbank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bloodbank'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bloodbank index large-9 medium-8 columns content">
    <h3><?= __('Bloodbank') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('blood_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('admin_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bloodbank as $bloodbank): ?>
            <tr>
                <td><?= $this->Number->format($bloodbank->id) ?></td>
                <td><?= h($bloodbank->blood_group) ?></td>
                <td><?= h($bloodbank->status) ?></td>
                <td><?= h($bloodbank->created_date) ?></td>
                <td><?= $bloodbank->has('admin') ? $this->Html->link($bloodbank->admin->name, ['controller' => 'Admins', 'action' => 'view', $bloodbank->admin->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bloodbank->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bloodbank->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bloodbank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bloodbank->id)]) ?>
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
