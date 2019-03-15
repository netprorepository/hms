<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frontdesk[]|\Cake\Collection\CollectionInterface $frontdesks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Frontdesk'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="frontdesks index large-9 medium-8 columns content">
    <h3><?= __('Frontdesks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('department_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('admin_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($frontdesks as $frontdesk): ?>
            <tr>
                <td><?= $this->Number->format($frontdesk->id) ?></td>
                <td><?= $frontdesk->has('user') ? $this->Html->link($frontdesk->user->id, ['controller' => 'Users', 'action' => 'view', $frontdesk->user->id]) : '' ?></td>
                <td><?= h($frontdesk->name) ?></td>
                <td><?= h($frontdesk->address) ?></td>
                <td><?= h($frontdesk->phone) ?></td>
                <td><?= $frontdesk->has('department') ? $this->Html->link($frontdesk->department->name, ['controller' => 'Departments', 'action' => 'view', $frontdesk->department->id]) : '' ?></td>
                <td><?= h($frontdesk->profile) ?></td>
                <td><?= h($frontdesk->created_date) ?></td>
                <td><?= $frontdesk->has('admin') ? $this->Html->link($frontdesk->admin->name, ['controller' => 'Admins', 'action' => 'view', $frontdesk->admin->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $frontdesk->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $frontdesk->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $frontdesk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frontdesk->id)]) ?>
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
