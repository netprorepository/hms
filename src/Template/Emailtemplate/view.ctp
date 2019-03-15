<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Emailtemplate $emailtemplate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Emailtemplate'), ['action' => 'edit', $emailtemplate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Emailtemplate'), ['action' => 'delete', $emailtemplate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emailtemplate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Emailtemplate'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emailtemplate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="emailtemplate view large-9 medium-8 columns content">
    <h3><?= h($emailtemplate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Task') ?></th>
            <td><?= h($emailtemplate->task) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= h($emailtemplate->subject) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Body') ?></th>
            <td><?= h($emailtemplate->body) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin') ?></th>
            <td><?= $emailtemplate->has('admin') ? $this->Html->link($emailtemplate->admin->name, ['controller' => 'Admins', 'action' => 'view', $emailtemplate->admin->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($emailtemplate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($emailtemplate->created_date) ?></td>
        </tr>
    </table>
</div>
