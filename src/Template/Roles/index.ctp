
<div class="page-header col-lg-6 col-md-6 col-sm-6 col-lg-offset-3">
    <h3>ประเภทผู้ใช้งาน</h3>
</div>
<div class="form-group row col-lg-6 col-md-6 col-sm-6 col-lg-offset-3">
    <div class="col-lg-6 col-md-6 col-sm-6 ">
        <div class="col-lg-9 col-md-9 col-sm-9 " >
            <?= $this->Html->link('<button type="button" class="btn btn-info btn-block"><i class="glyphicon glyphicon-plus"></i> เพิ่มประเภทผู้ใช้งาน</button>', ['action' => 'add'], ['escape' => false]) ?>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 " >
        <div class="col-lg-9 col-md-9 col-sm-9 " >
            <?= $this->Html->link('<button type="button" class="btn btn-info btn-block"><i class="glyphicon glyphicon-plus"></i> ข้อมูลผู้ใช้งาน</button>', ['controller' => 'users', 'action' => 'index'], ['escape' => false]) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-3">

        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th scope="col" class="actions" style="text-align: center"><?= __('แก้ไข') ?></th>
                    <th scope="col" class="actions"style="text-align: center"><?= __('ลบ') ?></th>
                    <th scope="col"style="text-align: center"><?= $this->Paginator->sort('ชื่อ') ?></th>
                    <th scope="col"style="text-align: center"><?= $this->Paginator->sort('สถานะ') ?></th>


                    <th scope="col"style="text-align: center"><?= $this->Paginator->sort('คำอธิบาย') ?></th>



                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role): ?>
                    <tr>
                        <td class="actions"style="text-align: center">
                            <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $role->id], ['escape' => false, 'label' => false]) ?></td>
                        <td class="actions"style="text-align: center">
                            <?= $this->Html->link(BT_DELETE, ['action' => 'delete', $role->id], ['confirm' => __('ท่านต้องการลบข้อมูลสมาชืก ใช่ หรือ ไม่ '), 'escape' => false, 'label' => false]) ?>

                        </td>
                        <td style="text-align: center"><?= h($role->name) ?></td>
                        <td style="text-align: center"><?= h($role->isactive) ?></td>
                        <td><?= h($role->description) ?></td>




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


