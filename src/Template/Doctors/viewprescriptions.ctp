<div class="box">
    <?php $userrole = $this->request->getSession()->read('usersroles');?>
    <div class="box-header">
        <h3 class="box-title">View Prescriptions</h3>
         <?= $this->Flash->render() ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          
            <th>Staff</th>
            <th>Patient</th>
           
           
         <th>Prescribed On</th>
            <th>Action</th>
            
        </tr>
        </thead>
        
        
         <tbody>
            <?php foreach ($prescriptions as $prescription): ?>
            <tr>
                

                <td><?= $prescription->has('user') ? $this->Html->link($prescription->user->fname, ['controller' => 'Users', 'action' => 'view', $prescription->user->id]) : '' ?></td>
                <td><?= $prescription->has('patient') ? $this->Html->link($prescription->patient->name, ['controller' => 'Patients', 'action' => 'viewpatient', $prescription->patient->id]) : '' ?></td>
              
               
                <td><?= h(date('Y-m-d H:i a', strtotime($prescription->creation_timestamp))) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__(' '), ['action' => 'prescriptiondetail', $prescription->id],['class'=>'fa fa-search-plus view','title'=>'view prescription details']) ?>
                    <?php   if($userrole['id'] == 2){
                   echo $this->Html->link(__(' '), ['action' => 'editprescription', $prescription->id],['class'=>'fa fa-edit','edit prescription']);
                    echo $this->Form->postLink(__(' '), ['action' => 'delete', $prescription->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', $prescription->id),'class'=>'fa fa-trash trash ic','title'=>'delete prescription']);
            
               echo $this->Html->link(__(' Add Diagnosis '), ['controller'=>'Diagnosisreports','action' => 'addreport', $prescription->id],['class'=>'fa fa-plus','title'=>'add new diagnosis']);
                   echo $this->Html->link(__(' Add Lab Test '), ['controller'=>'Labtests','action' => 'addtests', $prescription->id],['class'=>'fa fa-edit','title'=>'add new recommended tests']);
              }
             
              
              ?>
                    
                    
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        
        
        </table>
    </div>
</div>
<!-- /.box -->


