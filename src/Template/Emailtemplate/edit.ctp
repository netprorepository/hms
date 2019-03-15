<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Emailtemplate $emailtemplate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $emailtemplate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $emailtemplate->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Emailtemplate'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="emailtemplate form large-9 medium-8 columns content">
    <?= $this->Form->create($emailtemplate) ?>
    <fieldset>
        <legend><?= __('Edit Emailtemplate') ?></legend>
        <?php
            echo $this->Form->control('task');
            echo $this->Form->control('subject');
            echo $this->Form->control('body');
            echo $this->Form->control('created_date');
            echo $this->Form->control('admin_id', ['options' => $admins]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
