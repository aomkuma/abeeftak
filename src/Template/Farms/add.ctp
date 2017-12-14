<div class="row">
    <div class="col-md-12">
        <h1 class="font-th-prompt400">เพิ่มฟาร์มใหม่</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 margin-bottom-20">
        <?= $this->Html->link(BT_BACK, ['action' => 'index'], ['escape' => false]) ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <?= $this->Form->create($farm) ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'ชื่อฟาร์ม']) ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->control('level', ['class' => 'form-control', 'label' => 'ระดับ']) ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= $this->Form->control('type', ['class' => 'form-control', 'label' => 'ประเภท']) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <?=$this->Form->checkbox('hasstable')?> มีโรงเรือนเลี้ยงโค
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <?=$this->Form->checkbox('hasmeadow')?> มีแปลงหญ้า
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <label for="exampleInputFile">พันธุ์หญ้าหลักที่ปลูก</label>
                <?=$this->Form->select('grass_species',[],['class'=>'form-control'])?>
            </div>
        </div>
        
        <div class="row">
             <div class="col-md-4">
                <label for="exampleInputFile">แหล่งน้ำ</label>
                <?=$this->Form->select('water_body',[],['class'=>'form-control'])?>
            </div>
            <div class="col-md-4">
                <label for="exampleInputFile">วิธีกำจัดมูลโคในฟาร์ม</label>
                <?=$this->Form->select('dung_destroy',[],['class'=>'form-control'])?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

