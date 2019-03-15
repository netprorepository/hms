<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Treatment $treatment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $treatment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $treatment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Consultations'), ['controller' => 'Consultations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Consultation'), ['controller' => 'Consultations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatments form large-9 medium-8 columns content">
    <?= $this->Form->create($treatment) ?>
    <fieldset>
        <legend><?= __('Edit Treatment') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('treatedon');
            echo $this->Form->control('treatmentgiven');
            echo $this->Form->control('nexttreatmentdate');
            echo $this->Form->control('comment');
            echo $this->Form->control('consultation_id', ['options' => $consultations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
