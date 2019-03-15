<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Accountant</h3>
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
            <th>Created By</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php 
            $count = 0;
            foreach ($accountants as $accountant): 
            $count++;
        ?>

            <tr>
            <td><?=$count?></td>
            <td><?php echo $accountant->fname .", ".$accountant->lname;?></td>
            <td><?php echo $accountant->department->name;?></td>
            <td><?php echo $accountant->gender;?></td>
            <td>
                <?= 
                    $this->Html->link($accountant->created_by, ['controller' => 'Users', 'action' => 'view', $accountant->id]) 
                ?>
            </td>
            <td align="center">
                <a href="view/<?=$accountant->id?>" class="ic">
                    <i class="fa  fa-search-plus view"></i>
                </a>
                <a href="edit/<?=$accountant->id?>" class="ic">
                    <i class="fa fa-edit edit"></i>
                </a>
                 <?= 
                    $this->Form->postLink(__(''), 
                        ['action' => 'delete', $accountant->id, $userdata['id'],'listaccountant'], 
                        ['confirm' => __('Are you sure you want to delete # {0}?', $accountant->id),'class'=>'fa fa-trash trash ic']
                    ) 
                 ?>
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
            <th>Created By</th>
            <th></th>
        </tr>
        </tfoot>
        </table>
    </div>
</div>
<!-- /.box -->