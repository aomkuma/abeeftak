<div class="page-header col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1">
    <h3 class="font-th-prompt400">เพิ่มประเภทผู้ใช้</h3>
</div>


<div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1" style="box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3)">

    
    <?= $this->Form->create($role) ?>
    <div class="row" >

        <div class="col-md-4">
            <div class="form-group">
                <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'ประเภทผู้ใช้']) ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?= $this->Form->control('description', ['class' => 'form-control', 'label' => 'คำอธิบาย']) ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?= $this->Form->control('isactive', ['class' => 'form-control', 'label' => 'สถานะ', 'options' => $isactive]) ?>
            </div>
        </div>


    </div>



    <div class="row" >
        <?php
        foreach ($actions as $controller):
            $actionObjs = $controller['actions'];
            ?>
        <div class="col-md-12 " >
                <div class="form-group">
                    <h4 class="font-th-prompt100"><?= $controller['name']; ?></h4>

                </div>
            </div>
            <?php foreach ($actionObjs as $action): ?>
                <div class="col-md-3" >
                    <div class="form-group ">
                        <?=
                        $this->Form->checkbox('action[].action_id', array(
                            'label' => false,
                            'value' => $action['id']
                        ));
                        ?>
                        <?= $action['name'] ?>

                    </div>
                </div>
                <?php
            endforeach;
            echo '<br/>';
        endforeach;
        ?>

        <div class="col-md-6"style="text-align: right">
            <div class="form-group" >
                <button type="submit" class="btn btn-default">เพิ่มประเภทผู้ใช้งาน</button>
            </div>
        </div>
        <div class="col-lg-6 " style="text-align: left">
            <?= $this->Html->link(BT_BACK, ['action' => 'index'], ['escape' => false]) ?>
        </div>

    </div>
    <?= $this->Form->end() ?>

</div>
