<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
?>
<!--nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $department->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $department->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Frontdesks'), ['controller' => 'Frontdesks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Frontdesk'), ['controller' => 'Frontdesks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="departments form large-9 medium-8 columns content">
    <?= $this->Form->create($department) ?>
    <fieldset>
        <legend><?= __('Edit Department') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('created_date');
            echo $this->Form->control('admin_id', ['options' => $admins]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div-->
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Department</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($department) ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Department name</label>
                   <?php
                        echo $this->Form->control('name', 
                        ['class'=>'form-control', 'label'=>false]
                        );
                   ?>
                </div>
                <div class="form-group">
                  <label>Description</label>
                   <?php
                        echo $this->Form->control('description', 
                        ['class'=>'form-control', 'type'=>'textarea','label'=>false]
                        );
                   ?>
                </div>  
                <div class="form-group">
                   <?php
                        echo $this->Form->control('admin_id', 
                        ['class'=>'form-control', 'type'=>'hidden','label'=>false]
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
