<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vital $vital
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vital->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vital->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vitals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vitals form large-9 medium-8 columns content">
    <?= $this->Form->create($vital) ?>
    <fieldset>
        <legend><?= __('Edit Vital') ?></legend>
        <?php
            echo $this->Form->control('patient_id', ['options' => $patients]);
            echo $this->Form->control('date_added');
            echo $this->Form->control('temp');
            echo $this->Form->control('pulse');
            echo $this->Form->control('bp');
            echo $this->Form->control('resp');
            echo $this->Form->control('description');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
