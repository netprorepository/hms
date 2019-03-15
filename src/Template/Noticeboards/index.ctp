<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Noticeboard[]|\Cake\Collection\CollectionInterface $noticeboards
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Noticeboard'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="noticeboards index large-9 medium-8 columns content">
    <h3><?= __('Noticeboards') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notice_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($noticeboards as $noticeboard): ?>
            <tr>
                <td><?= $this->Number->format($noticeboard->id) ?></td>
                <td><?= h($noticeboard->notice_title) ?></td>
                <td><?= h($noticeboard->notice) ?></td>
                <td><?= h($noticeboard->created_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $noticeboard->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $noticeboard->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $noticeboard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $noticeboard->id)]) ?>
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
