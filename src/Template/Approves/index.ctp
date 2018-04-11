<div class="list-group" id="cow_list">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>รายการ</th>
            
                <th></th>
            </tr>
        </thead>
        <?php $count = 1; ?>
        
        <?php foreach ($herdsmanTransactions as $item): ?>
            <tr>
                <td><?= h($count) ?></td>
                <td><?= h($item->request_note) ?></td>
        
                <td class="text-right">
                    <?= $this->Html->link('<span class="label label-success">อนุมัติ</span>', ['controller'=>'herdsmans','action' => 'approve', $item->id], ['escape' => false]) ?>
                </td>
             </tr>
            <?php $count++; ?>
        <?php endforeach; ?>
        
        <?php foreach ($cowTransactions as $item): ?>
            <tr>
                <td><?= h($count) ?></td>
                <td><?= h($item->request_note) ?></td>
        
                <td class="text-right">
                    <?= $this->Html->link('<span class="label label-success">อนุมัติ</span>', ['controller'=>'cows','action' => 'approve', $item->id], ['escape' => false]) ?>
                </td>
             </tr>
            <?php $count++; ?>
        <?php endforeach; ?>
             
             
        <?php foreach ($farmTransaction as $item): ?>
            <tr>
                <td><?= h($count) ?></td>
                <td><?= h($item->request_note) ?></td>
        
                <td class="text-right">
                    <?= $this->Html->link('<span class="label label-success">อนุมัติ</span>', ['controller'=>'farms','action' => 'approve', $item->id], ['escape' => false]) ?>
                </td>
             </tr>
            <?php $count++; ?>
        <?php endforeach; ?>
             
        <?php if (is_null($transactions) || sizeof($transactions) == 0) { ?>
            <tr>
                <td colspan="3"  class="text-center text-danger">
                    ไม่มีรายการขออนุมัติ
                </td>
            </tr>
        <?php } ?>

    </table>
</div>

