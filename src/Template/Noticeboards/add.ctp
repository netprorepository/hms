<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Noticeboard $noticeboard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Noticeboards'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="noticeboards form large-9 medium-8 columns content">
    <?= $this->Form->create($noticeboard) ?>
    <fieldset>
        <legend><?= __('Add Noticeboard') ?></legend>
        <?php
            echo $this->Form->control('notice_title');
            echo $this->Form->control('notice');
            echo $this->Form->control('created_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
