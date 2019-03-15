<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bedallotment[]|\Cake\Collection\CollectionInterface $bedallotments
 */
?>
<!--nav class="large-3 medium-4 columns" id="actions-sidebar">
    
<div class="bedallotments index large-9 medium-8 columns content">
    <h3><?= __('Bedallotments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bed_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('allotment_timestamp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discharge_timestamp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bedallotments as $bedallotment): ?>
            <tr>
                <td><?= $this->Number->format($bedallotment->id) ?></td>
                <td><?= $bedallotment->has('bed') ? $this->Html->link($bedallotment->bed->id, ['controller' => 'Beds', 'action' => 'view', $bedallotment->bed->id]) : '' ?></td>
                <td><?= $bedallotment->has('patient') ? $this->Html->link($bedallotment->patient->name, ['controller' => 'Patients', 'action' => 'view', $bedallotment->patient->id]) : '' ?></td>
                <td><?= h($bedallotment->allotment_timestamp) ?></td>
                <td><?= h($bedallotment->discharge_timestamp) ?></td>
                <td><?= $bedallotment->has('user') ? $this->Html->link($bedallotment->user->id, ['controller' => 'Users', 'action' => 'view', $bedallotment->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bedallotment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bedallotment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bedallotment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bedallotment->id)]) ?>
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
</div-->



<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
<section class="content-header">
    <h1>
    Manage Bed Allotment
    </h1>
</section>
<!-- Main content -->
    <section class="content">

      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Bed Allotment List</a></li>
              <li><a href="#timeline" data-toggle="tab">Add Bed Allotment</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Patient ID</th>
                            <th>Patient Name</th>
                            <th>Gender</th>
                            <th>Requested By</th>
                             <th>Admitted On</th>
                             <th>Ward</th>
                            <th>Bed Number</th>
                           
                            <th>Admitted By</th>
                            <th>Discharge Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php 
                            $count = 0;
                            foreach ($admissions as $admission):
                            $count++;
                        ?>

                            <tr>
                            <td><?=$count?></td>
                            <td><?= h($admission->patient->uniquid) ?></td>
                <td><?= h($admission->patient->surname.' '.$admission->patient->name) ?></td>
                <td><?= h($admission->patient->sex) ?></td>
                <td><?= h($admission->user->fname) ?></td>
                <td><?= h(date('Y-m-d H:m A', strtotime($admission->admissiondate))) ?></td>
               
                <td><?= $admission->ward->wardname?></td>
                <td><?= $admission->bed->bed_number?>
                <?= $this->Form->control('admission_id', ['type' => 'hidden','value'=>$admission->id])?>
                
                </td>
                 <td><?= $admission->admittedby?></td>
                 <td>
                     <?php
                     if(!empty($admission->dischargedate)){
                     echo h(date('Y-m-d H:m A', strtotime($admission->dischargedate)));
                     }
                     ?>
               </td>
<!--                            <td align="center">
                                <a href="bedallotments/edit/<?=$admission->id?>" class="ic">
                                    <i class="fa fa-edit edit"></i>
                                </a>
                                <?= 
                                    $this->Form->postLink(__(''), 
                                        ['action' => 'delete', $admission->id, $admission->bed_number], 
                                        ['confirm' => __('Are you sure you want to delete # {0}?', $admission->id),'class'=>'fa fa-trash trash ic']
                                    ) 
                                ?>
                            </td>-->
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                        <th>S/N</th>
                            <th>Patient ID</th>
                            <th>Patient Name</th>
                            <th>Gender</th>
                            <th>Requested By</th>
                             <th>Admitted On</th>
                             <th>Ward</th>
                            <th>Bed Number</th>
                           
                            <th>Admitted By</th>
                            <th>Discharge Date</th>
                            <th></th>
                        </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <!--form class="form-horizontal"-->
                <?php
                    echo $this->Form->create(null, ['class'=>'form-horizontal',
                        'url' => ['controller'=>'Admissions','action'=>'allocatebedward']
                    ]);
                ?>
                
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Ward</label>
                    <div class="col-sm-6">
                        <?php
                            echo $this->Form->control('ward_id', 
                            ['class'=>'form-control', 'type'=>'select','label'=>false,'options'=>$wards]
                            );
                        ?>
                     </div>
                  </div>
                
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Bed Number</label>
                    <div class="col-sm-6">
                        <?php
                            echo $this->Form->control('bed_id', 
                            ['class'=>'form-control', 'type'=>'select','label'=>false,'options'=>$beds]
                            );
                        ?>
                     </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Patient</label>
                    <div class="col-sm-6">
                        <?php
                            echo $this->Form->control('patient_id', 
                            ['class'=>'form-control select2','label'=>false,'options'=>$patients]
                            );
                        ?>
                     </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Discharge Date</label>
                    <div class="col-sm-6">
                        <?php
                            echo $this->Form->control('discharge_timestamp', 
                            ['class'=>'form-control', 'type'=>'text','label'=>false,'id'=>'datepicker']
                            );
                        ?>
                     </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
