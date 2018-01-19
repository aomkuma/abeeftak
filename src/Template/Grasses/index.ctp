<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header font-th-prompt400">พันธุ์หญ้า</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 bt-tool-group">
        <?= $this->Html->link(BT_ADD, ['action' => 'add'], ['escape' => false]) ?>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
                <th scope="col">ชื่อพันธุ์</th>
                <th scope="col">เพิ่มโดย</th>
                <th scope="col">วันที่เพิ่ม</th>
                <th scope="col">แก้ไขโดย</th>
                <th scope="col">วันที่แก้ไข</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grasses as $grass): ?>
            <tr>
                <td class="actions">
                    <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $grass->id],['escape'=>false]) ?>
                    <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $grass->id], ['confirm' => __('คุณต้องการลบ "{0}"?', $grass->name),'escape'=>false]) ?>
                </td>
                <td><?= h($grass->name) ?></td>
                <td><?= h($grass->createdby) ?></td>
                <td><?= h($grass->created) ?></td>
                <td><?= h($grass->updatedby) ?></td>
                <td><?= h($grass->updated) ?></td>
                
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
