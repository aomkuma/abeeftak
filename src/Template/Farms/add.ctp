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
        <?= $this->Form->end() ?>
    </div>
</div>


<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farm $farm
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Farms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="farms form large-9 medium-8 columns content">
    <?= $this->Form->create($farm) ?>
    <fieldset>
        <legend><?= __('Add Farm') ?></legend>
        <?php
        echo $this->Form->control('name');
        echo $this->Form->control('level');
        echo $this->Form->control('type');
        echo $this->Form->control('address_id', ['options' => $addresses, 'empty' => true]);
        echo $this->Form->control('description');
        echo $this->Form->control('location_image');
        echo $this->Form->control('latitude');
        echo $this->Form->control('longitude');
        echo $this->Form->control('hasstable');
        echo $this->Form->control('total_stable');
        echo $this->Form->control('total_cow_capacity');
        echo $this->Form->control('hasmeadow');
        echo $this->Form->control('total_meadow');
        echo $this->Form->control('total_space');
        echo $this->Form->control('grass_species');
        echo $this->Form->control('water_body');
        echo $this->Form->control('dung_destroy');
        echo $this->Form->control('createdby');
        echo $this->Form->control('updatedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
