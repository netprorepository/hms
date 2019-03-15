<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!--nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accountants'), ['controller' => 'Accountants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Accountant'), ['controller' => 'Accountants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Frontdesks'), ['controller' => 'Frontdesks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Frontdesk'), ['controller' => 'Frontdesks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Laboratorists'), ['controller' => 'Laboratorists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Laboratorist'), ['controller' => 'Laboratorists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Log'), ['controller' => 'Log', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Log'), ['controller' => 'Log', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nurses'), ['controller' => 'Nurses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nurse'), ['controller' => 'Nurses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacists'), ['controller' => 'Pharmacists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacist'), ['controller' => 'Pharmacists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Staffs'), ['controller' => 'Staffs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staffs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Userlogins'), ['controller' => 'Userlogins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Userlogin'), ['controller' => 'Userlogins', 'action' => 'add']) ?></li>
    </ul>
</nav-->
<!--div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('role_id', ['options' => $roles]);
            echo $this->Form->control('fname');
            echo $this->Form->control('lname');
            echo $this->Form->control('mname');
            echo $this->Form->control('gender');
            echo $this->Form->control('address');
            echo $this->Form->control('country_id', ['options' => $countries]);
            echo $this->Form->control('state_id', ['options' => $states]);
            echo $this->Form->control('phone');
            echo $this->Form->control('department_id', ['options' => $departments]);
            echo $this->Form->control('profile');
            echo $this->Form->control('photo');
            echo $this->Form->control('dob');
            echo $this->Form->control('created_date');
            echo $this->Form->control('created_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div-->
<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
<section class="content">
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Profile</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($user,['type'=>'file']) ?>
            <div class="box-body">
                <div class="form-group col-md-6">
                    <label>Username</label> 
                    <?php
                   
                        echo $this->Form->control('username', 
                        ['class'=>'form-control', 'label'=>false, 'type'=>'email', 'disabled'=>'disabled']
                        );
                        
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <label>Role</label>
                    <?php
                        echo $this->Form->control('role_id', 
                        ['class'=>'form-control', 'label'=>false, 'options'=>$roles,'disabled']
                        );
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <label>First name</label>
                    <?php
                        echo $this->Form->control('fname', 
                        ['class'=>'form-control', 'label'=>false]
                        );
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <label>Last name</label>
                    <?php
                        echo $this->Form->control('lname', 
                        ['class'=>'form-control', 'label'=>false]
                        );
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <label>Middle name</label>
                    <?php
                        echo $this->Form->control('mname', 
                        ['class'=>'form-control', 'label'=>false]
                        );
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <label>Gender</label>
                    <?php
                        echo $this->Form->control('gender', 
                        ['class'=>'form-control', 'label'=>false]
                        );
                    ?>
                </div>   
                <div class="form-group">
                    <label>Address</label>
                    <?php
                        echo $this->Form->control('address', 
                        ['class'=>'form-control', 'label'=>false, 'type'=>'textarea']
                        );
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <label>Department</label>
                    <?php
                        echo $this->Form->control('department_id', 
                        ['class'=>'form-control', 'label'=>false, 'options'=>$departments]
                        );
                    ?>
                </div>
                
                <div class="form-group col-md-4">
                    <label>DOB</label>
                    <?php
                        echo $this->Form->control('dob', 
                        ['class'=>'form-control', 'label'=>false,'disabled'=>'disabled']
                        );
                    ?>
                </div> 
                
                <div class="form-group col-md-4">
                    <label>Passport</label>
                    <?php
                        echo $this->Form->control('passport', 
                        ['class'=>'form-control', 'label'=>false,'type'=>'file']
                        );
                    ?>
                </div> 
                
                <div class="form-group">
                    <label>Profile</label>
                    <?php
                        echo $this->Form->control('profile', 
                        ['class'=>'form-control', 'label'=>false, 'type'=>'textarea']
                        );
                    ?>
                </div>
                
                 <?php
                      echo $this->Form->control('created_by', 
                      ['class'=>'form-control pull-right', 'type'=>'hidden','label'=>false, 'value'=>$userdata['id']]
                      );
                   ?>                   
              </div>             
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        <?= $this->Form->end() ?>
        </div>
        <!-- /.box -->
    </div>
    </div>
</section>   
