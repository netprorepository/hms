<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Audit $audit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Audits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="audits form large-9 medium-8 columns content">
    <?= $this->Form->create($audit) ?>
    <fieldset>
        <legend><?= __('Add Audit') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('created_date');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('description');
            echo $this->Form->control('ip');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
