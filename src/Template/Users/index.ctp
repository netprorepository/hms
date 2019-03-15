<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Staff Members</h3>
        <?= 
                                    $this->Html->link(
                                        __(' New Staff'), 
                                        ['controller'=>'Users','action' => 'newstaff'],
                                        ['class'=>'fa fa-plus pull-right','title'=>'add new staff']
                                    ) 
                                   ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
       
            <th>Department</th>
            <th>Gender</th>
            <th>Role</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php 
            $count = 0;
            foreach ( $users as $staff): 
            $count++;
        ?>

            <tr>
            <td><?=$count?></td>
            <td><?php echo $staff->fname .", ".$staff->lname;?></td>
            <td><?php echo $staff->department->name;?></td>
            <td><?php echo $staff->gender;?></td>
            <td>
                <?= 
                    $this->Html->link($staff->role->role_name, ['controller' => 'Users', 'action' => 'view', $staff->id]) 
                ?>
            </td>
            <td align="center">
                 <?= 
                    $this->Html->link(' ', ['controller' => 'Users', 'action' => 'view', $staff->id],
                            ['class'=>'ic fa  fa-search-plus view']) 
                ?>
                
                
               <?= $this->Html->link(' ', ['controller' => 'Users', 'action' => 'edit', $staff->id],
                       ['class'=>'fa fa-edit edit','title'=>'update '.$staff->fname.'\'s details']) ?>
                
                 <?= 
                    $this->Form->postLink(__(''), 
                        ['action' => 'delete', $staff->id, 'index',$userdata['id']], 
                        ['confirm' => __('Are you sure you want to delete # {0}?', $staff->fname),'class'=>'fa fa-trash trash ic']
                    ) 
                 ?>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <th>S/N</th>
            <th>Doctor Name</th>
            <!--th>First name</th-->
            <th>Department</th>
            <th>Gender</th>
            <th>Created By</th>
            <th></th>
        </tr>
        </tfoot>
        </table>
    </div>
</div>
<!-- /.box -->
