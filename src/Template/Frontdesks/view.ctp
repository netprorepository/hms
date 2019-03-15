<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frontdesk $frontdesk
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Frontdesk'), ['action' => 'edit', $frontdesk->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Frontdesk'), ['action' => 'delete', $frontdesk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frontdesk->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Frontdesks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frontdesk'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="frontdesks view large-9 medium-8 columns content">
    <h3><?= h($frontdesk->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $frontdesk->has('user') ? $this->Html->link($frontdesk->user->id, ['controller' => 'Users', 'action' => 'view', $frontdesk->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($frontdesk->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($frontdesk->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($frontdesk->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= $frontdesk->has('department') ? $this->Html->link($frontdesk->department->name, ['controller' => 'Departments', 'action' => 'view', $frontdesk->department->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Profile') ?></th>
            <td><?= h($frontdesk->profile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin') ?></th>
            <td><?= $frontdesk->has('admin') ? $this->Html->link($frontdesk->admin->name, ['controller' => 'Admins', 'action' => 'view', $frontdesk->admin->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($frontdesk->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($frontdesk->created_date) ?></td>
        </tr>
    </table>
</div>
