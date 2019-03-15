<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Userlogin $userlogin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Userlogin'), ['action' => 'edit', $userlogin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Userlogin'), ['action' => 'delete', $userlogin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userlogin->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Userlogins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Userlogin'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userlogins view large-9 medium-8 columns content">
    <h3><?= h($userlogin->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userlogin->has('user') ? $this->Html->link($userlogin->user->id, ['controller' => 'Users', 'action' => 'view', $userlogin->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userlogin->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logintime') ?></th>
            <td><?= h($userlogin->logintime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logouttime') ?></th>
            <td><?= h($userlogin->logouttime) ?></td>
        </tr>
    </table>
</div>
