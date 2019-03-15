<?php $userrole = $this->request->getSession()->read('usersroles');?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manage Patients Discharge</h3>
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
          <th>Date Of Birth</th>
          <th>Blood Group</th>
          <th>Date Of Admission</th>
            <th>Status</th>
         <th>Actions</th>
            
        </tr>
        </thead>
        <tbody>
            <?php foreach ($admissions as $admission): ?>
            <tr>
               <td><?= h($admission->patient->uniquid) ?></td>
                <td><?= h($admission->patient->surname.' '.$admission->patient->name) ?></td>
<!--                <td><?= h($admission->patient->address) ?></td>-->
                <!--td><?= h($patient->phone) ?></td-->
                <td><?= h($admission->patient->sex) ?></td>
             <td><?= h(date('Y-m-d', strtotime($admission->patient->birth_date))) ?></td>
                <td><?= h($admission->patient->blood_group) ?></td>
                <td><?= h(date('Y-m-d H:i A', strtotime($admission->admissiondate))) ?></td>
                <td><?= h($admission->status) ?></td>
                <td class="actions"> 
                    <?= $this->Html->link(' ', ['action' => 'viewpatient', $admission->patient->id],['class'=>'fa fa-search-plus view','title'=>'view patient']) ?> |
                   <?php if($userrole['id'] == 2){
                       if($admission->dischargerequested=="no"){
                    
                           echo $this->Form->postLink(' Request Discharge', ['controller'=>'admissions','action' => 'requestdischarge',$admission->id, $admission->patient->id], 
                            ['confirm' => __('Are you sure you want to request for the discharge of # {0}?', $admission->patient->name),'class'=>'fa fa-plus']);
                   
                       }
                       else if($admission->dischargerequested=="yes"){
                           echo '<span class="label label-info">Discharge Requested</>';
                       }
                       else{echo '<span class="label label-success">Discharged</>';}
                       ?>
                    
                   <?php } else if($userrole['id'] == 3){
                       echo $this->Html->link(' Generate Invoice', ['controller'=>'Invoices','action' => 'newinvoice', $admission->patient->id],['class'=>'fa fa-edit','title'=>'generate invoice']); 
                     
                            echo $this->Html->link('| Discharge Patient ', ['controller'=>'Discharges','action' => 'discharge', $admission->patient->id],['title'=>'discharge this patient']);
                        
                      
                    }
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
     </div>


