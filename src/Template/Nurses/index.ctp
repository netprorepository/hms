<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nurse[]|\Cake\Collection\CollectionInterface $nurses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Nurse'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bedallotments'), ['controller' => 'Bedallotments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bedallotment'), ['controller' => 'Bedallotments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Beds'), ['controller' => 'Beds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bed'), ['controller' => 'Beds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blooddonors'), ['controller' => 'Blooddonors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blooddonor'), ['controller' => 'Blooddonors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nurses index large-9 medium-8 columns content">
    <h3><?= __('Nurses') ?></h3>
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
            <?php foreach ($nurses as $nurse): ?>
            <tr>
                <td><?= $this->Number->format($nurse->id) ?></td>
                <td><?= $nurse->has('user') ? $this->Html->link($nurse->user->id, ['controller' => 'Users', 'action' => 'view', $nurse->user->id]) : '' ?></td>
                <td><?= h($nurse->name) ?></td>
                <td><?= h($nurse->address) ?></td>
                <td><?= h($nurse->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nurse->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nurse->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nurse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nurse->id)]) ?>
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
