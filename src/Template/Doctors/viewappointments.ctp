<div class="box">
    <div class="box-header">
        <h3 class="box-title">Appointments</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                     <th>ID</th>
                    <th>Patient</th>
                    <!--th>First name</th-->
                    <th>Doctor</th>
                    <th>Date</th>
                   
                    <th>Actions</th>
                </tr>
            </thead>
            

            <tbody>
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?= h($appointment->patient->uniquid) ?></td>
                        <td><?= $appointment->has('patient') ? $this->Html->link($appointment->patient->name, ['controller' => 'Patients', 'action' => 'viewpatient', $appointment->patient->id]) : ''
                ?></td>   

                        <td><?= $appointment->has('user') ? $this->Html->link($appointment->user->fname, ['controller' => 'Users', 'action' => 'view', $appointment->user->id]) : ''
                ?></td>

                        <td><?php if(time()<strtotime($appointment->appointment_date)){
                            echo '<span class="label label-success">'.date('D, d M Y H:m A', strtotime($appointment->appointment_date)).'</span>';
                        } else{
                          echo '<span class="label label-warning">'.date('D, d M Y H:m A', strtotime($appointment->appointment_date)).'</span>';   
                        }  ?>
                    
                        </td>

                        <td class="actions">
                            <!--<?= $this->Html->link(__(' '), ['action' => 'view', $appointment->id], ['class' => 'fa fa-search-plus view']) ?>-->
                            <?= $this->Html->link(__(' '), ['action' => 'editappointment', $appointment->id,$appointment->patient->name], ['class' => 'fa fa-edit']) ?>
                            <?= $this->Form->postLink(__(' '), ['action' => 'delete', $appointment->id], ['confirm' => __('Are you sure you want to delete this appointment with # {0}?', $appointment->patient->name), 'class' => 'fa fa-trash trash ic'])
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>
<!-- /.box -->


