<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header font-th-prompt400">ฟาร์ม</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-10  col-lg-offset-1">
        <?= $this->Form->create('search', ['novalidate' => true, 'id' => 'frm', 'method' => 'get', 'class' => '']) ?>

        <div class="col-md-4">
            <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'id' => 'name', 'placeholder' => 'ชื่อฟาร์ม']) ?>

        </div>
        <div class="col-md-3">
            <?= $this->Form->select('level', $farm_levels, ['empty'=>'ระดับของฟาร์ม..','class' => 'form-control', 'id' => 'level']) ?>
        </div>
        <div class="col-md-3">
            <?= $this->Form->select('type', $farm_types, ['empty'=>'ประเภทของฟาร์ม..','class' => 'form-control', 'id' => 'type']) ?>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
        </div>
        
        <?= $this->Form->end() ?>
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
                    <th scope="col">ชื่อฟาร์ม</th>
                    <th scope="col">ระดับ</th>
                    <th scope="col">ประเภท</th>
                    <th>ที่อยู่</th>
                    <th scope="col">วันที่เพิ่ม</th>
                    <th scope="col">ผู้เพิ่ม</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($farms as $farm): ?>

                    <tr>
                        <td class="actions">
                            <?= $this->Html->link(BT_VIEW, ['action' => 'view', $farm->id], ['escape' => false]) ?>
                            <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $farm->id], ['escape' => false]) ?>
                            <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $farm->id], ['confirm' => __('คุณต้องการลบ "{0}"?', $farm->name), 'escape' => false]) ?>
                        </td>
                        <td><?= $this->Html->link(h($farm->name), ['action' => 'view', $farm->id], []) ?></td>
                        <td><?= h($farm->level) ?></td>
                        <td><?= h($farm->type) ?></td>
                        <td>
                            <?php
                            $address = '';
                            if (!is_null($farm->address->villagename)) {
                                $address = $address . 'หมู่บ้าน ' . $farm->address->villagename . ' ';
                            }
                            if (!is_null($farm->address->subdistrict)) {
                                $address = $address . 'ตำบล ' . $farm->address->subdistrict . ' ';
                            }
                            if (!is_null($farm->address->district)) {
                                $address = $address . 'อำเภอ ' . $farm->address->district . ' ';
                            }
                            ?>
                            <?= h($address) ?>
                        </td>
                        <td><?= h($farm->created) ?></td>
                        <td><?= h($farm->createdby) ?></td>

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
