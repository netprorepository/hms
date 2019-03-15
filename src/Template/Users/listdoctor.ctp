<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Doctors</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Doctor Name</th>
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
            foreach ($doctors as $doctor): 
            $count++;
        ?>

            <tr>
            <td><?=$count?></td>
            <td><?php echo $doctor->fname .", ".$doctor->lname;?></td>
            <td><?php echo $doctor->department->name;?></td>
            <td><?php echo $doctor->gender;?></td>
            <td>
                <?= 
                    $this->Html->link($doctor->created_by, ['controller' => 'Users', 'action' => 'view', $doctor->id]) 
                ?>
            </td>
            <td align="center">
                <a href="view/<?=$doctor->id?>" class="ic">
                    <i class="fa  fa-search-plus view"></i>
                </a>
                <a href="edit/<?=$doctor->id?>" class="ic">
                    <i class="fa fa-edit edit"></i>
                </a>
                 <?= 
                    $this->Form->postLink(__(''), 
                        ['action' => 'delete', $doctor->id, $userdata['id'],'listdoctor'], 
                        ['confirm' => __('Are you sure you want to delete # {0}?', $doctor->id),'class'=>'fa fa-trash trash ic']
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
