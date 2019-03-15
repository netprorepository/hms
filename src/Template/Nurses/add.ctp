<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nurse $nurse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Nurses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bedallotments'), ['controller' => 'Bedallotments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bedallotment'), ['controller' => 'Bedallotments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Beds'), ['controller' => 'Beds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bed'), ['controller' => 'Beds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blooddonors'), ['controller' => 'Blooddonors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blooddonor'), ['controller' => 'Blooddonors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nurses form large-9 medium-8 columns content">
    <?= $this->Form->create($nurse) ?>
    <fieldset>
        <legend><?= __('Add Nurse') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
