<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medicine $medicine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Medicine'), ['action' => 'edit', $medicine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Medicine'), ['action' => 'delete', $medicine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Medicines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medicine'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Medicine Categories'), ['controller' => 'MedicineCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medicine Category'), ['controller' => 'MedicineCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="medicines view large-9 medium-8 columns content">
    <h3><?= h($medicine->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($medicine->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($medicine->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($medicine->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manufacturing Company') ?></th>
            <td><?= h($medicine->manufacturing_company) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($medicine->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $medicine->has('user') ? $this->Html->link($medicine->user->id, ['controller' => 'Users', 'action' => 'view', $medicine->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($medicine->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category Id') ?></th>
            <td><?= $this->Number->format($medicine->category_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Medicine Categories') ?></h4>
        <?php if (!empty($medicine->medicine_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Medicine Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($medicine->medicine_categories as $medicineCategories): ?>
            <tr>
                <td><?= h($medicineCategories->id) ?></td>
                <td><?= h($medicineCategories->medicine_id) ?></td>
                <td><?= h($medicineCategories->category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MedicineCategories', 'action' => 'view', $medicineCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MedicineCategories', 'action' => 'edit', $medicineCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MedicineCategories', 'action' => 'delete', $medicineCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicineCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
