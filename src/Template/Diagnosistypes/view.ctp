<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diagnosistype $diagnosistype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Diagnosistype'), ['action' => 'edit', $diagnosistype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Diagnosistype'), ['action' => 'delete', $diagnosistype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diagnosistype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Diagnosistypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Diagnosistype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="diagnosistypes view large-9 medium-8 columns content">
    <h3><?= h($diagnosistype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($diagnosistype->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($diagnosistype->id) ?></td>
        </tr>
    </table>
</div>
