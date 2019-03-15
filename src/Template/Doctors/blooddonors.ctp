<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manage Blood Donors</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
           
            <th> Name</th>
            <th>B.Group</th>
            <th>Age</th>
           <th>Gender</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Address</th>
          <th>Last Donation</th>
          <th>Added By</th>
         <th>Actions</th>
            
        </tr>
        </thead>
        <tbody>
            <?php foreach ($blooddonors as $blooddonor): ?>
            <tr>
              
               
                <td><?= h($blooddonor->name) ?></td>
                <td><?= h($blooddonor->blood_group) ?></td>
                 <td><?= $this->Number->format($blooddonor->age) ?></td>
                <td><?= h($blooddonor->sex) ?></td>
              
                <td><?= h($blooddonor->phone) ?></td>
                <td><?= h($blooddonor->email) ?></td>
                <td><?= h($blooddonor->address) ?></td>
                <td><?= h(date('Y-m-d', strtotime($blooddonor->last_donation_timestamp))) ?></td>
                <td><?= $blooddonor->has('nurse') ? $this->Html->link($blooddonor->nurse->name, 
                        ['controller' => 'Nurses', 'action' => 'view', $blooddonor->nurse->id]) : '' ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__(' '), ['action' => 'view', $blooddonor->id],['class'=>'fa fa-search-plus view']) ?>
                    <?= $this->Html->link(__(' '), ['action' => 'edit', $blooddonor->id],['class'=>'fa fa-edit']) ?>
                    <?= $this->Form->postLink(__(' '), ['action' => 'delete', $blooddonor->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', $blooddonor->id),'class'=>'fa fa-trash trash ic']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<!--    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>-->
</div>
     </div>


