<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Treatment $treatment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Treatment'), ['action' => 'edit', $treatment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Treatment'), ['action' => 'delete', $treatment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Treatments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Consultations'), ['controller' => 'Consultations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Consultation'), ['controller' => 'Consultations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="treatments view large-9 medium-8 columns content">
    <h3><?= h($treatment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $treatment->has('user') ? $this->Html->link($treatment->user->id, ['controller' => 'Users', 'action' => 'view', $treatment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Treatmentgiven') ?></th>
            <td><?= h($treatment->treatmentgiven) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nexttreatmentdate') ?></th>
            <td><?= h($treatment->nexttreatmentdate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comment') ?></th>
            <td><?= h($treatment->comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consultation') ?></th>
            <td><?= $treatment->has('consultation') ? $this->Html->link($treatment->consultation->id, ['controller' => 'Consultations', 'action' => 'view', $treatment->consultation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($treatment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Treatedon') ?></th>
            <td><?= h($treatment->treatedon) ?></td>
        </tr>
    </table>
</div>
