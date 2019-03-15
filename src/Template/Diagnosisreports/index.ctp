<div class="box">
    <div class="box-header">
        <h3 class="box-title">Diagnosis Requests/Results</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
            
            
            <tr>
            <th>Type</th>
            <th>ID</th>
           <th>Patient</th>
            <th>Report</th>
            <th>File</th>
<!--            <th>Prescription</th> -->
            <th>Description</th>
           <th>Status</th> 
           <th>Date</th> 
            <th>Requested By</th>
            <th></th>
        </tr>
           
        </thead>
        <tbody>
            <?php foreach ($diagnosisreports as $diagnosisreport): ?>
            <tr>
       
                <td><?= h($diagnosisreport->diagnosistype->name) ?></td>
               <td><?= h($diagnosisreport->consultation->patient->uniquid) ?></td>
                 <td><?= h($diagnosisreport->consultation->patient->surname.' '.$diagnosisreport->consultation->patient->name) ?></td>
                <td><?= h($diagnosisreport->report) ?></td>
               <td style="width: 246px; height: 76px;">
                                        <?=$this->html->image($diagnosisreport->file_name,['alt'=>'file','height'=>'50','width'=>'60'])?>
                                        </td>
<!--                <td><?= $diagnosisreport->has('prescription') ? $this->Html->link('View Prescription', ['controller' => 'Prescriptions', 'action' => 'view', $diagnosisreport->prescription->id]) : '' ?></td>-->
                <td><?= h($diagnosisreport->description) ?></td>
                <td><?php if($diagnosisreport->status=='Done'){
                echo ' <span class="label label-success">'. h($diagnosisreport->status).'</span>';}
                else{echo ' <span class="label label-warning">'. h($diagnosisreport->status).'</span>';}
                ?></td>
                <td><?= h(date('Y-m-d', strtotime($diagnosisreport->created_date))) ?></td>
                <td><?= $diagnosisreport->has('user') ? $this->Html->link($diagnosisreport->user->fname, ['controller' => 'Users', 'action' => 'view', $diagnosisreport->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__(' '), ['action' => 'viewreport', $diagnosisreport->id],['class'=>'fa fa-search-plus view','title'=>'view detail']) ?>
                    <?= $this->Html->link(__(' '), ['action' => 'editreport', $diagnosisreport->id],['class'=>'fa fa-edit','title'=>'edit/add diagnostic report']) ?>
                    <?= $this->Form->postLink(__(' '), ['action' => 'delete', $diagnosisreport->id], ['confirm' => __('Are you sure you want to delete this # {0}?', $diagnosisreport->diagnosistype->name),'class'=>'fa fa-trash trash ic']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<!--    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>-->
 </div>
                </div>
            </div>    
        </div>
        <!--/ end row-->
    </div>
    <!--/end animated fadeIn-->
 </div>
 <!--/end content mt-3
