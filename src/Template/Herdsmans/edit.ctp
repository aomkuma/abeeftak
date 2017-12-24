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
        <h1 class="font-th-prompt400">แก้ไขข้อมูลสมาชิกผู้เลี้ยงโค</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-lg-offset-2" style="box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3)">

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
            <div class="col-md-8">
                <div class="form-group">
                    <?= $this->Form->input('registerdate', ['class' => 'form-control', 'label' => 'วันที่ขึ้นทะเบียน : ', 'id' => 'registerdate']) ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>ระดับสมาชิก :</label>
                    <?= $this->Form->select('grade', $grade, ['class' => 'form-control', 'id' => 'grade']) ?>
                </div>
            </div>
        </div>  

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>คำนำหน้าชื่อ :</label>
                    <?= $this->Form->select('title', $title, ['class' => 'form-control', 'id' => 'title']) ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->input('firstname', ['class' => 'form-control', 'label' => 'ชื่อ : ', 'id' => 'firstname']) ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->input('lastname', ['class' => 'form-control', 'label' => 'นามสกุล : ', 'id' => 'lastname']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->input('idcard', ['class' => 'form-control', 'label' => 'รหัสประจำตัวประชาชน : ', 'id' => 'idcard']) ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= $this->Form->input('birthday', ['class' => 'form-control', 'label' => 'วันเดือนปีเกิด/วันที่จดทะเบียน : ', 'id' => 'birthday']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->input('mobile', ['class' => 'form-control', 'label' => 'เบอร์โทรศัพท์ : ', 'id' => 'mobile']) ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->input('email', ['class' => 'form-control', 'label' => 'อีเมลล์ : ', 'id' => 'email']) ?>
                </div>
            </div>
        </div>

        <?= $this->Form->create($address) ?>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->input('houseno', ['class' => 'form-control', 'label' => 'บ้านเลขที่ : ', 'id' => 'houseno']) ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->input('villageno', ['class' => 'form-control', 'label' => 'หมู่ที่ : ', 'id' => 'villageno']) ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->input('villagename', ['class' => 'form-control', 'label' => 'ชื่อหมู่บ้าน : ', 'id' => 'villagename']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->input('subdistrict', ['class' => 'form-control', 'label' => 'ตำบล : ', 'id' => 'subdistrict']) ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->input('district', ['class' => 'form-control', 'label' => 'อำเภอ : ', 'id' => 'district']) ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->input('province', ['class' => 'form-control', 'label' => 'จังหวัด : ', 'id' => 'province']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->input('postalcode', ['class' => 'form-control', 'label' => 'รหัสไปรษณีย์ : ', 'id' => 'postalcode']) ?>
                </div>
            </div>
        </div>

        <br>
        <div class="text-center"><?= $this->Form->button('บันทึกข้อมูล', ['class' => 'btn btn-primary', 'id' => 'checkblank']) ?></div>
        <br><br>

        <?= $this->Form->end() ?>
    </div>
</div>