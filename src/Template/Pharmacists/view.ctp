<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pharmacist $pharmacist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacist'), ['action' => 'edit', $pharmacist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacist'), ['action' => 'delete', $pharmacist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacist'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Medicines'), ['controller' => 'Medicines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medicine'), ['controller' => 'Medicines', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacists view large-9 medium-8 columns content">
    <h3><?= h($pharmacist->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $pharmacist->has('user') ? $this->Html->link($pharmacist->user->id, ['controller' => 'Users', 'action' => 'view', $pharmacist->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pharmacist->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($pharmacist->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($pharmacist->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacist->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Medicines') ?></h4>
        <?php if (!empty($pharmacist->medicines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Manufacturing Company') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Pharmacist Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pharmacist->medicines as $medicines): ?>
            <tr>
                <td><?= h($medicines->id) ?></td>
                <td><?= h($medicines->name) ?></td>
                <td><?= h($medicines->description) ?></td>
                <td><?= h($medicines->price) ?></td>
                <td><?= h($medicines->manufacturing_company) ?></td>
                <td><?= h($medicines->status) ?></td>
                <td><?= h($medicines->pharmacist_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Medicines', 'action' => 'view', $medicines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Medicines', 'action' => 'edit', $medicines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Medicines', 'action' => 'delete', $medicines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
