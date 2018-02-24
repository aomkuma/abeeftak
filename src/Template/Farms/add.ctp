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
                <?= $this->Form->create($farm, ['novalidate' => true, 'id' => 'frm']) ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">ชื่อฟาร์ม <i class="text-danger">*</i></label>
                            <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'id' => 'name']) ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label for="">ระดับของฟาร์ม <i class="text-danger">*</i></label>
                            <?= $this->Form->select('level', $farm_levels, ['class' => 'form-control', 'id' => 'level']) ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label for="">ประเภทของฟาร์ม <i class="text-danger">*</i></label>
                            <?= $this->Form->select('type', $farm_types, ['class' => 'form-control', 'id' => 'type']) ?>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <label for="exampleInputFile">แหล่งน้ำ</label>
                        <?= $this->Form->select('water_body', $water_body, ['class' => 'form-control']) ?>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <label for="exampleInputFile">วิธีกำจัดมูลโคในฟาร์ม</label>
                        <?= $this->Form->select('dung_destroy', $dung_destroy, ['class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="checkbox">
                            <label>
                                <?= $this->Form->checkbox('hasstable', ['required' => false, 'id' => 'hasstable']) ?> มีโรงเรือนเลี้ยงโค
                            </label>
                        </div>
                        <div class="col-md-12 box-border" id="hasstable_box" style="display: none;" >
                            <div class="form-group">
                                <label for="">จำนวนโรงเรือน</label>
                                <?= $this->Form->control('total_stable', ['class' => 'form-control', 'label' => false, 'id' => 'total_stable', 'value' => '1']) ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="checkbox">
                            <label>
                                <?= $this->Form->checkbox('hasmeadow', ['required' => false, 'id' => 'hasmeadow']) ?> มีแปลงหญ้า
                            </label>
                        </div>
                        <div class="col-md-12 col-sm-12 box-border" id="hasmeadow_box" style="display: none;" >
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label for="">พันธุ์หญ้าหลักที่ปลูก</label>
                                    <?= $this->Form->select('grass_species', $grass, ['class' => 'form-control']) ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label for="">จำนวนแปลงหญ้า</label>
                                    <?= $this->Form->control('total_meadow', ['class' => 'form-control', 'label' => false, 'id' => 'total_meadow', 'value' => '1']) ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label for="">พื้นที่ปลูก</label>
                                    <?= $this->Form->control('total_space', ['class' => 'form-control', 'label' => false, 'id' => 'total_space', 'value' => '']) ?>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">รายละเอียดอื่น ๆ</label>
                            <?= $this->Form->textarea('description', ['class' => 'form-control', 'rows' => '3']) ?>
                        </div>
                    </div>
                </div>
                <h3 class="page-header font-th-prompt400">ที่อยู่</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">ที่อยู่ <i class="text-danger">*</i></label>
                                <?= $this->Form->control('address.address_line', ['class' => 'form-control', 'label' => false, 'id' => 'address_line']) ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-6">
                            <div class="form-group">
                                <label for="">บ้านเลขที่ <i class="text-danger">*</i></label>
                                <?= $this->Form->control('address.houseno', ['class' => 'form-control', 'label' => false]) ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-6">
                            <div class="form-group">
                                <label for="">หมู่ที่ <i class="text-danger">*</i></label>
                                <?= $this->Form->control('address.villageno', ['class' => 'form-control', 'label' => false]) ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">หมู่บ้าน <i class="text-danger">*</i></label>
                                <?= $this->Form->control('address.villagename', ['class' => 'form-control', 'label' => false]) ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="">ตำบล <i class="text-danger">*</i></label>
                                <?= $this->Form->control('address.subdistrict', ['class' => 'form-control', 'label' => false, 'id' => 'district']) ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="">อำเภอ <i class="text-danger">*</i></label>
                                <?= $this->Form->control('address.district', ['class' => 'form-control', 'label' => false, 'id' => 'amphoe']) ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="">จังหวัด <i class="text-danger">*</i></label>
                            <?= $this->Form->control('address.province_id', ['type' => 'text', 'class' => 'form-control', 'label' => false, 'id' => 'province']) ?>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="">รหัสไปรษณีย์ <i class="text-danger">*</i></label>
                                <?= $this->Form->control('address.postalcode', ['class' => 'form-control', 'label' => false, 'id' => 'zipcode']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 text-center">
                            <h4 style="margin-top: 10px;" class="font-th-prompt400">ลากมุดสีแดงใน Google Map เพื่อระบุตำแน่งที่ตั้งของฟาร์ม</h4>
                        </div>
                        <div class="col-md-12">
                            <div id="map" class="map" style="height: 500px;"></div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <?= $this->Form->control('latitude', ['class' => 'form-control', 'label' => 'ตำแหน่งละติจูด', 'type' => 'text', 'maxlength' => '30']) ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <?= $this->Form->control('longitude', ['class' => 'form-control', 'label' => 'ตำแหน่งลองติจูด', 'type' => 'text', 'maxlength' => '30']) ?>
                            </div>
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

<?= $this->Html->script('farm/farm_validations.js') ?>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlBNYnIC9qGPT2dEMmbpnPFMYtFbqaXpM&callback=initMap">
</script>
<script>
    //18.805284
    var marker;
    var position;
    var defaultLat = 16.886323;
    var defaultLong = 99.129768;
    var map, infoWindow;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: {lat: defaultLat, lng: defaultLong}
        });




        //infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                defaultLat = position.coords.latitude;
                defaultLong = position.coords.longitude;
                var pos = {
                    lat: defaultLat,
                    lng: defaultLong
                };

                //infoWindow.setPosition(pos);
                //infoWindow.setContent('Location found.');
                //infoWindow.open(map);
                map.setCenter(pos);

                document.getElementById('latitude').value = defaultLat;
                document.getElementById('longitude').value = defaultLong;

                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: {lat: defaultLat, lng: defaultLong}
                });

                map.addListener('mousemove', function () {
                    //console.log(marker.getPosition().lat());
                    //alert(marker.getPosition());
                    position = marker.getPosition();
                    document.getElementById('latitude').value = position.lat();
                    document.getElementById('longitude').value = position.lng();
                });

                //markerOnMap(position.coords.latitude,position.coords.longitude);
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());


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
        //end





    }



    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
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
        $('#hasmeadow').change(function () {
            if (this.checked) {
                $('#hasmeadow_box').show();
            } else {
                $('#hasmeadow_box').hide();
            }

        });

        $('#hasstable').change(function () {
            if (this.checked) {
                $('#hasstable_box').show();
            } else {
                $('#hasstable_box').hide();
            }
        });

    });


</script>