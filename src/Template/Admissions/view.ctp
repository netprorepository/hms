<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Admission $admission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Admission'), ['action' => 'edit', $admission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Admission'), ['action' => 'delete', $admission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Admissions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Wards'), ['controller' => 'Wards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ward'), ['controller' => 'Wards', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Beds'), ['controller' => 'Beds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bed'), ['controller' => 'Beds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="admissions view large-9 medium-8 columns content">
    <h3><?= h($admission->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $admission->has('patient') ? $this->Html->link($admission->patient->name, ['controller' => 'Patients', 'action' => 'view', $admission->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ward') ?></th>
            <td><?= $admission->has('ward') ? $this->Html->link($admission->ward->id, ['controller' => 'Wards', 'action' => 'view', $admission->ward->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bed') ?></th>
            <td><?= $admission->has('bed') ? $this->Html->link($admission->bed->bed_number, ['controller' => 'Beds', 'action' => 'view', $admission->bed->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dischargedate') ?></th>
            <td><?= h($admission->dischargedate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $admission->has('user') ? $this->Html->link($admission->user->id, ['controller' => 'Users', 'action' => 'view', $admission->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($admission->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admissiondate') ?></th>
            <td><?= h($admission->admissiondate) ?></td>
        </tr>
    </table>
</div>
