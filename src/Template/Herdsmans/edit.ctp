<script>
    $(document).ready(function () {

        $('#checkblank').click(function () {

            var mobile = $('#mobile').val();
            var email = $('#email').val();
            var grade = $('#grade').val();
            var title = $('#title').val();
            var image = $('#image').val();

            if (mobile === '') {
                $('#mobile').val = '-';
            }

            if (email === '') {
                $('#email').val = '-';
            }

            if (grade === '') {
                alert("กรุณาเลือกระดับสมาชิก");
                $('#grade').focus();
                return false;
            }

            if (title === '') {
                alert("กรุณาเลือกคำนำหน้าชื่อ");
                $('#title').focus();
                return false;
            }

            if (image !== '') {
                var spg = image.split(".");
                var lastarr = spg.length;
                lastarr = lastarr - 1;

                if (spg[lastarr] !== 'jpg' && spg[lastarr] !== 'png') {
                    alert("กรุณาใส่ประเภทไฟล์ให้ถูกต้อง");
                    $('#image').val = '';
                    $('#image').focus();

                    return false;
                }
            }


        });
//        
        $("#idcard").on("keypress", function (e) {

            var code = e.keyCode ? e.keyCode : e.which;

            if (code > 57) {
                alert("กรุณากรอกหมายเลขประจำตัวประชาชนให้ถูกต้อง");
                return false;

            } else if (code < 48 && code != 8) {
                alert("กรุณากรอกหมายเลขประจำตัวประชาชนให้ถูกต้อง");
                return false;

            }

        });



    });
</script>

<div class="row">
    <div class="col-md-12">
        <h1 class="page-header font-th-prompt400">แก้ไขข้อมูลสมาชิกผู้เลี้ยงโค</h1>
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
                <?= $this->Form->create($herdsman, array('type' => 'file')) ?>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="text-center">
                                <?= $this->Html->image('/' . $imgpath, ['style' => 'height: 50vh']) ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="text-center">
                                <?= $this->Form->file('image', ['class' => 'form-control', 'label' => 'รูป : ', 'id' => 'image']) ?>
                            </div>
                        </div>
                    </div>
                </div>  
                <br>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">วันที่ขึ้นทะเบียน <i class="text-danger">*</i></label>
                            <input type="date" name="registerdate" id="registerdate" class="form-control" required="true" value="<?= h($herdsman->registerdate) ?>" >
                        </div>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">ระดับสมาชิก <i class="text-danger">*</i></label>
                            <?= $this->Form->select('grade', $grade, ['class' => 'form-control', 'id' => 'grade']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">คำนำหน้าชื่อ <i class="text-danger">*</i></label>
                            <?= $this->Form->select('title', $title, ['class' => 'form-control', 'id' => 'title']) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">ชื่อ <i class="text-danger">*</i></label>
                            <?= $this->Form->input('firstname', ['class' => 'form-control', 'label' => false, 'id' => 'firstname']) ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">นามสกุล <i class="text-danger">*</i></label>
                            <?= $this->Form->input('lastname', ['class' => 'form-control', 'label' => false, 'id' => 'lastname']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">รหัสประจำตัวประชาชน <i class="text-danger">*</i></label>
                            <?= $this->Form->input('idcard', ['class' => 'form-control', 'label' => false, 'id' => 'idcard']) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">วันเดือนปีเกิด <i class="text-danger">*</i></label>
                            <input type="date" name="birthday" class="form-control" required="true" value="<?= h($herdsman->birthday) ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">รหัสสมาชิก ธ.ก.ส.</label>
                            <?= $this->Form->input('aac_code', ['class' => 'form-control', 'label' => false, 'id' => 'aac_comd']) ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">รหัสสมาชิก สกต.</label>
                            <?= $this->Form->input('amc_code', ['class' => 'form-control', 'label' => false, 'id' => 'amc_code']) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">เลขบัญชีเงินฝากที่ 1</label>
                            <?= $this->Form->input('account_number1', ['class' => 'form-control', 'label' => false, 'id' => 'account_number1']) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">เลขบัญชีเงินฝากที่ 2</label>
                            <?= $this->Form->input('account_number2', ['class' => 'form-control', 'label' => false, 'id' => 'account_number2']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= $this->Form->input('mobile', ['class' => 'form-control', 'label' => 'เบอร์โทรศัพท์', 'id' => 'mobile']) ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <?= $this->Form->input('email', ['class' => 'form-control', 'label' => 'อีเมลล์', 'id' => 'email']) ?>
                        </div>
                    </div>
                </div>

                <?= $this->Form->create($address) ?>
                <h3 class="page-header font-th-prompt400">ที่อยู่</h3>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">ที่อยู่ <i class="text-danger">*</i></label>
                                <?= $this->Form->control('address_line', ['class' => 'form-control', 'label' => false, 'id' => 'address_line', 'required' => true]) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">บ้านเลขที่ <i class="text-danger">*</i></label>
                                <?= $this->Form->control('houseno', ['class' => 'form-control', 'label' => false, 'required' => true]) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">หมู่ที่ <i class="text-danger">*</i></label>
                                <?= $this->Form->control('villageno', ['class' => 'form-control', 'label' => false, 'required' => true]) ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">หมู่บ้าน <i class="text-danger">*</i></label>
                                <?= $this->Form->control('villagename', ['class' => 'form-control', 'label' => false, 'required' => true]) ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">ตำบล <i class="text-danger">*</i></label>
                                <?= $this->Form->control('subdistrict', ['class' => 'form-control', 'label' => false, 'id' => 'district', 'required' => true]) ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">อำเภอ <i class="text-danger">*</i></label>
                                <?= $this->Form->control('district', ['class' => 'form-control', 'label' => false, 'id' => 'amphoe', 'required' => true]) ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">จังหวัด <i class="text-danger">*</i></label>
                            <?= $this->Form->control('province_id', ['type' => 'text', 'class' => 'form-control', 'label' => false, 'id' => 'province', 'required' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">รหัสไปรษณีย์ <i class="text-danger">*</i></label>
                                <?= $this->Form->control('postalcode', ['class' => 'form-control', 'label' => false, 'id' => 'zipcode', 'required' => true]) ?>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <div class="text-center"><?= $this->Form->button('บันทึกข้อมูล', ['class' => 'btn btn-primary', 'id' => 'checkblank']) ?></div>
                <br><br>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>