<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicineCategory[]|\Cake\Collection\CollectionInterface $medicineCategories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Medicine Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medicines'), ['controller' => 'Medicines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medicine'), ['controller' => 'Medicines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="medicineCategories index large-9 medium-8 columns content">
    <h3><?= __('Medicine Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('medicine_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medicineCategories as $medicineCategory): ?>
            <tr>
                <td><?= $this->Number->format($medicineCategory->id) ?></td>
                <td><?= $medicineCategory->has('medicine') ? $this->Html->link($medicineCategory->medicine->name, ['controller' => 'Medicines', 'action' => 'view', $medicineCategory->medicine->id]) : '' ?></td>
                <td><?= $medicineCategory->has('category') ? $this->Html->link($medicineCategory->category->id, ['controller' => 'Categories', 'action' => 'view', $medicineCategory->category->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $medicineCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $medicineCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $medicineCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicineCategory->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
