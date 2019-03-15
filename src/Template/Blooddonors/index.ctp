<?php $userrole = $this->request->getSession()->read('usersroles');?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manage Patients</h3>
        <?= $this->Flash->render() ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example" class="table table-bordered table-striped">
        <thead>
        <tr>
                
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('blood_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sex') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Staff') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blooddonors as $blooddonor): ?>
            <tr>
              
                <td><?= h($blooddonor->name) ?></td>
                <td><?= h($blooddonor->blood_group) ?></td>
                <td><?= h($blooddonor->sex) ?></td>
                <td><?= $this->Number->format($blooddonor->age) ?></td>
                <td><?= h($blooddonor->phone) ?></td>
                <td><?= h($blooddonor->email) ?></td>
                <td><?= h($blooddonor->address) ?></td>
                <td><?= h($blooddonor->last_donation_timestamp) ?></td>
                <td><?= $blooddonor->has('user') ? $this->Html->link($blooddonor->user->fname.' '.$blooddonor->user->fname, 
                        ['controller' => 'Users', 'action' => 'view', $blooddonor->user->id]) : '' ?></td>
                <td class="actions">
                 
                    <?php if($userrole['id'] == 3){
                  echo  $this->Html->link(__('Edit'), ['action' => 'editdonor', $blooddonor->id]).' | '; 
                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $blooddonor->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', $blooddonor->id)]);
                    }?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator pull-right">
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
     </div>
