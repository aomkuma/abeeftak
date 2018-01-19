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
                <?= $this->Form->create($farm) ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'ชื่อฟาร์ม']) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputFile">ระดับของฟาร์ม</label>
                            <?= $this->Form->select('level', $farm_levels, ['class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputFile">ประเภทของฟาร์ม</label>
                            <?= $this->Form->select('type', $farm_types, ['class' => 'form-control']) ?>
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
                        <?= $this->Form->select('grass_species', [], ['class' => 'form-control']) ?>
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
                    <div class="col-md-6">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= $this->Form->control('address.houseno', ['class' => 'form-control', 'label' => 'บ้านเลขที่']) ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= $this->Form->control('houseno', ['class' => 'form-control', 'label' => 'บ้านเลขที่']) ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= $this->Form->control('houseno', ['class' => 'form-control', 'label' => 'บ้านเลขที่']) ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= $this->Form->control('houseno', ['class' => 'form-control', 'label' => 'บ้านเลขที่']) ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= $this->Form->control('houseno', ['class' => 'form-control', 'label' => 'บ้านเลขที่']) ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputFile">จังหวัด</label>
                            <?= $this->Form->select('address.province_id', $provinces, ['class' => 'form-control', 'label' => 'บ้านเลขที่']) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                            <div id="map" class="map" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>

    </div>
</div>


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlBNYnIC9qGPT2dEMmbpnPFMYtFbqaXpM&callback=initMap">
</script>
<script>
    //18.805284
    var marker;
    var position;
    var defaultLat = 18.805284;
    var defaultLong = 98.961092;

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
</script>