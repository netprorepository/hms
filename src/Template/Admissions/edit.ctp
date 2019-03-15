<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Admission $admission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $admission->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $admission->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Admissions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wards'), ['controller' => 'Wards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ward'), ['controller' => 'Wards', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Beds'), ['controller' => 'Beds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bed'), ['controller' => 'Beds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="admissions form large-9 medium-8 columns content">
    <?= $this->Form->create($admission) ?>
    <fieldset>
        <legend><?= __('Edit Admission') ?></legend>
        <?php
            echo $this->Form->control('patient_id', ['options' => $patients]);
            echo $this->Form->control('admissiondate');
            echo $this->Form->control('ward_id', ['options' => $wards]);
            echo $this->Form->control('bed_id', ['options' => $beds]);
            echo $this->Form->control('dischargedate');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
