<div class="box">
    <?php $userrole = $this->request->getSession()->read('usersroles');?>
    <div class="box-header">
        <h3 class="box-title">View Consultations</h3>
         <?= $this->Flash->render() ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          
            <th>Staff</th>
            <th>Patient</th>
           
           
         <th>Consultation Date</th>
            <th>Action</th>
            
        </tr>
        </thead>
        
        
         <tbody>
            <?php foreach ($consultations as $consultation): ?>
            <tr>
                

                <td><?= $consultation->has('user') ? $this->Html->link($consultation->user->fname, ['controller' => 'Users', 'action' => 'view', $consultation->user->id]) : '' ?></td>
                <td><?= $consultation->has('patient') ? $this->Html->link($consultation->patient->name, ['controller' => 'Patients', 'action' => 'viewpatient', $consultation->patient->id]) : '' ?></td>
              
               
                <td><?= h(date('Y-m-d H:i a', strtotime($consultation->consultationday))) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__(' '), ['action' => 'consultationdetail', $consultation->id],['class'=>'fa fa-search-plus view','title'=>'view consultation details']) ?>
                    <?php   if($userrole['id'] == 2){
                   echo $this->Html->link(__(' '), ['action' => 'editconsultation', $consultation->id],['class'=>'fa fa-edit','edit consultation']);
                    echo $this->Form->postLink(__(' '), ['action' => 'delete', $consultation->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', 'this consultation'),'class'=>'fa fa-trash trash ic','title'=>'delete consultation']);
            
               echo $this->Html->link(__(' Add Diagnosis '), ['controller'=>'Diagnosisreports','action' => 'addreport', $consultation->id],['class'=>'fa fa-plus','title'=>'add new diagnosis']);
                //   echo $this->Html->link(__(' Add Lab Test '), ['controller'=>'Labtests','action' => 'addtests', $consultation->id],['class'=>'fa fa-edit','title'=>'add new recommended tests']);
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




<!--<div class="consultations index large-9 medium-8 columns content">
    <h3><?= __('Consultations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('consultationday') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hpc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pmh') ?></th>
                <th scope="col"><?= $this->Paginator->sort('psh') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dh') ?></th>
                <th scope="col"><?= $this->Paginator->sort('allergies') ?></th>
                <th scope="col"><?= $this->Paginator->sort('socialhistory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('impression') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('poh') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pgh') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lmp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ga') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diagnosis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('treatmentplan_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultations as $consultation): ?>
            <tr>
                <td><?= $this->Number->format($consultation->id) ?></td>
                <td><?= $consultation->has('patient') ? $this->Html->link($consultation->patient->name, ['controller' => 'Patients', 'action' => 'view', $consultation->patient->id]) : '' ?></td>
                <td><?= $consultation->has('user') ? $this->Html->link($consultation->user->id, ['controller' => 'Users', 'action' => 'view', $consultation->user->id]) : '' ?></td>
                <td><?= h($consultation->consultationday) ?></td>
                <td><?= h($consultation->pc) ?></td>
                <td><?= h($consultation->hpc) ?></td>
                <td><?= h($consultation->pmh) ?></td>
                <td><?= h($consultation->psh) ?></td>
                <td><?= h($consultation->dh) ?></td>
                <td><?= h($consultation->allergies) ?></td>
                <td><?= h($consultation->socialhistory) ?></td>
                <td><?= h($consultation->impression) ?></td>
                <td><?= h($consultation->hp) ?></td>
                <td><?= h($consultation->poh) ?></td>
                <td><?= h($consultation->pgh) ?></td>
                <td><?= h($consultation->lmp) ?></td>
                <td><?= h($consultation->ga) ?></td>
                <td><?= h($consultation->edd) ?></td>
                <td><?= $this->Number->format($consultation->parity) ?></td>
                <td><?= $this->Number->format($consultation->diagnosis) ?></td>
                <td><?= $this->Number->format($consultation->treatmentplan_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $consultation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $consultation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $consultation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consultation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>-->
