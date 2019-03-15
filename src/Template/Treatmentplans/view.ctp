<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Treatmentplan $treatmentplan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Treatmentplan'), ['action' => 'edit', $treatmentplan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Treatmentplan'), ['action' => 'delete', $treatmentplan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentplan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Treatmentplans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatmentplan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Consultations'), ['controller' => 'Consultations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Consultation'), ['controller' => 'Consultations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="treatmentplans view large-9 medium-8 columns content">
    <h3><?= h($treatmentplan->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $treatmentplan->has('user') ? $this->Html->link($treatmentplan->user->id, ['controller' => 'Users', 'action' => 'view', $treatmentplan->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($treatmentplan->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consultation Id') ?></th>
            <td><?= $this->Number->format($treatmentplan->consultation_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datecreated') ?></th>
            <td><?= h($treatmentplan->datecreated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Plan') ?></h4>
        <?= $this->Text->autoParagraph(h($treatmentplan->plan)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Consultations') ?></h4>
        <?php if (!empty($treatmentplan->consultations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Consultationday') ?></th>
                <th scope="col"><?= __('Pc') ?></th>
                <th scope="col"><?= __('Hpc') ?></th>
                <th scope="col"><?= __('Pmh') ?></th>
                <th scope="col"><?= __('Psh') ?></th>
                <th scope="col"><?= __('Dh') ?></th>
                <th scope="col"><?= __('Allergies') ?></th>
                <th scope="col"><?= __('Socialhistory') ?></th>
                <th scope="col"><?= __('Impression') ?></th>
                <th scope="col"><?= __('Hp') ?></th>
                <th scope="col"><?= __('Poh') ?></th>
                <th scope="col"><?= __('Pgh') ?></th>
                <th scope="col"><?= __('Lmp') ?></th>
                <th scope="col"><?= __('Ga') ?></th>
                <th scope="col"><?= __('Edd') ?></th>
                <th scope="col"><?= __('Parity') ?></th>
                <th scope="col"><?= __('Diagnosis') ?></th>
                <th scope="col"><?= __('Treatmentplan Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($treatmentplan->consultations as $consultations): ?>
            <tr>
                <td><?= h($consultations->id) ?></td>
                <td><?= h($consultations->patient_id) ?></td>
                <td><?= h($consultations->user_id) ?></td>
                <td><?= h($consultations->consultationday) ?></td>
                <td><?= h($consultations->pc) ?></td>
                <td><?= h($consultations->hpc) ?></td>
                <td><?= h($consultations->pmh) ?></td>
                <td><?= h($consultations->psh) ?></td>
                <td><?= h($consultations->dh) ?></td>
                <td><?= h($consultations->allergies) ?></td>
                <td><?= h($consultations->socialhistory) ?></td>
                <td><?= h($consultations->impression) ?></td>
                <td><?= h($consultations->hp) ?></td>
                <td><?= h($consultations->poh) ?></td>
                <td><?= h($consultations->pgh) ?></td>
                <td><?= h($consultations->lmp) ?></td>
                <td><?= h($consultations->ga) ?></td>
                <td><?= h($consultations->edd) ?></td>
                <td><?= h($consultations->parity) ?></td>
                <td><?= h($consultations->diagnosis) ?></td>
                <td><?= h($consultations->treatmentplan_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Consultations', 'action' => 'view', $consultations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Consultations', 'action' => 'edit', $consultations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Consultations', 'action' => 'delete', $consultations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consultations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
