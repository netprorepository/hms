<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Prescriptions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Consultations'), ['controller' => 'Consultations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Consultation'), ['controller' => 'Consultations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Diagnosisreports'), ['controller' => 'Diagnosisreports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Diagnosisreport'), ['controller' => 'Diagnosisreports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Labtests'), ['controller' => 'Labtests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Labtest'), ['controller' => 'Labtests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prescriptions form large-9 medium-8 columns content">
    <?= $this->Form->create($prescription) ?>
    <fieldset>
        <legend><?= __('Add Prescription') ?></legend>
        <?php
            echo $this->Form->control('date_created');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('consultation_id', ['options' => $consultations]);
            echo $this->Form->control('medication');
            echo $this->Form->control('medication_from_pharmacist');
            echo $this->Form->control('description');
            echo $this->Form->control('medication_by');
            echo $this->Form->control('medication_date');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
