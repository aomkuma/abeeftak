<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header font-th-prompt400">เพิ่มพันธุ์หญ้า</h1>
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
                <?= $this->Form->create($grass) ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'ชื่อพันธุ์']) ?>
                        </div>
                    </div>
                </div>
                <?= $this->Form->button('บันทึก',['class'=>'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>