<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language $language
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Language'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="language form large-9 medium-8 columns content">
    <?= $this->Form->create($language) ?>
    <fieldset>
        <legend><?= __('Add Language') ?></legend>
        <?php
            echo $this->Form->control('phrase');
            echo $this->Form->control('english');
            echo $this->Form->control('bengali');
            echo $this->Form->control('spanish');
            echo $this->Form->control('arabic');
            echo $this->Form->control('dutch');
            echo $this->Form->control('russian');
            echo $this->Form->control('chinese');
            echo $this->Form->control('turkish');
            echo $this->Form->control('portuguese');
            echo $this->Form->control('hungarian');
            echo $this->Form->control('french');
            echo $this->Form->control('greek');
            echo $this->Form->control('german');
            echo $this->Form->control('italian');
            echo $this->Form->control('thai');
            echo $this->Form->control('urdu');
            echo $this->Form->control('hindi');
            echo $this->Form->control('latin');
            echo $this->Form->control('indonesian');
            echo $this->Form->control('japanese');
            echo $this->Form->control('korean');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
