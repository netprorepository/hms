<?php $userrole = $this->request->getSession()->read('usersroles');?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manage Patients Admission & Bed Allotment</h3>
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
         <th>Actions</th>
            <?= $this->Flash->render() ?>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($admissionrequests as $admitrequest): ?>
            <tr>
         
        
               <?= $this->Form->create($admission,['url'=>['controller'=>'Admissions','action'=>'allocatebedward']]) ?>
               <td><?= h($admitrequest->patient->uniquid) ?></td>
                <td><?= h($admitrequest->patient->surname.' '.$admitrequest->patient->name) ?></td>
                <td><?= h($admitrequest->patient->sex) ?></td>
                <td><?= h($admitrequest->user->fname) ?></td>
                <td><?= h(date('Y-m-d H:m A', strtotime($admitrequest->admissiondate))) ?></td>
               
                <td><?= $this->Form->control('ward_id', ['label'=>false,'options' => $wards,'class'=>'form-control'])?></td>
                <td><?= $this->Form->control('bed_id', ['label'=>false,'options' => $beds,'class'=>'form-control'])?>
                <?= $this->Form->control('admission_id', ['type' => 'hidden','value'=>$admitrequest->id])?>
                
                </td>
                <td class="actions">
                     <?= $this->Form->button('Assign Bed/Ward',['class'=>'btn btn-block btn-primary']) ?>
              
                  <?= $this->Form->end() ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
     </div>


<!--<div class="admissions form large-9 medium-8 columns content">
    <?= $this->Form->create($admission) ?>
    <fieldset>
        <legend><?= __('Add Admission') ?></legend>
        <?php
            echo $this->Form->control('patient_id', ['options' => $patients]);
            echo $this->Form->control('admissiondate');
            echo $this->Form->control('ward_id', ['options' => $wards]);
            echo $this->Form->control('bed_id', ['options' => $beds]);
            echo $this->Form->control('dischargedate');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
