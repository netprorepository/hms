<?php $userrole = $this->request->getSession()->read('usersroles');?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">User Logs</h3>
        <?= $this->Flash->render() ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
         
            <th> Name</th>
           <th>Login Time</th>
          <th>Logout Time</th>       
        </tr>
        </thead>
        <tbody>
            <?php foreach ($userlogins as $login): ?>
            <tr>
               <td><?= h($login->user->fname.' '.$login->user->lname) ?></td>
               <td><?= h(date('Y-m-d H:m a', strtotime($login->logintime))) ?></td>
                <td><?= h(date('Y-m-d H:m a', strtotime($login->logouttime))) ?></td>
               
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
     </div>


