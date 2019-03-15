<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blooddonor $blooddonor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Blooddonors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Nurses'), ['controller' => 'Nurses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nurse'), ['controller' => 'Nurses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blooddonors form large-9 medium-8 columns content">
    <?= $this->Form->create($blooddonor) ?>
    <fieldset>
        <legend><?= __('Add Blooddonor') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('blood_group');
            echo $this->Form->control('sex');
            echo $this->Form->control('age');
            echo $this->Form->control('phone');
            echo $this->Form->control('email');
            echo $this->Form->control('address');
            echo $this->Form->control('last_donation_timestamp');
            echo $this->Form->control('nurse_id', ['options' => $nurses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
