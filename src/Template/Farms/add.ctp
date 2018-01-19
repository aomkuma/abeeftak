<?= $this->Html->script('/jquery.Thailand.js/dependencies/JQL.min.js') ?>
<?= $this->Html->script('/jquery.Thailand.js/dependencies/typeahead.bundle.js') ?>

<?= $this->Html->css('/jquery.Thailand.js/dist/jquery.Thailand.min.css') ?>
<?= $this->Html->script('/jquery.Thailand.js/dist/jquery.Thailand.min.js') ?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header font-th-prompt400">เพิ่มฟาร์มใหม่</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 bt-tool-group">
        <?= $this->Html->link(BT_BACK, ['action' => 'index'], ['escape' => false]) ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?= $this->Form->create($farm, ['novalidate' => true,'id'=>'frm']) ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'ชื่อฟาร์ม','id'=>'name']) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputFile">ระดับของฟาร์ม</label>
                            <?= $this->Form->select('level', $farm_levels, ['class' => 'form-control','id'=>'level']) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputFile">ประเภทของฟาร์ม</label>
                            <?= $this->Form->select('type', $farm_types, ['class' => 'form-control','id'=>'type']) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="checkbox">
                            <label>
                                <?= $this->Form->checkbox('hasstable') ?> มีโรงเรือนเลี้ยงโค
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox">
                            <label>
                                <?= $this->Form->checkbox('hasmeadow') ?> มีแปลงหญ้า
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputFile">พันธุ์หญ้าหลักที่ปลูก</label>
                        <?= $this->Form->select('grass_species', $grass, ['class' => 'form-control']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputFile">แหล่งน้ำ</label>
                        <?= $this->Form->select('water_body', $water_body, ['class' => 'form-control']) ?>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputFile">วิธีกำจัดมูลโคในฟาร์ม</label>
                        <?= $this->Form->select('dung_destroy', $dung_destroy, ['class' => 'form-control']) ?>
                    </div>
                </div>
                <h3 class="page-header font-th-prompt400">ที่อยู่</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= $this->Form->control('address.address_line', ['class' => 'form-control', 'label' => 'ที่อยู่']) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->control('address.houseno', ['class' => 'form-control', 'label' => 'บ้านเลขที่']) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->control('address.villageno', ['class' => 'form-control', 'label' => 'หมู่ที่']) ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= $this->Form->control('address.villagename', ['class' => 'form-control', 'label' => 'หมู่บ้าน']) ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= $this->Form->control('address.subdistrict', ['class' => 'form-control', 'label' => 'ตำบล', 'id' => 'district']) ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= $this->Form->control('address.district', ['class' => 'form-control', 'label' => 'อำเภอ', 'id' => 'amphoe']) ?>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <?= $this->Form->control('address.province_id', ['type' => 'text', 'class' => 'form-control', 'label' => 'จังหวัด', 'id' => 'province', 'disabled' => 'disabled']) ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= $this->Form->control('address.postalcode', ['class' => 'form-control', 'label' => 'รหัสไปรษณีย์', 'id' => 'zipcode']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= $this->Form->control('latitude', ['class' => 'form-control', 'label' => 'ตำแหน่งละติจูด']) ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= $this->Form->control('longitude', ['class' => 'form-control', 'label' => 'ตำแหน่งลองติจูด']) ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="map" class="map" style="height: 500px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4 text-center bt-tool-group margin-top-20">
                        <?= $this->Form->button('บันทึก', ['class' => 'btn btn-primary']) ?>
                    </div>

                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>

    </div>
</div>

<?=$this->Html->script('farm/farm_validations.js')?>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlBNYnIC9qGPT2dEMmbpnPFMYtFbqaXpM&callback=initMap">
</script>
<script>
    //18.805284
    var marker;
    var position;
    var defaultLat = 16.886323;
    var defaultLong = 99.129768;

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: {lat: defaultLat, lng: defaultLong}
        });

        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: {lat: defaultLat, lng: defaultLong}
        });
        //console.log(map);
        //marker.addListener('click', toggleBounce);
        map.addListener('mouseup', function () {
            //console.log(marker.getPosition().lat());
            //alert(marker.getPosition());
            position = marker.getPosition();
            document.getElementById('latitude').value = position.lat();
            document.getElementById('longitude').value = position.lng();
        });

    }

    function toggleBounce() {
        //console.log('hi');
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }

    $(document).ready(function () {
        Validation.initValidation();

        $.Thailand({
            $district: $('#district'), // input ของตำบล
            $amphoe: $('#amphoe'), // input ของอำเภอ
            $province: $('#province'), // input ของจังหวัด
            $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
        });
    });


</script>