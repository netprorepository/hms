<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Admin $admin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Admin'), ['action' => 'edit', $admin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Admin'), ['action' => 'delete', $admin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Admins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accountants'), ['controller' => 'Accountants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accountant'), ['controller' => 'Accountants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bloodbank'), ['controller' => 'Bloodbank', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bloodbank'), ['controller' => 'Bloodbank', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Emailtemplate'), ['controller' => 'Emailtemplate', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emailtemplate'), ['controller' => 'Emailtemplate', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Frontdesks'), ['controller' => 'Frontdesks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frontdesk'), ['controller' => 'Frontdesks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Laboratorists'), ['controller' => 'Laboratorists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Laboratorist'), ['controller' => 'Laboratorists', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="admins view large-9 medium-8 columns content">
    <h3><?= h($admin->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($admin->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($admin->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($admin->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($admin->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($admin->user_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($admin->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('Admin Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($admin->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->role_id) ?></td>
                <td><?= h($users->created_date) ?></td>
                <td><?= h($users->admin_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Accountants') ?></h4>
        <?php if (!empty($admin->accountants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Admin Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($admin->accountants as $accountants): ?>
            <tr>
                <td><?= h($accountants->id) ?></td>
                <td><?= h($accountants->user_id) ?></td>
                <td><?= h($accountants->name) ?></td>
                <td><?= h($accountants->address) ?></td>
                <td><?= h($accountants->phone) ?></td>
                <td><?= h($accountants->admin_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Accountants', 'action' => 'view', $accountants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Accountants', 'action' => 'edit', $accountants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Accountants', 'action' => 'delete', $accountants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Bloodbank') ?></h4>
        <?php if (!empty($admin->bloodbank)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Blood Group') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('Admin Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($admin->bloodbank as $bloodbank): ?>
            <tr>
                <td><?= h($bloodbank->id) ?></td>
                <td><?= h($bloodbank->blood_group) ?></td>
                <td><?= h($bloodbank->status) ?></td>
                <td><?= h($bloodbank->created_date) ?></td>
                <td><?= h($bloodbank->admin_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bloodbank', 'action' => 'view', $bloodbank->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bloodbank', 'action' => 'edit', $bloodbank->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bloodbank', 'action' => 'delete', $bloodbank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bloodbank->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Categories') ?></h4>
        <?php if (!empty($admin->categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Category Name') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('Admin Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($admin->categories as $categories): ?>
            <tr>
                <td><?= h($categories->id) ?></td>
                <td><?= h($categories->category_name) ?></td>
                <td><?= h($categories->created_date) ?></td>
                <td><?= h($categories->admin_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Categories', 'action' => 'view', $categories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $categories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $categories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Departments') ?></h4>
        <?php if (!empty($admin->departments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('Admin Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($admin->departments as $departments): ?>
            <tr>
                <td><?= h($departments->id) ?></td>
                <td><?= h($departments->name) ?></td>
                <td><?= h($departments->description) ?></td>
                <td><?= h($departments->created_date) ?></td>
                <td><?= h($departments->admin_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Departments', 'action' => 'view', $departments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Departments', 'action' => 'edit', $departments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Departments', 'action' => 'delete', $departments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Doctors') ?></h4>
        <?php if (!empty($admin->doctors)): ?>
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
            <?php foreach ($admin->doctors as $doctors): ?>
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
        <h4><?= __('Related Emailtemplate') ?></h4>
        <?php if (!empty($admin->emailtemplate)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Task') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Body') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('Admin Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($admin->emailtemplate as $emailtemplate): ?>
            <tr>
                <td><?= h($emailtemplate->id) ?></td>
                <td><?= h($emailtemplate->task) ?></td>
                <td><?= h($emailtemplate->subject) ?></td>
                <td><?= h($emailtemplate->body) ?></td>
                <td><?= h($emailtemplate->created_date) ?></td>
                <td><?= h($emailtemplate->admin_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Emailtemplate', 'action' => 'view', $emailtemplate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Emailtemplate', 'action' => 'edit', $emailtemplate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Emailtemplate', 'action' => 'delete', $emailtemplate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emailtemplate->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Frontdesks') ?></h4>
        <?php if (!empty($admin->frontdesks)): ?>
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
            <?php foreach ($admin->frontdesks as $frontdesks): ?>
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
    <div class="related">
        <h4><?= __('Related Laboratorists') ?></h4>
        <?php if (!empty($admin->laboratorists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('Admin Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($admin->laboratorists as $laboratorists): ?>
            <tr>
                <td><?= h($laboratorists->id) ?></td>
                <td><?= h($laboratorists->user_id) ?></td>
                <td><?= h($laboratorists->name) ?></td>
                <td><?= h($laboratorists->address) ?></td>
                <td><?= h($laboratorists->phone) ?></td>
                <td><?= h($laboratorists->created_date) ?></td>
                <td><?= h($laboratorists->admin_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Laboratorists', 'action' => 'view', $laboratorists->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Laboratorists', 'action' => 'edit', $laboratorists->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Laboratorists', 'action' => 'delete', $laboratorists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $laboratorists->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
