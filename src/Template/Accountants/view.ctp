<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountant $accountant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Accountant'), ['action' => 'edit', $accountant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Accountant'), ['action' => 'delete', $accountant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accountants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accountant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accountants view large-9 medium-8 columns content">
    <h3><?= h($accountant->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $accountant->has('user') ? $this->Html->link($accountant->user->id, ['controller' => 'Users', 'action' => 'view', $accountant->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($accountant->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($accountant->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($accountant->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin') ?></th>
            <td><?= $accountant->has('admin') ? $this->Html->link($accountant->admin->name, ['controller' => 'Admins', 'action' => 'view', $accountant->admin->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($accountant->id) ?></td>
        </tr>
    </table>
</div>
