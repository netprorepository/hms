<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Medicines</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Medicine Name</th>
            <th>Medicine Category</th>
            <th>Description</th>
            <th>Price</th>
            <th>Manufacturing Company</th>
            <th>Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php 
            $count = 0;
            foreach ($medicines as $medicine): 
            $count++;
        ?>

            <tr>
            <td><?=$count?></td>
            <td><?=$medicine->name?></td>
            <td><?=$medicine->category->category_name?></td>
            <td><?=$medicine->description?></td>
            <td><?=$medicine->price?></td>
            <td><?=$medicine->manufacturing_company?></td>
            <td><?=$medicine->status?></td>
            <td align="center">
                <a href="medicines/edit/<?=$medicine->id?>" class="ic">
                    <i class="fa fa-edit edit"></i>
                </a>
                 <?= 
                    $this->Form->postLink(__(''), 
                        ['action' => 'delete', $medicine->id, $medicine->name], 
                        ['confirm' => __('Are you sure you want to delete # {0}?', $medicine->id),'class'=>'fa fa-trash trash ic']
                    ) 
                 ?>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <th>S/N</th>
            <th>Medicine Name</th>
            <th>Medicine Category</th>
            <th>Description</th>
            <th>Price</th>
            <th>Manufacturing Company</th>
            <th>Status</th>
            <th></th>
        </tr>
        </tfoot>
        </table>
    </div>
</div>
<!-- /.box -->
