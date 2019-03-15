<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Treatmentplan[]|\Cake\Collection\CollectionInterface $treatmentplans
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Treatmentplan'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Consultations'), ['controller' => 'Consultations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Consultation'), ['controller' => 'Consultations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatmentplans index large-9 medium-8 columns content">
    <h3><?= __('Treatmentplans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('consultation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datecreated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($treatmentplans as $treatmentplan): ?>
            <tr>
                <td><?= $this->Number->format($treatmentplan->id) ?></td>
                <td><?= $this->Number->format($treatmentplan->consultation_id) ?></td>
                <td><?= $treatmentplan->has('user') ? $this->Html->link($treatmentplan->user->id, ['controller' => 'Users', 'action' => 'view', $treatmentplan->user->id]) : '' ?></td>
                <td><?= h($treatmentplan->datecreated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $treatmentplan->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $treatmentplan->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $treatmentplan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentplan->id)]) ?>
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
