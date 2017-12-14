


<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <?= $this->Html->link(BT_ADD, ['action' => 'add'], ['escape' => false]) ?>
    </div>

</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-3">
        <h3><?= __('ประเภทผู้ใช้งาน') ?></h3>
        <table class="table ">
            <thead>
                <tr>

                    <th scope="col"><?= $this->Paginator->sort('ชื่อ') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('isactive') ?></th>
                   

                    <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                    

                    <th scope="col" class="actions"><?= __('แก้ไข') ?></th>
                    <th scope="col" class="actions"><?= __('ลบ') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role): ?>
                    <tr>

                        <td><?= h($role->name) ?></td>
                        <td><?= h($role->isactive) ?></td>
                        <td><?= h($role->description) ?></td>

                     

                         <td class="actions">
                            <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', ['action' => 'edit', $role->id], ['escape' => false, 'label' => false]) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', ['action' => 'delete', $role->id], ['confirm' => __('ท่านต้องการลบข้อมูลสมาชืก ใช่ หรือ ไม่ '), 'escape' => false, 'label' => false]) ?>

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
            
        </div>
    </div>
</div>


