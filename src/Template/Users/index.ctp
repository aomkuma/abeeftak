<div class="page-header col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2">
    <h3>ผู้ใช้ระบบ</h3>

</div>

<div class="form-group row">
    <?= $this->Form->create('Post', ['horizontal' => true, 'url' => '/users/searchuser']); ?>
    <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2">

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

            <?= $this->Html->link(BT_ADDUSER, ['action' => 'add'], ['escape' => false]) ?>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

            <?= $this->Html->link('<button type="button" class="btn btn-info btn-block"> ข้อมูลประเภทผู้ใช้งาน</button>', ['action' => 'index', 'controller' => 'roles'], ['escape' => false]) ?>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="input-group">

                <?= $this->Form->control('txtSearch', ['class' => 'form-control', 'label' => false, 'placeholder' => 'กรุณากรอกชื่อ']) ?>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </div> 


    </div>
    <?= $this->Form->end() ?>
</div>
<div class="form-group row">

    <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2">

        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th scope="col" class="actions" style="text-align: center"><?= __('แก้ไข') ?></th>
                    <th scope="col" class="actions"style="text-align: center"><?= __('ลบ') ?></th>
                    <th scope="col"style="text-align: center"><?= $this->Paginator->sort('ชื่อ - นามสกุล') ?></th>

                    <th scope="col"style="text-align: center"><?= $this->Paginator->sort('E-mail') ?></th>

                    <th scope="col"style="text-align: center"><?= $this->Paginator->sort('ประเภท') ?></th>
                    <th scope="col"style="text-align: center"><?= $this->Paginator->sort('ตำแหน่ง') ?></th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="actions" style="text-align: center">
                            <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $user->id], ['escape' => false, 'label' => false]) ?></td>
                        <td class="actions" style="text-align: center">
                          
                            <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $user->id], ['confirm' => __('ท่านต้องการลบข้อมูลสมาชืก ใช่ หรือ ไม่ '), 'escape' => false]) ?>
                        </td>
                        <td><?= h($user->firstname . "    " . $user->lastname) ?></td>

                        <td><?= h($user->email) ?></td>

                        <td style="text-align: center"><?= $user->role->name ?></td>
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

</div>

