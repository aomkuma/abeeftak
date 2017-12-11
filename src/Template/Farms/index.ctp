<div class="row">
    <div class="col-md-12">
        <h1 class="font-th-prompt400">ฟาร์ม</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?=$this->Html->link(BT_ADD,['action'=>'add'],['escape'=>false])?>
    </div>
    
</div>
<div class="row">
    <div class="col-md-12">
        <table cellpadding="0" cellspacing="0" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('type') ?></th>

                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($farms as $farm): ?>
                    <tr>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $farm->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $farm->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $farm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $farm->id)]) ?>
                        </td>
                        <td><?= h($farm->name) ?></td>
                        <td><?= h($farm->level) ?></td>
                        <td><?= h($farm->type) ?></td>

                        <td><?= h($farm->created) ?></td>
                        <td><?= h($farm->createdby) ?></td>
                        <td><?= h($farm->updated) ?></td>
                        <td><?= h($farm->updatedby) ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="farms index large-9 medium-8 columns content">
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
