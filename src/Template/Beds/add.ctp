<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bed $bed
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Beds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Nurses'), ['controller' => 'Nurses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nurse'), ['controller' => 'Nurses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bedallotments'), ['controller' => 'Bedallotments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bedallotment'), ['controller' => 'Bedallotments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="beds form large-9 medium-8 columns content">
    <?= $this->Form->create($bed) ?>
    <fieldset>
        <legend><?= __('Add Bed') ?></legend>
        <?php
            echo $this->Form->control('bed_number');
            echo $this->Form->control('type');
            echo $this->Form->control('status');
            echo $this->Form->control('description');
            echo $this->Form->control('nurse_id', ['options' => $nurses]);
            echo $this->Form->control('created_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
