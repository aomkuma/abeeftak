<?= $this->Html->script('herdsman/herdsman_report.js') ?>
<?= $this->Html->script('/jquery.Thailand.js/dependencies/JQL.min.js') ?>
<?= $this->Html->script('/jquery.Thailand.js/dependencies/typeahead.bundle.js') ?>

<?= $this->Html->css('/jquery.Thailand.js/dist/jquery.Thailand.min.css') ?>
<?= $this->Html->script('/jquery.Thailand.js/dist/jquery.Thailand.min.js') ?>

<script>
    var jsondata = <?= $jsondata == null ? "''" : $jsondata ?>;
    var filter_text = '<?= $filter_text ?>';
    exportPDF(jsondata, filter_text);

    //console.log(jsondata);
</script>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header font-th-prompt400">รายงานผู้เลี้ยงโค</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-10  col-lg-offset-1">
        <?= $this->Form->create('search', ['novalidate' => true, 'id' => 'frm', 'class' => '']) ?>


        <div class="col-md-4">
            <?= $this->Form->select('grade', $grades, ['empty' => 'ระดับสมาชิก..', 'class' => 'form-control', 'id' => 'level']) ?>
        </div>
        
        <div class="col-md-4">
            <?= $this->Form->control('subdistrict', ['class' => 'form-control', 'label' => false, 'id' => 'district','placeholder'=>'ตำบล']) ?>
        </div>
        <div class="col-md-4">
            <?= $this->Form->control('district', ['class' => 'form-control', 'label' => false, 'id' => 'amphoe','placeholder'=>'อำเภอ']) ?>
        </div>

        <div class="col-md-2 col-md-offset-3" style="padding-top: 20px;">
            <?=$this->Html->link('<button type="button" class="btn btn-default btn-block" ><span class="fa fa-circle-o"></span> Reset</button>',['controller'=>'herdsman-reports'],['escape'=>false])?>
        </div>
        <div class="col-md-2" style="padding-top: 20px;">
            <button type="submit" class="btn btn-primary btn-block" name="search_bt" value="SEARCH"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
        </div>
        <div class="col-md-2" style="padding-top: 20px;">
            <button type="submit" class="btn btn-success btn-block" name="search_bt" value="EXPORT"><span class="glyphicon glyphicon-cloud-download"></span> Export PDF</button>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>
<?php if ($issearch) { ?>
    <div class="row margin-top-20">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>

                        <th scope="col">ชื่อ-นามสกุล</th>
                        <th scope="col">ระดับสมาชิก</th>
                        <th scope="col">รหัสประจำตัวประชาชน</th>
                        <th>ที่อยู่</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($herdsmans as $item): ?>

                        <tr>
                            <?php $fullname = h($titles[$item->title].$item->firstname.'   '.$item->lastname)?>
                            <td><?= $this->Html->link($fullname, ['controller'=>'herdsmans','action' => 'view', $item->id], ['target'=>'_blank']) ?></td>
                            <td><?= h($item->grade) ?></td>
                            <td><?= h($item->idcard) ?></td>
                            <td>
                                <?php
                                $address = '';
                                if (!is_null($item->address->villagename)) {
                                    $address = $address . 'หมู่บ้าน ' . $item->address->villagename . ' ';
                                }
                                if (!is_null($item->address->subdistrict)) {
                                    $address = $address . 'ตำบล ' . $item->address->subdistrict . ' ';
                                }
                                if (!is_null($item->address->district)) {
                                    $address = $address . 'อำเภอ ' . $item->address->district . ' ';
                                }
                                ?>
                                <?= h($address) ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>

<script>

    $(document).ready(function () {
        $.Thailand({
            $district: $('#district'), // input ของตำบล
            $amphoe: $('#amphoe'), // input ของอำเภอ
            //$province: $('#province'), // input ของจังหวัด
            //$zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
        });
       
    });
</script>