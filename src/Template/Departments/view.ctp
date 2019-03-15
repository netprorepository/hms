<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
?>
<!--nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Department'), ['action' => 'edit', $department->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Department'), ['action' => 'delete', $department->id], ['confirm' => __('Are you sure you want to delete # {0}?', $department->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Frontdesks'), ['controller' => 'Frontdesks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frontdesk'), ['controller' => 'Frontdesks', 'action' => 'add']) ?> </li>
    </ul>
</nav-->
<div class="departments view large-9 medium-8 columns content">
    <h3><?= h($department->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($department->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($department->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin') ?></th>
            <td><?= $department->has('admin') ? $this->Html->link($department->admin->name, ['controller' => 'Admins', 'action' => 'view', $department->admin->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($department->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($department->created_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Doctors') ?></h4>
        <?php if (!empty($department->doctors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Department Id') ?></th>
                <th scope="col"><?= __('Profile') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('Admin Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($department->doctors as $doctors): ?>
            <tr>
                <td><?= h($doctors->id) ?></td>
                <td><?= h($doctors->user_id) ?></td>
                <td><?= h($doctors->name) ?></td>
                <td><?= h($doctors->address) ?></td>
                <td><?= h($doctors->phone) ?></td>
                <td><?= h($doctors->department_id) ?></td>
                <td><?= h($doctors->profile) ?></td>
                <td><?= h($doctors->created_date) ?></td>
                <td><?= h($doctors->admin_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Doctors', 'action' => 'view', $doctors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Doctors', 'action' => 'edit', $doctors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Doctors', 'action' => 'delete', $doctors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Frontdesks') ?></h4>
        <?php if (!empty($department->frontdesks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Department Id') ?></th>
                <th scope="col"><?= __('Profile') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('Admin Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($department->frontdesks as $frontdesks): ?>
            <tr>
                <td><?= h($frontdesks->id) ?></td>
                <td><?= h($frontdesks->user_id) ?></td>
                <td><?= h($frontdesks->name) ?></td>
                <td><?= h($frontdesks->address) ?></td>
                <td><?= h($frontdesks->phone) ?></td>
                <td><?= h($frontdesks->department_id) ?></td>
                <td><?= h($frontdesks->profile) ?></td>
                <td><?= h($frontdesks->created_date) ?></td>
                <td><?= h($frontdesks->admin_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Frontdesks', 'action' => 'view', $frontdesks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Frontdesks', 'action' => 'edit', $frontdesks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Frontdesks', 'action' => 'delete', $frontdesks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frontdesks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
