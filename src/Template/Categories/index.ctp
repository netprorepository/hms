
<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Categories</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Medicine Category</th>
            <th>Description</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php 
            $count = 0;
            foreach ($categories as $category): 
            $count++;
        ?>

            <tr>
            <td><?=$count?></td>
            <td><?=$category->category_name?></td>
            <td><?=$category->description?></td>
            <td align="center">
                <a href="categories/edit/<?=$category->id?>" class="ic">
                    <i class="fa fa-edit edit"></i>
                </a>
                 <?= 
                    $this->Form->postLink(__(''), 
                        ['action' => 'delete', $category->id, $category->category_name], 
                        ['confirm' => __('Are you sure you want to delete # {0}?', $category->id),'class'=>'fa fa-trash trash ic']
                    ) 
                 ?>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <th>S/N</th>
            <th>Medicine Category</th>
            <th>Description</th>
            <th></th>
        </tr>
        </tfoot>
        </table>
    </div>
</div>
<!-- /.box -->
