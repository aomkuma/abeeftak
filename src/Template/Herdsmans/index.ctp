<script>
    $(document).ready(function () {

        $('#checkblank').click(function () {

            var searchfrom = $('#searchfrom').val();
            var fromdate = $('#fromdate').val();
            var todate = $('#todate').val();
            var search = $('#search').val();

            if (searchfrom !== '') {
                if (searchfrom === '4') {
                    if (fromdate === null || todate === null) {
                        alert("กรุณากรอกวันที่เพื่อค้นหา");
                        return false;
                    }
                } else {
                    if (search === '') {
                        alert("กรุณากรอกข้อมูลเพื่อค้นหา");
                        $('#search').focus();
                        return false;
                    }
                }

            } else {
                alert("กรุณาเลือกการค้นหา");
                $('#searchfrom').focus();
                return false;
            }

        });

    });
</script>

<div class="row">
    <div class="col-md-12">
        <h1 class="font-th-prompt400">รายการผู้เลี้ยงโค</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <?= $this->Html->link(BT_ADD, ['action' => 'add'], ['escape' => false]) ?>
    </div> 
</div>
<br>
<div class="container">
    <div class="row">
        <?= $this->Form->create('Post', array('url' => '/herdsmans/index')); ?>
        <table class="table-condensed">
            <tr>
                <td><?= $this->Form->select('searchfrom', $searchfrom, ['empty' => 'ค้นหาจาก', 'class' => 'form-control', 'id' => 'searchfrom']); ?></td>  
                <td><?= $this->Form->input('search', ['class' => 'form-control', 'label' => false, 'id' => 'search']) ?></td>
            </tr>
            <tr>
                <td class="text-right">วันที่ขึ้นทะเบียน : </td>  
                <td>
                    <div class='input-group date' id='datetimepicker1'> 
                        <?= $this->Form->text('fromdate', ['class' => 'form-control', 'id' => 'todate', 'label' => false, 'readonly' => 'readonly']) ?> 
                        <span class="input-group-addon"> 
                            <span class="glyphicon glyphicon-th"></span> 
                        </span> 
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datepicker({

                                format: 'dd-mm-yyyy',
                                language: 'th',
                                thaiyear: true,
                                ignoreReadonly: true
                            });
                        });
                    </script>
                </td>
                <td>ถึง</td>
                <td>
                    <div class='input-group date' id='datetimepicker2'> 
                        <?= $this->Form->text('todate', ['class' => 'form-control', 'id' => 'todate', 'label' => false, 'readonly' => 'readonly']) ?> 
                        <span class="input-group-addon"> 
                            <span class="glyphicon glyphicon-th"></span> 
                        </span> 
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker2').datepicker({

                                format: 'dd-mm-yyyy',
                                language: 'th',
                                thaiyear: true,
                                ignoreReadonly: true
                            });
                        });
                    </script>
                </td>
                <td><?= $this->Form->button('ค้นหา', ['class' => 'btn btn-primary', 'id' => 'checkblank']) ?></td>
            </tr>
        </table>
        <?= $this->Form->end() ?>
        <br>
        <table class="table table-bordered table-striped" style="width: 100%">
            <thead>
                <tr>
                    <th class="text-center"><?= $this->Paginator->sort('แก้ไข') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('ลบ') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('รหัส') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('ชื่อ-นามสกุล') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('เลขประจำตัวประชาชน') ?></th>
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
                        <td class="text-center"><?= h($herdsman->idcard) ?></td>
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
