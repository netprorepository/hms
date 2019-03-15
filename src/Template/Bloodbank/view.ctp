<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bloodbank $bloodbank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bloodbank'), ['action' => 'edit', $bloodbank->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bloodbank'), ['action' => 'delete', $bloodbank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bloodbank->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bloodbank'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bloodbank'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bloodbank view large-9 medium-8 columns content">
    <h3><?= h($bloodbank->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Blood Group') ?></th>
            <td><?= h($bloodbank->blood_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($bloodbank->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin') ?></th>
            <td><?= $bloodbank->has('admin') ? $this->Html->link($bloodbank->admin->name, ['controller' => 'Admins', 'action' => 'view', $bloodbank->admin->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bloodbank->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($bloodbank->created_date) ?></td>
        </tr>
    </table>
</div>
