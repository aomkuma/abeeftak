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
                <td><?= $this->Form->postLink('<span class="label label-danger">ลบ</span>', ['action' => 'delete', $item->id, $item->farm_id], ['confirm' => __('คุณต้องการลบ "{0}"?', ''), 'escape' => false]) ?></td>
            </tr>
        <?php endforeach; ?>
        <?php if (is_null($farmHerdsmans) || sizeof($farmHerdsmans) == 0) { ?>
            <tr>
                <td colspan="4" class="text-center text-danger">ฟาร์มนี้ยังไม่มีเข้าของ</td>
            </tr>
        <?php } ?>
    </table>
</div>
