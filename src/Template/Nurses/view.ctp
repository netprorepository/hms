<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nurse $nurse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nurse'), ['action' => 'edit', $nurse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nurse'), ['action' => 'delete', $nurse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nurse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nurses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nurse'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bedallotments'), ['controller' => 'Bedallotments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bedallotment'), ['controller' => 'Bedallotments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Beds'), ['controller' => 'Beds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bed'), ['controller' => 'Beds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blooddonors'), ['controller' => 'Blooddonors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blooddonor'), ['controller' => 'Blooddonors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nurses view large-9 medium-8 columns content">
    <h3><?= h($nurse->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $nurse->has('user') ? $this->Html->link($nurse->user->id, ['controller' => 'Users', 'action' => 'view', $nurse->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($nurse->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($nurse->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($nurse->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nurse->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bedallotments') ?></h4>
        <?php if (!empty($nurse->bedallotments)): ?>
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
            <?php foreach ($nurse->bedallotments as $bedallotments): ?>
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
    <div class="related">
        <h4><?= __('Related Beds') ?></h4>
        <?php if (!empty($nurse->beds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Bed Number') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Nurse Id') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($nurse->beds as $beds): ?>
            <tr>
                <td><?= h($beds->id) ?></td>
                <td><?= h($beds->bed_number) ?></td>
                <td><?= h($beds->type) ?></td>
                <td><?= h($beds->status) ?></td>
                <td><?= h($beds->description) ?></td>
                <td><?= h($beds->nurse_id) ?></td>
                <td><?= h($beds->created_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Beds', 'action' => 'view', $beds->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Beds', 'action' => 'edit', $beds->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Beds', 'action' => 'delete', $beds->id], ['confirm' => __('Are you sure you want to delete # {0}?', $beds->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Blooddonors') ?></h4>
        <?php if (!empty($nurse->blooddonors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Blood Group') ?></th>
                <th scope="col"><?= __('Sex') ?></th>
                <th scope="col"><?= __('Age') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Last Donation Timestamp') ?></th>
                <th scope="col"><?= __('Nurse Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($nurse->blooddonors as $blooddonors): ?>
            <tr>
                <td><?= h($blooddonors->id) ?></td>
                <td><?= h($blooddonors->name) ?></td>
                <td><?= h($blooddonors->blood_group) ?></td>
                <td><?= h($blooddonors->sex) ?></td>
                <td><?= h($blooddonors->age) ?></td>
                <td><?= h($blooddonors->phone) ?></td>
                <td><?= h($blooddonors->email) ?></td>
                <td><?= h($blooddonors->address) ?></td>
                <td><?= h($blooddonors->last_donation_timestamp) ?></td>
                <td><?= h($blooddonors->nurse_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Blooddonors', 'action' => 'view', $blooddonors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Blooddonors', 'action' => 'edit', $blooddonors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Blooddonors', 'action' => 'delete', $blooddonors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blooddonors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
