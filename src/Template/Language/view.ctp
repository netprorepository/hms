<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language $language
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Language'), ['action' => 'edit', $language->phrase_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Language'), ['action' => 'delete', $language->phrase_id], ['confirm' => __('Are you sure you want to delete # {0}?', $language->phrase_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Language'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="language view large-9 medium-8 columns content">
    <h3><?= h($language->phrase_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Phrase') ?></th>
            <td><?= h($language->phrase) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('English') ?></th>
            <td><?= h($language->english) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bengali') ?></th>
            <td><?= h($language->bengali) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Spanish') ?></th>
            <td><?= h($language->spanish) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arabic') ?></th>
            <td><?= h($language->arabic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dutch') ?></th>
            <td><?= h($language->dutch) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Russian') ?></th>
            <td><?= h($language->russian) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chinese') ?></th>
            <td><?= h($language->chinese) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Turkish') ?></th>
            <td><?= h($language->turkish) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Portuguese') ?></th>
            <td><?= h($language->portuguese) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hungarian') ?></th>
            <td><?= h($language->hungarian) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('French') ?></th>
            <td><?= h($language->french) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Greek') ?></th>
            <td><?= h($language->greek) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('German') ?></th>
            <td><?= h($language->german) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Italian') ?></th>
            <td><?= h($language->italian) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thai') ?></th>
            <td><?= h($language->thai) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Urdu') ?></th>
            <td><?= h($language->urdu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hindi') ?></th>
            <td><?= h($language->hindi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latin') ?></th>
            <td><?= h($language->latin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Indonesian') ?></th>
            <td><?= h($language->indonesian) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Japanese') ?></th>
            <td><?= h($language->japanese) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Korean') ?></th>
            <td><?= h($language->korean) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phrase Id') ?></th>
            <td><?= $this->Number->format($language->phrase_id) ?></td>
        </tr>
    </table>
</div>
