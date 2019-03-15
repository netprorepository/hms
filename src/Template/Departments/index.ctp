<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department[]|\Cake\Collection\CollectionInterface $departments
 */
?>
<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Departments</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Department Name</th>
            <th>Created date</th>
            <th>Created By</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php 
            $count = 0;
            foreach ($departments as $department): 
            $count++;
        ?>

            <tr>
            <td><?=$count?></td>
            <td><?=$department->name?></td>
            <td><?=$department->created_date?></td>
            <td>
                <?= 
                    $this->Html->link($department->user->fname, ['controller' => 'Users', 'action' => 'view', $department->user->id]) 
                ?>
            </td>
            <td align="center">
                <!--a href="departments/view/<?=$department->id?>" class="ic">
                    <i class="fa  fa-search-plus view"></i>
                </a-->
                <a href="departments/edit/<?=$department->id?>" class="ic">
                    <i class="fa fa-edit edit"></i>
                </a>
                <!--a href="" class="ic">
                    <i class="fa fa-trash trash"></i>
                </a-->
                 <?= 
                    $this->Form->postLink(__(''), 
                        ['action' => 'delete', $department->id, $department->name, $userdata['id']], 
                        ['confirm' => __('Are you sure you want to delete # {0}?', $department->name),'class'=>'fa fa-trash trash ic']
                    ) 
                 ?>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <th>S/N</th>
            <th>Department Name</th>
            <th>Created date</th>
            <th>Created By</th>
            <th></th>
        </tr>
        </tfoot>
        </table>
    </div>
</div>
<!-- /.box -->
