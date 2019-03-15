<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Noticeboard $noticeboard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Noticeboard'), ['action' => 'edit', $noticeboard->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Noticeboard'), ['action' => 'delete', $noticeboard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $noticeboard->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Noticeboards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Noticeboard'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="noticeboards view large-9 medium-8 columns content">
    <h3><?= h($noticeboard->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Notice Title') ?></th>
            <td><?= h($noticeboard->notice_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notice') ?></th>
            <td><?= h($noticeboard->notice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($noticeboard->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($noticeboard->created_date) ?></td>
        </tr>
    </table>
</div>
