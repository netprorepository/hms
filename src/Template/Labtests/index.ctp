 <?= $this->Flash->render() ?>
<div class="labtests index large-9 medium-8 columns content">
    <h3><?= __('Labtests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prescription_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_added') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($labtests as $labtest): ?>
            <tr>
                <td><?= $this->Number->format($labtest->id) ?></td>
                <td><?= $labtest->has('prescription') ? $this->Html->link($labtest->prescription->id, ['controller' => 'Prescriptions', 'action' => 'view', $labtest->prescription->id]) : '' ?></td>
                <td><?= h($labtest->date_added) ?></td>
                <td><?= $labtest->has('user') ? $this->Html->link($labtest->user->id, ['controller' => 'Users', 'action' => 'view', $labtest->user->id]) : '' ?></td>
                <td><?= $this->Number->format($labtest->description) ?></td>
                <td><?= $this->Number->format($labtest->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $labtest->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $labtest->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $labtest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $labtest->id)]) ?>
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
</div>
