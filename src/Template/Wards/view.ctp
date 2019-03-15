<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ward $ward
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ward'), ['action' => 'edit', $ward->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ward'), ['action' => 'delete', $ward->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ward->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Wards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ward'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admissions'), ['controller' => 'Admissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admission'), ['controller' => 'Admissions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="wards view large-9 medium-8 columns content">
    <h3><?= h($ward->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Wardname') ?></th>
            <td><?= h($ward->wardname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ward->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Admissions') ?></h4>
        <?php if (!empty($ward->admissions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col"><?= __('Admissiondate') ?></th>
                <th scope="col"><?= __('Ward Id') ?></th>
                <th scope="col"><?= __('Bed Id') ?></th>
                <th scope="col"><?= __('Dischargedate') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ward->admissions as $admissions): ?>
            <tr>
                <td><?= h($admissions->id) ?></td>
                <td><?= h($admissions->patient_id) ?></td>
                <td><?= h($admissions->admissiondate) ?></td>
                <td><?= h($admissions->ward_id) ?></td>
                <td><?= h($admissions->bed_id) ?></td>
                <td><?= h($admissions->dischargedate) ?></td>
                <td><?= h($admissions->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Admissions', 'action' => 'view', $admissions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Admissions', 'action' => 'edit', $admissions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Admissions', 'action' => 'delete', $admissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admissions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
