<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountant $accountant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $accountant->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $accountant->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Accountants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accountants form large-9 medium-8 columns content">
    <?= $this->Form->create($accountant) ?>
    <fieldset>
        <legend><?= __('Edit Accountant') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('phone');
            echo $this->Form->control('admin_id', ['options' => $admins]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
