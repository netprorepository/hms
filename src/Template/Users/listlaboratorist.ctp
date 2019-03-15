<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Laboratorist</h3>
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
            foreach ($laboratorists as $laboratorist): 
            $count++;
        ?>

            <tr>
            <td><?=$count?></td>
            <td><?php echo $laboratorist->fname .", ".$laboratorist->lname;?></td>
            <td><?php echo $laboratorist->department->name;?></td>
            <td><?php echo $laboratorist->gender;?></td>
            <td>
                <?= 
                    $this->Html->link($laboratorist->created_by, ['controller' => 'Users', 'action' => 'view', $laboratorist->id]) 
                ?>
            </td>
            <td align="center">
                <a href="view/<?=$laboratorist->id?>" class="ic">
                    <i class="fa  fa-search-plus view"></i>
                </a>
                <a href="edit/<?=$laboratorist->id?>" class="ic">
                    <i class="fa fa-edit edit"></i>
                </a>
                 <?= 
                    $this->Form->postLink(__(''), 
                        ['action' => 'delete', $laboratorist->id, $userdata['id'],'listlaboratorist'], 
                        ['confirm' => __('Are you sure you want to delete # {0}?', $laboratorist->id),'class'=>'fa fa-trash trash ic']
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
