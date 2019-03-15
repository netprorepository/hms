<?php $userrole = $this->request->getSession()->read('usersroles');?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manage Patients</h3>
        <?= $this->Flash->render() ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th> ID</th>
            <th> Name</th>
<!--            <th>Address</th>-->
            <!--th>Phone</th-->
           <th>Gender</th>
<!--           <th>Date Of Birth</th>-->
          <th>Blood Group</th>
          <!--th>Date Of Registration</th-->
          <th>Registered By</th>
          <th>Date</th>
         <th>Actions</th>
            
        </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $patient): ?>
            <tr>
               <td><?= h($patient->uniquid) ?></td>
                <td><?= h($patient->surname.' '.$patient->name) ?></td>
<!--                <td><?= h($patient->address) ?></td>-->
                <!--td><?= h($patient->phone) ?></td-->
                <td><?= h($patient->sex) ?></td>
<!--                <td><?= h(date('Y-m-d', strtotime($patient->birth_date))) ?></td>-->
                <td><?= h($patient->blood_group) ?></td>
                <!--td><?= h(date('Y-m-d H:i A', strtotime($patient->created_date))) ?></td-->
                <td><?= $patient->has('user') ? $this->Html->link($patient->user->username, ['controller' => 'Users', 'action' => 'view', $patient->user->id]) : '' ?></td>
                <td><?= h(date('Y-m-d H:i A', strtotime($patient->created_date))) ?></td>
                <td class="actions">
              <!--        <?= $this->Html->link(' ', ['action' => 'viewpatient', $patient->id],['class'=>'fa fa-search-plus view','title'=>'view patient']) ?> | -->
                   <?php 
                   
                   if($userrole['id'] == 1){
                        echo   $this->Html->link(' ', ['action' => 'viewpatient', $patient->id],['class'=>'fa fa-search-plus view','title'=>'view patient']).'|';   
                
                     echo $this->Form->postLink(' ', ['action' => 'delete', $patient->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', $patient->name),'class'=>'fa fa-trash trash ic']);  
                   }
                   if(($userrole['id'] == 2) || ($userrole['id'] == 3)){
                 echo   $this->Html->link(' ', ['action' => 'viewpatient', $patient->id],['class'=>'fa fa-search-plus view','title'=>'view patient']).'|';   
                   
                    }  if($userrole['id'] == 7){
                       echo $this->Html->link(' ', ['action' => 'editpatient', $patient->id],['class'=>'fa fa-edit','title'=>'edit patient']); 
                       foreach($patient->invoices as $invoice): 
                        if($invoice->description == 'Registration Fee' && $invoice->status == 'Paid'){
                            echo $this->Html->link('| Gen. Card ', ['controller'=>'Invoices','action' => 'createcard', $patient->id],['title'=>'generate patient ID card']);
                        }
                       endforeach;
                    } if($userrole['id'] == 3){
                        echo $this->Html->link(' Triage ', ['controller'=>'Vitals','action' => 'newtriage', $patient->id],['title'=>'Add Triage', 'class'=>'fa fa-plus']);
                    }
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
     </div>

