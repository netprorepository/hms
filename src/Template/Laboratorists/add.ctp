<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratorist $laboratorist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Laboratorists'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Diagnosisreports'), ['controller' => 'Diagnosisreports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Diagnosisreport'), ['controller' => 'Diagnosisreports', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="laboratorists form large-9 medium-8 columns content">
    <?= $this->Form->create($laboratorist) ?>
    <fieldset>
        <legend><?= __('Add Laboratorist') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('phone');
            echo $this->Form->control('created_date');
            echo $this->Form->control('admin_id', ['options' => $admins]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
