<?php $userrole = $this->request->getSession()->read('usersroles');?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Activity Logs</h3>
        <?= $this->Flash->render() ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th> Title</th>
            <th> Staff</th>
           <th>Date/Time</th>
          <th>Description</th>
         <th>Type</th>
            
        </tr>
        </thead>
        <tbody>
            <?php foreach ($logs as $log): ?>
            <tr>
               <td><?= h($log->title) ?></td>
                <td><?= h($log->user->fsurname.' '.$log->user->lname) ?></td>
              <td><?= h(date('Y-m-d H:m a', strtotime($log->timestamp))) ?></td>
                <td><?= h($log->description) ?></td>
               <td><?= h($log->type) ?></td>
               
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
     </div>


