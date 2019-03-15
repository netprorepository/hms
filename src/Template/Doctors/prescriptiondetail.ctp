<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
 
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> Prescription Details</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
          
            <th  style="padding: 10px;">Staff</th>
            <th  style="padding: 10px;">Patient</th>
            <th  style="padding: 10px;">History</th>
            <th  style="padding: 10px;">Medication</th>
           <th  style="padding: 10px;">Meds From Pham</th>
          <th  style="padding: 10px;">Description</th>
         <th  style="padding: 10px;">Prescribed On</th>
            <th  style="padding: 10px;">Action</th>
            
        </tr>
        </thead>
        
        
         <tbody>
           
            <tr>
                

                <td  style="padding: 10px;"><?= $this->Html->link($prescription->user->fname, ['controller' => 'Users', 'action' => 'view', $prescription->user->id]) ?></td>
                <td style="padding: 10px;" ><?= $this->Html->link($prescription->patient->name, ['controller' => 'Patients', 'action' => 'viewpatient', $prescription->patient->id])?></td>
                <td  style="padding: 10px;"><?= h($prescription->case_history) ?></td>
                <td style="padding: 10px;" ><?= h($prescription->medication) ?></td>
                <td style="padding: 10px;" ><?= h($prescription->medication_from_pharmacist) ?></td>
                <td style="padding: 10px;" ><?= h($prescription->description) ?></td>
                <td style="padding: 10px;" ><?= h(date('Y-m-d H:i a', strtotime($prescription->creation_timestamp))) ?></td>
                <td  style="padding: 10px;" class="actions">
                    
      <?php if($userrole['id']==2){             
 echo $this->Html->link(__(' '), ['action' => 'editprescription', $prescription->id],['class'=>'fa fa-edit']) ?>
                    <?= $this->Form->postLink(__(' '), ['action' => 'delete', $prescription->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', $prescription->id),'class'=>'fa fa-trash trash ic']);
               
                       } 
                  ?>
                </td>
            </tr>
          
        </tbody>
        
        
        </table>
    </div>
</div>
<!-- /.box -->


<!-- diagnostic reports-->
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> Diagnostics</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
          
            <th  style="padding: 10px;">Staff</th>
            <th  style="padding: 10px;">Patient</th>
            <th  style="padding: 10px;">Report Type</th>

           <th  style="padding: 10px;">File</th>
          <th  style="padding: 10px;">Description</th>
        <th  style="padding: 10px;">Report</th>
       <th  style="padding: 10px;">Status</th>
         <th  style="padding: 10px;">Date</th>
            <th  style="padding: 10px;">Action</th>
            
        </tr>
        </thead>
        
        
         <tbody>
           <?php foreach ($prescription->diagnosisreports as $diagnostics): ?>
            <tr>
                

                <td  style="padding: 10px;"><?= $this->Html->link($diagnostics->user->fname, ['controller' => 'Users', 'action' => 'view', $prescription->user->id]) ?></td>
                <td style="padding: 10px;" ><?= $this->Html->link($prescription->patient->name, ['controller' => 'Patients', 'action' => 'viewpatient', $prescription->patient->id])?></td>
                <td style="padding: 10px;" ><?= h($diagnostics->report_type) ?></td>
                <td  style="padding: 10px;"><?= $this->Html->image($diagnostics->file_name, [ 'alt'=>'User Image', 'style'=>'width: 150px; height: 100px;']) ?></td>
                <td style="padding: 10px;" ><?= h($diagnostics->description) ?></td>
                <td style="padding: 10px;" ><?= h($diagnostics->report) ?></td>
                <td style="padding: 10px;" ><?= h($diagnostics->status) ?></td>
                <td style="padding: 10px;" ><?= h(date('Y-m-d H:i a', strtotime($diagnostics->created_date))) ?></td>
                <td  style="padding: 10px;" class="actions">
                    
      <?php if($userrole['id']==2){             
 echo $this->Html->link(__(' '), ['action' => 'editprescription', $diagnostics->id],['class'=>'fa fa-edit']) ?>
                    <?= $this->Form->postLink(__(' '), ['action' => 'delete', $diagnostics->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', $diagnostics->id),'class'=>'fa fa-trash trash ic']);
               
                       }  else if($userrole['id']==5){
                    echo $this->Html->link(__('Add Report '), ['controller'=>'Diagnosisreports','action' => 'editreport',$diagnostics->id],
                            ['class'=>'fa fa-edit','title'=>'add diagnostic report']);
               echo $this->Html->link(__('View Report '), ['controller'=>'Diagnosisreports','action' => 'viewreport',$diagnostics->id],
                       ['class'=>'fa fa-search-plus view','title'=>'view diagnostic report']);
                    
                    
                }  ?>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        
        
        </table>
    </div>
</div>
<!-- end diagnostic reports -->


<!-- start labtest reports-->
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> Lab Tests</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
          
            <th  style="padding: 10px;">Staff</th>
            <th  style="padding: 10px;">Patient</th>
           
          <th  style="padding: 10px;">Description</th>
        <th  style="padding: 10px;">Report</th>
        <th  style="padding: 10px;">Comment</th>
       <th  style="padding: 10px;">Status</th>
         <th  style="padding: 10px;">Date</th>
            <th  style="padding: 10px;">Action</th>
            
        </tr>
        </thead>
        
        
         <tbody>
           <?php foreach ($prescription->labtests as $tests): ?>
            <tr>
                

                <td  style="padding: 10px;"><?= $this->Html->link($tests->user->fname.' '.$tests->user->lname, 
                        ['controller' => 'Users', 'action' => 'view', $prescription->user->id]) ?></td>
                <td style="padding: 10px;" ><?= $this->Html->link($prescription->patient->name, ['controller' => 'Patients', 'action' => 'viewpatient', $prescription->patient->id])?></td>
                <td style="padding: 10px;" ><?= h($tests->description) ?></td>
               
                <td style="padding: 10px;" ><?= h($tests->result) ?></td>
                <td style="padding: 10px;" ><?= h($tests->comment) ?></td>
                <td style="padding: 10px;" ><?= h($tests->status) ?></td>
                <td style="padding: 10px;" ><?= h(date('Y-m-d H:i a', strtotime($tests->date_added))) ?></td>
                <td  style="padding: 10px;" class="actions">
                    
      <?php if($userrole['id']==2){             
 echo $this->Html->link(__(' '), ['action' => 'editprescription', $diagnostics->id],['class'=>'fa fa-edit']) ?>
                    <?= $this->Form->postLink(__(' '), ['action' => 'delete', $diagnostics->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', $diagnostics->id),'class'=>'fa fa-trash trash ic']);
               
                       }  else if($userrole['id']==5){
                    echo $this->Html->link(__('Add Lab Report '), ['controller'=>'Labtests','action' => 'editreport',$tests->id],
                            ['class'=>'fa fa-edit','title'=>'add lab report']);
               echo $this->Html->link(__('View Lab Report '), ['controller'=>'Labtests','action' => 'viewreport',$tests->id],
                       ['class'=>'fa fa-search-plus view','title'=>'view lab report']);
                    
                    
                }  ?>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        
        
        </table>
    </div>
</div>

<!--end lab test report -->


