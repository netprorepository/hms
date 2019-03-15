<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Nurse</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Nurse Name</th>
            <!--th>First name</th-->
            <th>Department</th>
            <th>Gender</th>
            <th>Created By</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php 
            $count = 0;
            foreach ($nurses as $nurse): 
            $count++;
        ?>

            <tr>
            <td><?=$count?></td>
            <td><?php echo $nurse->fname .", ".$nurse->lname;?></td>
            <td><?php echo $nurse->department->name;?></td>
            <td><?php echo $nurse->gender;?></td>
            <td>
                <?= 
                    $this->Html->link($nurse->created_by, ['controller' => 'Users', 'action' => 'view', $nurse->created_by]) 
                ?>
            </td>
            <td align="center">
                <a href="view/<?=$nurse->id?>" class="ic">
                    <i class="fa  fa-search-plus view"></i>
                </a>
                <a href="edit/<?=$nurse->id?>" class="ic">
                    <i class="fa fa-edit edit"></i>
                </a>
                 <?= 
                    $this->Form->postLink(__(''), 
                        ['action' => 'delete', $nurse->id, $userdata['id'],'listnurse'], 
                        ['confirm' => __('Are you sure you want to delete # {0}?', $nurse->id),'class'=>'fa fa-trash trash ic']
                    ) 
                 ?>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <th>S/N</th>
            <th>Nurse Name</th>
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
