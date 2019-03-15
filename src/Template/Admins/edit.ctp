<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Admin $admin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $admin->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accountants'), ['controller' => 'Accountants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Accountant'), ['controller' => 'Accountants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bloodbank'), ['controller' => 'Bloodbank', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bloodbank'), ['controller' => 'Bloodbank', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Emailtemplate'), ['controller' => 'Emailtemplate', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Emailtemplate'), ['controller' => 'Emailtemplate', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Frontdesks'), ['controller' => 'Frontdesks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Frontdesk'), ['controller' => 'Frontdesks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Laboratorists'), ['controller' => 'Laboratorists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Laboratorist'), ['controller' => 'Laboratorists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="admins form large-9 medium-8 columns content">
    <?= $this->Form->create($admin) ?>
    <fieldset>
        <legend><?= __('Edit Admin') ?></legend>
        <?php
            echo $this->Form->control('user_id');
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
