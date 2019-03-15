<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manage Blood Bank</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
           
           
            <th>B.Group</th>
            <th>Status</th>
          
<!--         <th>Actions</th>-->
            
        </tr>
        </thead>
        <tbody>
          <?php foreach ($bloodbanks as $bloodbank): ?>
            <tr>
              
               
               <td><?= h($bloodbank->blood_group) ?></td>
                <td><?= h($bloodbank->status) ?></td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
     </div>



