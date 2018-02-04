
<style>
    .farm-info{

    }
    .farm-info p{
        font-size: 16px;
    }
</style>
<script>
    function resizeIframe(obj) {
        obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    }
</script>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header font-th-prompt400"><?= h($farm->name) ?></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 bt-tool-group">
        <?= $this->Html->link(BT_BACK, ['action' => 'index'], ['escape' => false]) ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addHerdsman">เพิ่มผู้เลี้ยงเข้าฟาร์ม</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcow">เพิ่มโคเข้าฟาร์ม</button>
    </div>

</div>

<div class="row">
    <div class="col-lg-7 farm-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">ข้อมูลฟาร์ม</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <label>ชื่อฟาร์ม</label>
                    <?= h($farm->name) ?>
                </div>
                <div class="col-md-6">
                    <label>ระดับของฟาร์ม</label>
                    <?= h($farm->level) ?>
                </div>
                <div class="col-md-6">
                    <label>ประเภทของฟาร์ม</label>
                    <?= h($farm->type) ?>
                </div>
                <div class="col-md-6">
                    <label>แหล่งน้ำ</label>
                    <?= h($farm->water_body) ?>
                </div>
                <div class="col-md-6">
                    <label>วิธีกำจัดมูลโคในฟาร์ม</label>
                    <?= h($farm->dung_destroy) ?>
                </div>

                <?php
                $stable = 'ไม่มี';
                if ($farm->hasstable == 'Y') {
                    $stable = 'มี ' . $farm->total_stable . ' โรงเรือน';
                }
                ?>
                <div class="col-md-6">
                    <label>โรงเรือนเลี้ยงโค</label>
                    <?= h($stable) ?>
                </div>

                <?php
                $meadow = 'ไม่มี';
                if ($farm->hasmeadow == 'Y') {
                    $meadow = 'มี ' . $farm->total_meadow . ' แปลง มีพื้นที่ ' . $farm->total_space;
                }
                ?>
                <div class="col-md-6">
                    <label>แปลงหญ้า</label>
                    <?= h($meadow) ?>
                </div>
                <div class="col-md-12">
                    <label>รายละเอียดอื่น ๆ</label>
                    <?= h($farm->description) ?>
                </div>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">ที่ตั้ง</h3>
            </div>
            <div class="panel-body">
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

    </div>
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">ผู้เลี้ยง</h3>
            </div>
            <div class="panel-body">
                <iframe id="herdsman_list" src="<?= SITE_URL . 'farm-herdsmans' ?>" class="col-lg-12" frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">โค</h3>
            </div>
            <div class="panel-body">
                <iframe id="cow_list" src="<?= SITE_URL . 'farm-cows' ?>" class="col-lg-12" frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center audit-trail">
        <div class="col-md-3">เพิ่มโดย: <?= $farm->createdby ?></div>
        <div class="col-md-3">วันเวลาที่เพิ่ม: <?= $farm->created->i18nFormat('dd-MM-yyyy HH:mm'); ?></div>
        <div class="col-md-3">แก้ไขโดย: <?= $farm->updatedby ?></div>
        <div class="col-md-3">วันเวลาที่แก้ไข: <?= is_null($farm->updated)?'-':$farm->updated->i18nFormat('dd-MM-yyyy HH:mm'); ?></div>
    </div>

</div>





<div class="modal fade" id="addcow" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= $this->Form->create('cow', ['novalidate' => true, 'id' => 'cowfrm', 'class' => '']) ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">เพิ่มโคเข้าฟาร์ม</h4>
            </div>
            <div class="modal-body">

                <?= $this->Form->hidden('farm_id', ['value' => $farm->id]) ?>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">โค:</label>
                    <?= $this->Form->select('cow_id', $cows, ['empty' => 'เลือกโค..', 'class' => 'form-control', 'id' => 'cow_id']) ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">รายละเอียดอื่น ๆ:</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'rows' => '3']) ?>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<div class="modal fade" id="addHerdsman" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= $this->Form->create('herdsman', ['novalidate' => true, 'id' => 'herdsmanfrm', 'class' => '']) ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">เพิ่มผู้เลี้ยงเข้าฟาร์ม</h4>
            </div>
            <div class="modal-body">

                <?= $this->Form->hidden('farm_id', ['value' => $farm->id]) ?>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">ผู้เลี้ยงโค:</label>
                    <?= $this->Form->select('herdsman_id', $herdsmans, ['empty' => 'เลือกผู้เลี้ยง..', 'class' => 'form-control', 'id' => 'herdsman_id']) ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">รายละเอียดอื่น ๆ:</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'rows' => '3']) ?>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
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

    var url = '<?= SITE_URL ?>';
    var marker;
    var position;
    var defaultLat = <?= $lat ?>;
    var defaultLong = <?= $long ?>;

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
    
    function reloadHerdsmanFrame(){
        document.getElementById('herdsman_list').contentWindow.location.reload(true);
    }
    
    function reloadCowFrame(){
        document.getElementById('cow_list').contentWindow.location.reload(true);
    }
    
    function removeRow(id,type){
        
    }


    $("#cowfrm").submit(function (event) {
        //alert('hi');
        var urlAddCow = url+'farmcows/addcow/';
        // Stop form from submitting normally
        event.preventDefault();

        // Get some values from elements on the page:
        var formdata = $('#cowfrm').serialize();
        //console.log(formdata);
        // Send the data using post
        var posting = $.post(urlAddCow, {data: formdata});
        //console.log(posting);
        // Put the results in a div
        posting.done(function (data) {
            //$('#cow_list').load();
            reloadCowFrame();
            document.getElementById("cowfrm").reset();
        });
    });
    
     $("#herdsmanfrm").submit(function (event) {
        //alert('hi');
        var urlAddHerdsman = url+'farmherdsmans/addherdsman/';
        // Stop form from submitting normally
        event.preventDefault();

        // Get some values from elements on the page:
        var formdata = $('#herdsmanfrm').serialize();
        //console.log(formdata);
        // Send the data using post
        var posting = $.post(urlAddHerdsman, {data: formdata});
        console.log(posting);
        // Put the results in a div
        posting.done(function (data) {
            //$('#cow_list').load();
            reloadHerdsmanFrame();
            document.getElementById("herdsmanfrm").reset();
        });
    });





</script>

