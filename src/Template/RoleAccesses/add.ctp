<div class="row">
    <div class="col-md-12">
        <h2 class="font-th-prompt400">เพิ่มสิทธิการใช้งาน</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?= $this->Html->link(BT_BACK, ['action' => 'index'], ['escape' => false]) ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2">
        <?= $this->Form->create($roleAccess) ?>
        <div class="row" >

            <div class="col-md-2">
                <div class="form-group">

                    <?= $this->Form->control('role_id', ['class' => 'form-control', 'label' => 'ประเภทผู้ใช้', 'options' => $roles]) ?>
                </div>
            </div>

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
                    <div class="col-md-3">
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

            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-default">เพิ่มสิทธิการใช้งาน</button>
                </div>
            </div>

        </div>
        <?= $this->Form->end() ?>
    </div>
</div>