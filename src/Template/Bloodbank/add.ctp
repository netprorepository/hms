<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bloodbank $bloodbank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bloodbank'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bloodbank form large-9 medium-8 columns content">
    <?= $this->Form->create($bloodbank) ?>
    <fieldset>
        <legend><?= __('Add Bloodbank') ?></legend>
        <?php
            echo $this->Form->control('blood_group');
            echo $this->Form->control('status');
            echo $this->Form->control('created_date');
            echo $this->Form->control('admin_id', ['options' => $admins]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
