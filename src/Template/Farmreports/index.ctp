<?= $this->Html->script('farm/farm_report.js') ?>

    <script>
        var jsondata = <?= $jsondata==null?"''":$jsondata ?>;
        var filter_text = '<?= $filter_text ?>';
        exportPDF(jsondata, filter_text);

        //console.log(jsondata);
    </script>

    
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header font-th-prompt400">รายงานฟาร์ม</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-10  col-lg-offset-1">
        <?= $this->Form->create('search', ['novalidate' => true, 'id' => 'frm', 'class' => '']) ?>


        <div class="col-md-3">
            <?= $this->Form->select('level', $farm_levels, ['empty' => 'ระดับของฟาร์ม..', 'class' => 'form-control', 'id' => 'level']) ?>
        </div>
        <div class="col-md-3">
            <?= $this->Form->select('type', $farm_types, ['empty' => 'ประเภทของฟาร์ม..', 'class' => 'form-control', 'id' => 'type']) ?>
        </div>
        <div class="col-md-3">
            <?= $this->Form->select('subdistrict', $farm_levels, ['empty' => 'ตำบล..', 'class' => 'form-control', 'id' => 'subdistrict']) ?>
        </div>
        <div class="col-md-3">
            <?= $this->Form->select('district', $farm_levels, ['empty' => 'อำเภอ..', 'class' => 'form-control', 'id' => 'district']) ?>
        </div>

        <div class="col-md-2 col-md-offset-4" style="padding-top: 20px;">
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

                        <th scope="col">ชื่อฟาร์ม</th>
                        <th scope="col">ระดับ</th>
                        <th scope="col">ประเภท</th>
                        <th>ที่อยู่</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($farms as $farm): ?>

                        <tr>

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

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>