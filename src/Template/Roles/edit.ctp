<div class="page-header col-lg-8 col-md-8 col-sm-8 col-lg-offset-2">
    <h3 class="font-th-prompt400">แก้ไขประเภทผู้ใช้</h3>
</div>


<div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2" style="box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3)">

    
    <?= $this->Form->create($role) ?>
    <div class="row">

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
            <div class="col-md-12 ">
                <div class="form-group">
                    <h4 class="font-th-prompt100"><?= $controller['name']; ?></h4>

                </div>
            </div>
            <?php foreach ($actionObjs as $action): ?>
                <?php
                $ck = false;
                if(!is_null($action['role_accesses']) && sizeof($action['role_accesses']) !=0){
                    $ck = true;
                }
                //debug($action);
               
                ?>
                <div class="col-md-3">
                    <div class="form-group ">
                        <?=
                        $this->Form->checkbox('action[].action_id', array(
                            'label' => false,
                            'value' => $action['id'],
                            'checked' => $ck
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

        <div class="col-md-6" style="text-align: right">
            <div class="form-group">
                <button type="submit" class="btn btn-default">แก้ไขสิทธิการใช้งาน</button>
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
