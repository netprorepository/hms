<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bed $bed
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bed'), ['action' => 'edit', $bed->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bed'), ['action' => 'delete', $bed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bed->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Beds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bed'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nurses'), ['controller' => 'Nurses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nurse'), ['controller' => 'Nurses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bedallotments'), ['controller' => 'Bedallotments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bedallotment'), ['controller' => 'Bedallotments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="beds view large-9 medium-8 columns content">
    <h3><?= h($bed->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Bed Number') ?></th>
            <td><?= h($bed->bed_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($bed->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($bed->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nurse') ?></th>
            <td><?= $bed->has('nurse') ? $this->Html->link($bed->nurse->name, ['controller' => 'Nurses', 'action' => 'view', $bed->nurse->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bed->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($bed->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($bed->created_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bedallotments') ?></h4>
        <?php if (!empty($bed->bedallotments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Bed Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col"><?= __('Allotment Timestamp') ?></th>
                <th scope="col"><?= __('Discharge Timestamp') ?></th>
                <th scope="col"><?= __('Nurse Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bed->bedallotments as $bedallotments): ?>
            <tr>
                <td><?= h($bedallotments->id) ?></td>
                <td><?= h($bedallotments->bed_id) ?></td>
                <td><?= h($bedallotments->patient_id) ?></td>
                <td><?= h($bedallotments->allotment_timestamp) ?></td>
                <td><?= h($bedallotments->discharge_timestamp) ?></td>
                <td><?= h($bedallotments->nurse_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bedallotments', 'action' => 'view', $bedallotments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bedallotments', 'action' => 'edit', $bedallotments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bedallotments', 'action' => 'delete', $bedallotments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bedallotments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
