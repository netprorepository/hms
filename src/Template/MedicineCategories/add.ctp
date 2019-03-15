<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicineCategory $medicineCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Medicine Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Medicines'), ['controller' => 'Medicines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medicine'), ['controller' => 'Medicines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="medicineCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($medicineCategory) ?>
    <fieldset>
        <legend><?= __('Add Medicine Category') ?></legend>
        <?php
            echo $this->Form->control('medicine_id', ['options' => $medicines]);
            echo $this->Form->control('category_id', ['options' => $categories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
