<div class="list-group" id="cow_list">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>รหัส</th>
                <th>เพิ่มโดย</th>
                <th></th>
            </tr>
        </thead>
        <?php foreach ($farmCows as $item): ?>
            <tr>
                <td><?= h($item->seq) ?></td>
                <td><?= h($item->cow->code) ?></td>
                <td><?= h($item->createdby) ?></td>
                <td><?= $this->Form->postLink('<span class="label label-warning">เปลี่ยนเจ้าของ</span>', ['action' => 'delete', $item->id,$item->farm_id], ['confirm' => __('คุณต้องการลบ "{0}"?', ''), 'escape' => false]) ?>
                <?= $this->Form->postLink('<span class="label label-danger">ลบ</span>', ['action' => 'delete', $item->id,$item->farm_id], ['confirm' => __('คุณต้องการลบ "{0}"?', ''), 'escape' => false]) ?></td>
            </tr>


        <?php endforeach; ?>
        
    </table>
</div>
