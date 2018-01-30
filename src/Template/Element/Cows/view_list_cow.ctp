<div class="list-group" id="cow_list">

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

<script>
    var url = '<?= SITE_URL ?>farms/getcowjson/<?= $farm->id ?>';
    
        function getCowList() {
            //console.log('hello');
            $.get(url, function (data) {
                var jsonData = JSON.parse(data);
                console.log(jsonData);
                
                $("#cow_list").empty();
                $.each(jsonData, function (i, item) {
                    $("#cow_list").append('<a href =""><button type="button" class="list-group-item">' + item.cow.code + '</button></a>');
                });
            });


        }

        




        $(document).ready(function () {
            getCowList();
        });
</script>