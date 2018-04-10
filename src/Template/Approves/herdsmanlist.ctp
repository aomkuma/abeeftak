<div class="list-group" id="cow_list">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อ-นามสกุล</th>
        
                <th></th>
            </tr>
        </thead>
        <?php $count = 1; ?>
        <?php foreach ($herdsmans as $item): ?>
            <tr>
                <td><?= h($count) ?></td>
                <td><?= h($item->firstname.' '.$item->lastname) ?></td>
                <td class="text-right">
                    <?= $this->Form->postLink('<span class="label label-success">อนุมัติ</span>', ['action' => 'herdsman', $item->id], ['escape' => false]) ?>
                </td>
             </tr>
            <?php $count++; ?>
        <?php endforeach; ?>
        <?php if (is_null($herdsmans) || sizeof($herdsmans) == 0) { ?>
            <tr>
                <td colspan="3"  class="text-center text-danger">
                    ไม่มีรายการขออนุมัติ
                </td>
            </tr>
        <?php } ?>

    </table>
</div>
