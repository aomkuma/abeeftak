<div class="row">
            <div class="col-md-12">
                <h1 class="font-th-prompt400">รายการผู้เลี้ยงโค</h1>
            </div>
        </div>
<div class="row">
    <div class="col-md-12">
        <?=$this->Html->link(BT_ADD,['action'=>'add'],['escape'=>false])?>
    </div> 
</div>
<br>
<div class="container">
    <div class="row">
        
        <table class="table table-bordered table-striped" style="width: 100%">
            <thead>
                <tr>
                    <th class="text-center"><?= $this->Paginator->sort('แก้ไข') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('ลบ') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('รหัส') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('ชื่อ-นามสกุล') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('วันที่ขึ้นทะเบียน') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($herdsmans as $herdsman): ?>
                    <tr>
                        <td class="text-center"><?= $this->Html->link(__('แก้ไข'), ['action' => 'edit', $herdsman->id]) ?></td>
                        <td class="text-center"><?= $this->Form->postLink(__('ลบ'), ['action' => 'delete', $herdsman->id], ['confirm' => __('Are you sure you want to delete # {0}?', $herdsman->id)]) ?></td>
                        <td class="text-center"><?= h($herdsman->code) ?></td>
                        <td class="text-center"><?= h($herdsman->title) ?> &nbsp;<?= h($herdsman->firstname) ?> &nbsp;&nbsp; <?= h($herdsman->lastname) ?></td>
                        <td class="text-center"><?= h($herdsman->registerdate) ?></td>
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
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>
</div>
