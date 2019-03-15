<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ward $ward
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Wards'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Admissions'), ['controller' => 'Admissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admission'), ['controller' => 'Admissions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wards form large-9 medium-8 columns content">
    <?= $this->Form->create($ward) ?>
    <fieldset>
        <legend><?= __('Add Ward') ?></legend>
        <?php
            echo $this->Form->control('wardname');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
