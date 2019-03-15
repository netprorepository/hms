<div class="prescriptions index large-9 medium-8 columns content">
    <h3><?= __('Prescriptions') ?></h3>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">S/N</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Date</th>
                <th scope="col">Staff</th>
                <th scope="col">Medication</th>
                <th scope="col">Description</th>
              <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $count = 0;
            foreach ($prescriptions as $prescription): 
             $count++;
            ?>
            <tr>
                <td><?= $count ?></td>
                <td><?= $prescription->consultation->patient->name." ".$prescription->consultation->patient->surname ?></td>
                <td><?= date('d M, Y h:m a', strtotime($prescription->creation_timestamp)) ?></td>
                <td><?= $prescription->user->fname. " ".$prescription->user->lname ?></td>
                <td><?= ($prescription->medication) ?></td>
                <td><?= ($prescription->description) ?></td>
              <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $prescription->id]) ?>
               <!--       <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prescription->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescription->id)]) ?>
                </td>-->
            </tr>
            <?php  endforeach; ?>
        </tbody>
    </table>
</div>
