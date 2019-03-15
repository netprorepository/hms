<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blooddonor $blooddonor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Blooddonor'), ['action' => 'edit', $blooddonor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blooddonor'), ['action' => 'delete', $blooddonor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blooddonor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blooddonors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blooddonor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nurses'), ['controller' => 'Nurses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nurse'), ['controller' => 'Nurses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blooddonors view large-9 medium-8 columns content">
    <h3><?= h($blooddonor->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($blooddonor->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Blood Group') ?></th>
            <td><?= h($blooddonor->blood_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sex') ?></th>
            <td><?= h($blooddonor->sex) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($blooddonor->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($blooddonor->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($blooddonor->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nurse') ?></th>
            <td><?= $blooddonor->has('nurse') ? $this->Html->link($blooddonor->nurse->name, ['controller' => 'Nurses', 'action' => 'view', $blooddonor->nurse->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($blooddonor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age') ?></th>
            <td><?= $this->Number->format($blooddonor->age) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Donation Timestamp') ?></th>
            <td><?= h($blooddonor->last_donation_timestamp) ?></td>
        </tr>
    </table>
</div>
