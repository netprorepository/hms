<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bedallotment $bedallotment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bedallotments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Beds'), ['controller' => 'Beds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bed'), ['controller' => 'Beds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bedallotments form large-9 medium-8 columns content">
    <?= $this->Form->create($bedallotment) ?>
    <fieldset>
        <legend><?= __('Add Bedallotment') ?></legend>
        <?php
            echo $this->Form->control('bed_id', ['options' => $beds]);
            echo $this->Form->control('patient_id', ['options' => $patients]);
            echo $this->Form->control('allotment_timestamp');
            echo $this->Form->control('discharge_timestamp');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
