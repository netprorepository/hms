<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ward[]|\Cake\Collection\CollectionInterface $wards
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ward'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Admissions'), ['controller' => 'Admissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admission'), ['controller' => 'Admissions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wards index large-9 medium-8 columns content">
    <h3><?= __('Wards') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wardname') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wards as $ward): ?>
            <tr>
                <td><?= $this->Number->format($ward->id) ?></td>
                <td><?= h($ward->wardname) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ward->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ward->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ward->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ward->id)]) ?>
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
