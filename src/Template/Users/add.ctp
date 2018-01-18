

<div class="page-header">

</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-4" style="box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3)" >
    <div class="row">
        <div class="col-md-12">
            <h2 class="font-th-prompt400">เพิ่มผู้ใช้ใหม่</h2>
        </div>
    </div>
    <?= $this->Form->create($user) ?>

    <div class="row" >
        <div class="col-md-12">
            <div class="form-group">
                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => 'คำนำหน้า', 'options' => $title]) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $this->Form->control('firstname', ['class' => 'form-control', 'label' => 'ชื่อ']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $this->Form->control('lastname', ['class' => 'form-control', 'label' => 'นามสกุล']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $this->Form->control('email', ['class' => 'form-control', 'label' => 'E-mail', 'id' => 'mail']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $this->Form->control('password', ['class' => 'form-control', 'label' => 'Password']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $this->Form->control('role_id', ['class' => 'form-control', 'label' => 'ประเภทสมาชิก', 'options' => $roles]) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $this->Form->control('position', ['class' => 'form-control', 'label' => 'ตำแหน่ง']) ?>
            </div>
        </div>

        <div class="col-md-6"style="text-align: right">
            <div class="form-group">
                <button type="submit" class="btn btn-default">เพิ่มผู้ใช้</button>
            </div>
        </div>
        <div class="col-md-6"style="text-align: left">
            <div class="form-group">
                <?= $this->Html->link(BT_BACK, ['action' => 'index'], ['escape' => false]) ?>
            </div>
        </div>

    </div>
    <?= $this->Form->end() ?>
</div>
</div>
