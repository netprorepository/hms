<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pharmacist $pharmacist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pharmacists'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medicines'), ['controller' => 'Medicines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medicine'), ['controller' => 'Medicines', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacists form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacist) ?>
    <fieldset>
        <legend><?= __('Add Pharmacist') ?></legend>
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
