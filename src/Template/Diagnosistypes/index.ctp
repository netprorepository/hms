<?php $userrole = $this->request->getSession()->read('usersroles');?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manage Diagnosis Types</h3>
         <?= 
                                    $this->Html->link(
                                        __(' New Diagnosis Type'), 
                                        ['controller'=>'Diagnosistypes','action' => 'newdiagnosistype'],
                                        ['class'=>'fa fa-plus pull-right','type'=>'add new diagnosis type']
                                    ) 
                                   ?>
     
        <?= $this->Flash->render() ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th> ID</th>
            <th> Name</th>
           <th>Cost(N)</th>
         <th>Actions</th>
            
        </tr>
        </thead>
        <tbody>
            <?php foreach ($diagnosistypes as $diagnosistype): ?>
            <tr>
                <td><?= $this->Number->format($diagnosistype->id) ?></td>
                <td><?= h($diagnosistype->name) ?></td>
                <td><?= h(number_format($diagnosistype->cost)) ?></td>
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diagnosistype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diagnosistype->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $diagnosistype->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
   
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
