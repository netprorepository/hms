<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bedallotment $bedallotment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bedallotment'), ['action' => 'edit', $bedallotment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bedallotment'), ['action' => 'delete', $bedallotment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bedallotment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bedallotments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bedallotment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Beds'), ['controller' => 'Beds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bed'), ['controller' => 'Beds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bedallotments view large-9 medium-8 columns content">
    <h3><?= h($bedallotment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Bed') ?></th>
            <td><?= $bedallotment->has('bed') ? $this->Html->link($bedallotment->bed->id, ['controller' => 'Beds', 'action' => 'view', $bedallotment->bed->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $bedallotment->has('patient') ? $this->Html->link($bedallotment->patient->name, ['controller' => 'Patients', 'action' => 'view', $bedallotment->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discharge Timestamp') ?></th>
            <td><?= h($bedallotment->discharge_timestamp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $bedallotment->has('user') ? $this->Html->link($bedallotment->user->id, ['controller' => 'Users', 'action' => 'view', $bedallotment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bedallotment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Allotment Timestamp') ?></th>
            <td><?= h($bedallotment->allotment_timestamp) ?></td>
        </tr>
    </table>
</div>
