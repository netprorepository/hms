<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Userlogin[]|\Cake\Collection\CollectionInterface $userlogins
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Userlogin'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userlogins index large-9 medium-8 columns content">
    <h3><?= __('Userlogins') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logintime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logouttime') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userlogins as $userlogin): ?>
            <tr>
                <td><?= $this->Number->format($userlogin->id) ?></td>
                <td><?= $userlogin->has('user') ? $this->Html->link($userlogin->user->id, ['controller' => 'Users', 'action' => 'view', $userlogin->user->id]) : '' ?></td>
                <td><?= h($userlogin->logintime) ?></td>
                <td><?= h($userlogin->logouttime) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userlogin->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userlogin->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userlogin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userlogin->id)]) ?>
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
