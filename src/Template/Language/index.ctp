<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language[]|\Cake\Collection\CollectionInterface $language
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Language'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="language index large-9 medium-8 columns content">
    <h3><?= __('Language') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('phrase_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phrase') ?></th>
                <th scope="col"><?= $this->Paginator->sort('english') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bengali') ?></th>
                <th scope="col"><?= $this->Paginator->sort('spanish') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arabic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dutch') ?></th>
                <th scope="col"><?= $this->Paginator->sort('russian') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chinese') ?></th>
                <th scope="col"><?= $this->Paginator->sort('turkish') ?></th>
                <th scope="col"><?= $this->Paginator->sort('portuguese') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hungarian') ?></th>
                <th scope="col"><?= $this->Paginator->sort('french') ?></th>
                <th scope="col"><?= $this->Paginator->sort('greek') ?></th>
                <th scope="col"><?= $this->Paginator->sort('german') ?></th>
                <th scope="col"><?= $this->Paginator->sort('italian') ?></th>
                <th scope="col"><?= $this->Paginator->sort('thai') ?></th>
                <th scope="col"><?= $this->Paginator->sort('urdu') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hindi') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('indonesian') ?></th>
                <th scope="col"><?= $this->Paginator->sort('japanese') ?></th>
                <th scope="col"><?= $this->Paginator->sort('korean') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($language as $language): ?>
            <tr>
                <td><?= $this->Number->format($language->phrase_id) ?></td>
                <td><?= h($language->phrase) ?></td>
                <td><?= h($language->english) ?></td>
                <td><?= h($language->bengali) ?></td>
                <td><?= h($language->spanish) ?></td>
                <td><?= h($language->arabic) ?></td>
                <td><?= h($language->dutch) ?></td>
                <td><?= h($language->russian) ?></td>
                <td><?= h($language->chinese) ?></td>
                <td><?= h($language->turkish) ?></td>
                <td><?= h($language->portuguese) ?></td>
                <td><?= h($language->hungarian) ?></td>
                <td><?= h($language->french) ?></td>
                <td><?= h($language->greek) ?></td>
                <td><?= h($language->german) ?></td>
                <td><?= h($language->italian) ?></td>
                <td><?= h($language->thai) ?></td>
                <td><?= h($language->urdu) ?></td>
                <td><?= h($language->hindi) ?></td>
                <td><?= h($language->latin) ?></td>
                <td><?= h($language->indonesian) ?></td>
                <td><?= h($language->japanese) ?></td>
                <td><?= h($language->korean) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $language->phrase_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $language->phrase_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $language->phrase_id], ['confirm' => __('Are you sure you want to delete # {0}?', $language->phrase_id)]) ?>
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
