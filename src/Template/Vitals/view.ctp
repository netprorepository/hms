<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vital $vital
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vital'), ['action' => 'edit', $vital->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vital'), ['action' => 'delete', $vital->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vital->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vitals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vital'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vitals view large-9 medium-8 columns content">
    <h3><?= h($vital->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $vital->has('patient') ? $this->Html->link($vital->patient->name, ['controller' => 'Patients', 'action' => 'view', $vital->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bp') ?></th>
            <td><?= h($vital->bp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resp') ?></th>
            <td><?= h($vital->resp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vital->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Temp') ?></th>
            <td><?= $this->Number->format($vital->temp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pulse') ?></th>
            <td><?= $this->Number->format($vital->pulse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($vital->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Added') ?></th>
            <td><?= h($vital->date_added) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($vital->description)); ?>
    </div>
</div>
