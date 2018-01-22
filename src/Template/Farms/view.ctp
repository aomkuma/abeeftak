
<style>
    .farm-info{

    }
    .farm-info p{
        font-size: 18px;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header font-th-prompt400"><?= h($farm->name) ?></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 bt-tool-group">
        <?= $this->Html->link(BT_BACK, ['action' => 'index'], ['escape' => false]) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6 farm-info">
        <h3>ข้อมูลฟาร์ม</h3>
        <p><strong>ชื่อฟาร์ม</strong> <?= h($farm->name) ?></p>
        <p><strong>ระดับของฟาร์ม</strong> <?= h($farm->level) ?></p>
        <p><strong>ประเภทของฟาร์ม</strong> <?= h($farm->type) ?></p>
        <p><strong>แหล่งน้ำ</strong> <?= h($farm->water_body) ?></p>
        <p><strong>วิธีกำจัดมูลโคในฟาร์ม</strong> <?= h($farm->dung_destroy) ?></p>
        <?php
        $stable = 'ไม่มี';
        if ($farm->hasstable == 'Y') {
            $stable = 'มี ' . $farm->total_stable . ' โรงเรือน';
        }
        ?>
        <p><strong>โรงเรือนเลี้ยงโค</strong> <?= h($stable) ?></p>
        <?php
        $meadow = 'ไม่มี';
        if ($farm->hasmeadow == 'Y') {
            $meadow = 'มี ' . $farm->total_meadow . ' แปลง มีพื้นที่ ' . $farm->total_space;
        }
        ?>
        <p><strong>แปลงหญ้า</strong> <?= h($meadow) ?></p>
        <p><strong>รายละเอียดอื่น ๆ</strong></p>
        <p><?= h($farm->description) ?></p>
    </div>
    <div class="col-md-6 farm-info">
        <h3>ที่อยู่ฟาร์ม</h3>
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
        <p><?= h($address) ?></p>
        <div id="map" class="map" style="height: 500px;"></div>
    </div>

</div>
<div class="row">
    <div class="col-md-12 text-center audit-trail">
        <div class="col-md-3">เพิ่มโดย: <?=$farm->createdby?></div>
        <div class="col-md-3">วันเวลาที่เพิ่ม: <?=$farm->created->i18nFormat('dd-MM-yyyy HH:mm');?></div>
        <div class="col-md-3">แก้ไขโดย: <?=$farm->updatedby?></div>
        <div class="col-md-3">วันเวลาที่แก้ไข: <?=$farm->updated->i18nFormat('dd-MM-yyyy HH:mm');?></div>
    </div>
    
</div>




<?= $this->Html->script('farm/farm_validations.js') ?>
<?php
$lat = 16.886323;
$long = 99.129768;
if ($farm->latitude != null && $farm->latitude != '' && $farm->longitude != null && $farm->longitude != '') {
    $lat = $farm->latitude;
    $long = $farm->longitude;
}
?>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlBNYnIC9qGPT2dEMmbpnPFMYtFbqaXpM&callback=initMap">
</script>
<script>

    var marker;
    var position;
    var defaultLat = <?=$lat?>;
    var defaultLong = <?=$long?>;

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: {lat: defaultLat, lng: defaultLong}
        });

        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: {lat: defaultLat, lng: defaultLong}
        });

    }

</script>

