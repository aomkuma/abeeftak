<script>
    $(document).ready(function () {

        $(function () {
            $('#showdate1').hide();
            $('#showdate2').hide();
            $('#showdate3').hide();
            $('#showdate4').hide();
            $('#searchfrom').change(function () {
                if ($('#searchfrom').val() == '4') {

                    $('#showdate1').show();
                    $('#showdate2').show();
                    $('#showdate3').show();
                    $('#showdate4').show();
                    $('#search').hide();
                } else {
                    $('#showdate1').hide();
                    $('#showdate2').hide();
                    $('#showdate3').hide();
                    $('#showdate4').hide();
                    $('#search').show();
                }
            });
        });

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
    <div class="col-lg-12">
        <h1 class="page-header font-th-prompt400">ผู้เลี้ยงโค</h1>
    </div>
</div>

<br>
<div class="row">
    <div class="col-md-12">
        <?= $this->Form->create('Post', array('url' => '/herdsmans/index')); ?>
        <table class="table-condensed">
            <tr>
                <td><?= $this->Form->select('searchfrom', $searchfrom, ['empty' => 'ค้นหาจาก', 'class' => 'form-control', 'id' => 'searchfrom']); ?></td>  
                <td><?= $this->Form->input('search', ['class' => 'form-control', 'label' => false, 'id' => 'search']) ?></td>
            </tr>
            <tr >

                <td class="text-right" > <p id="showdate1">วันที่ขึ้นทะเบียน :</p></td>  
                <td ><input type="date" name="fromdate" class="form-control" id="showdate2"></td>
                <td ><p id="showdate3">ถึง</p></td>
                <td ><input type="date" name="todate" class="form-control" id="showdate4"></td>
                <td><?= $this->Form->button('ค้นหา', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'checkblank']) ?></td>
                <td><?= $this->Html->link(BT_ADD, ['action' => 'add'], ['escape' => false]) ?></td>

              <td> <?= $this->Html->link('Reset', ['action' => 'index'], ['escape' => false, 'label' => false, 'class' => 'btn btn-primary']) ?></td>
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
                        <td class="text-center"><?= $this->Html->link(BT_EDIT, ['action' => 'edit', $herdsman->id], ['escape' => false, 'label' => false]) ?></td>
                        <td class="text-center"><?= $this->Html->link(BT_DELETE, ['action' => 'delete', $herdsman->id], ['confirm' => __('ท่านต้องการลบข้อมูลสมาชืก ใช่ หรือ ไม่ '), 'escape' => false, 'label' => false]) ?></td>
                        <td class="text-center"><?= h($herdsman->code) ?></td>
                        <td class="text-center"><?= h($herdsman->title) ?> &nbsp;<?= h($herdsman->firstname) ?> &nbsp;&nbsp; <?= h($herdsman->lastname) ?></td>
                        <td class="text-center"><?= h($herdsman->idcard) ?></td>
                        <td class="text-center"><?php echo date("d-m-Y", strtotime($herdsman->registerdate)); ?>&nbsp;</td>
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
            <p><?= $this->Paginator->counter(['format' => __('หน้า {{page}} / {{pages}}, แสดง {{current}} รายการ จากทั้งหมด {{count}} รายการ')]) ?></p>
        </div>
    </div>
</div>
