<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Emailtemplate[]|\Cake\Collection\CollectionInterface $emailtemplate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Emailtemplate'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="emailtemplate index large-9 medium-8 columns content">
    <h3><?= __('Emailtemplate') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('task') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                <th scope="col"><?= $this->Paginator->sort('body') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('admin_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emailtemplate as $emailtemplate): ?>
            <tr>
                <td><?= $this->Number->format($emailtemplate->id) ?></td>
                <td><?= h($emailtemplate->task) ?></td>
                <td><?= h($emailtemplate->subject) ?></td>
                <td><?= h($emailtemplate->body) ?></td>
                <td><?= h($emailtemplate->created_date) ?></td>
                <td><?= $emailtemplate->has('admin') ? $this->Html->link($emailtemplate->admin->name, ['controller' => 'Admins', 'action' => 'view', $emailtemplate->admin->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $emailtemplate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emailtemplate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emailtemplate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emailtemplate->id)]) ?>
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
