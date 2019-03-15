<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manage Staff</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <!--th>First name</th-->
            <th>Department</th>
            <th>Gender</th>
           <th>Reset Password</th>
<!--            <th>Created By</th>-->
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php 
            $count = 0;
            foreach ($staff as $astaff): 
            $count++;
        ?>

            <tr>
            <td><?=$count?></td>
            <td><?php echo $astaff->fname .", ".$astaff->lname;?></td>
            <td><?php echo $astaff->department->name;?></td>
            <td><?php echo $astaff->gender;?></td>
            <th>
            <?= $this->Form->postLink(__('Reset Password'),
                ['action' => 'resetpassword',$astaff->id],
                ['confirm' => __('Are you sure you want to reset password for # {0}?', $astaff->fname)]
            )
        ?>
           </th>
<!--            <td>
                <?= 
                    $this->Html->link($astaff->created_by, ['controller' => 'Users', 'action' => 'view', $astaff->id]) 
                ?>
            </td>-->
            <td align="center">
                <a href="view/<?=$astaff->id?>" class="ic">
                    <i class="fa  fa-search-plus view"></i>
                </a>
                <a href="edit/<?=$astaff->id?>" class="ic">
                    <i class="fa fa-edit edit"></i>
                </a>
                
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <!--th>First name</th-->
            <th>Department</th>
            <th>Gender</th>
           <th>Reset Password</th>
<!--            <th>Created By</th>-->
            <th></th>
        </tr>
        </tfoot>
        </table>
    </div>
</div>
<!-- /.box -->

