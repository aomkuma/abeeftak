

<div class="row">
    <div class="col-lg-8  ">
        <?= $this->Html->link(BT_BACK, ['action' => 'index'], ['escape' => false]) ?>
    </div>

</div>
<div class="row">
    <?= $this->Form->create('Post', array('url' => '/users/searchuser')); ?>
    <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2">
        <div class="col-lg-6 ">
            <h3><?= __('ผู้ใช้ระบบ') ?></h3>
        </div>
        <div class="col-lg-6 ">
            <div class="input-group">

                <?= $this->Form->control('txtSearch', ['class' => 'form-control', 'label' => false, 'placeholder' => 'กรุณากรอกชื่อ']) ?>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th scope="col" class="actions"><?= __('แก้ไข') ?></th>
                    <th scope="col" class="actions"><?= __('ลบ') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('ชื่อ') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('นามสกุล') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('E-mail') ?></th>

                    <th scope="col"><?= $this->Paginator->sort('ประเภท') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('ตำแหน่ง') ?></th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="actions">
                            <?= $this->Html->link('<i class="glyphicon glyphicon-edit"></i>', ['action' => 'edit', $user->id], ['escape' => false, 'label' => false]) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', ['action' => 'delete', $user->id], ['confirm' => __('ท่านต้องการลบข้อมูลสมาชืก ใช่ หรือ ไม่ '), 'escape' => false, 'label' => false]) ?>

                        </td>
                        <td><?= h($user->firstname) ?></td>
                        <td><?= h($user->lastname) ?></td>
                        <td><?= h($user->email) ?></td>

                        <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                        <td><?= h($user->position) ?></td>


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
    <?= $this->Form->end() ?>
</div>


