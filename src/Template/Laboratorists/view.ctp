<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratorist $laboratorist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Laboratorist'), ['action' => 'edit', $laboratorist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Laboratorist'), ['action' => 'delete', $laboratorist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $laboratorist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Laboratorists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Laboratorist'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Diagnosisreports'), ['controller' => 'Diagnosisreports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Diagnosisreport'), ['controller' => 'Diagnosisreports', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="laboratorists view large-9 medium-8 columns content">
    <h3><?= h($laboratorist->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $laboratorist->has('user') ? $this->Html->link($laboratorist->user->id, ['controller' => 'Users', 'action' => 'view', $laboratorist->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($laboratorist->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($laboratorist->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($laboratorist->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin') ?></th>
            <td><?= $laboratorist->has('admin') ? $this->Html->link($laboratorist->admin->name, ['controller' => 'Admins', 'action' => 'view', $laboratorist->admin->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($laboratorist->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($laboratorist->created_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Diagnosisreports') ?></h4>
        <?php if (!empty($laboratorist->diagnosisreports)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Report Type') ?></th>
                <th scope="col"><?= __('Document Type') ?></th>
                <th scope="col"><?= __('File Name') ?></th>
                <th scope="col"><?= __('Prescription Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('Laboratorist Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($laboratorist->diagnosisreports as $diagnosisreports): ?>
            <tr>
                <td><?= h($diagnosisreports->id) ?></td>
                <td><?= h($diagnosisreports->report_type) ?></td>
                <td><?= h($diagnosisreports->document_type) ?></td>
                <td><?= h($diagnosisreports->file_name) ?></td>
                <td><?= h($diagnosisreports->prescription_id) ?></td>
                <td><?= h($diagnosisreports->description) ?></td>
                <td><?= h($diagnosisreports->created_date) ?></td>
                <td><?= h($diagnosisreports->laboratorist_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Diagnosisreports', 'action' => 'view', $diagnosisreports->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Diagnosisreports', 'action' => 'edit', $diagnosisreports->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Diagnosisreports', 'action' => 'delete', $diagnosisreports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diagnosisreports->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
