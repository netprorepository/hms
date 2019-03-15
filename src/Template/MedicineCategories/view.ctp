<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicineCategory $medicineCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Medicine Category'), ['action' => 'edit', $medicineCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Medicine Category'), ['action' => 'delete', $medicineCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicineCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Medicine Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medicine Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Medicines'), ['controller' => 'Medicines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medicine'), ['controller' => 'Medicines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="medicineCategories view large-9 medium-8 columns content">
    <h3><?= h($medicineCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Medicine') ?></th>
            <td><?= $medicineCategory->has('medicine') ? $this->Html->link($medicineCategory->medicine->name, ['controller' => 'Medicines', 'action' => 'view', $medicineCategory->medicine->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $medicineCategory->has('category') ? $this->Html->link($medicineCategory->category->id, ['controller' => 'Categories', 'action' => 'view', $medicineCategory->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($medicineCategory->id) ?></td>
        </tr>
    </table>
</div>
