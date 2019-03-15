<?php $userrole = $this->request->getSession()->read('usersroles');?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Patients Admission & Bed Allotments</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="xample1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th> ID</th>
            <th> Name</th>
           <th>Gender</th>
          <th>Request By</th>
          <th>Date</th>
          <th>Wards</th>
          <th>Beds</th>
           <th>Admitted By</th>
         <th>Actions</th>
            <?= $this->Flash->render() ?>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($admissions as $admitrequest): ?>
            <tr>
         
        
               <?= $this->Form->create(null,['url'=>['controller'=>'Admissions','action'=>'dischargeadmission']]) ?>
               <td><?= h($admitrequest->patient->uniquid) ?></td>
                <td><?= h($admitrequest->patient->surname.' '.$admitrequest->patient->name) ?></td>
                <td><?= h($admitrequest->patient->sex) ?></td>
                <td><?= h($admitrequest->user->fname) ?></td>
                <td><?= h(date('Y-m-d H:m A', strtotime($admitrequest->admissiondate))) ?></td>
               
                <td><?= $admitrequest->ward->wardname?></td>
                <td><?= $admitrequest->bed->bed_number?>
                <?= $this->Form->control('admission_id', ['type' => 'hidden','value'=>$admitrequest->id])?>
                
                </td>
                 <td><?= $admitrequest->admittedby?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Discharge'), ['action' => 'dischargeadmission',$admitrequest->id],['class'=>'btn btn-block btn-primary']) ?>
                   
              
                  <?= $this->Form->end() ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
     </div>


