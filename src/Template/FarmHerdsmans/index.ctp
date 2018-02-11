
<div class="row">
    <div class="col-md-12">
        <?= $this->Form->create('herdsman', ['novalidate' => true, 'id' => 'herdsmanfrm', 'class' => '','url'=>['action'=>'addherdsman',$farm_id]]) ?>
        <?= $this->Form->hidden('farm_id', ['value' => $farm_id]) ?>
        <div class="form-group col-md-8 col-xs-9 col-md-offset-1">
            <?= $this->Form->select('herdsman_id', $herdsmans, ['class' => 'form-control col-md-12', 'id' => 'herdsman_id']) ?>
        </div>
        <div class="form-group col-md-2 col-xs-3">
            <button type="submit" class="btn btn-primary btn-block">เพิ่ม</button>
        </div>
        
        <?= $this->Form->end() ?>
    </div>
</div>

<div class="list-group" id="cow_list">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อ-นามสกุล</th>
                <th>เพิ่มโดย</th>
                <th></th>
            </tr>
        </thead>

        <?php foreach ($farmHerdsmans as $item): ?>
            <tr>
                <td><?= h($item->seq) ?></td>
                <td><?= h($item->herdsman->firstname . ' ' . $item->herdsman->lastname) ?></td>
                <td><?= h($item->createdby) ?></td>
                <td><?= $this->Form->postLink('<span class="label label-danger">ลบ</span>', ['action' => 'delete', $item->id, $item->farm_id], ['confirm' => __('คุณต้องการลบ "{0}"?', $item->herdsman->firstname . ' ' . $item->herdsman->lastname), 'escape' => false]) ?></td>
            </tr>
        <?php endforeach; ?>
        <?php if (is_null($farmHerdsmans) || sizeof($farmHerdsmans) == 0) { ?>
            <tr>
                <td colspan="4" class="text-center text-danger">ฟาร์มนี้ยังไม่มีเจ้าของ</td>
            </tr>
        <?php } ?>
    </table>
</div>
