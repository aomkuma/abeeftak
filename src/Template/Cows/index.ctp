<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cow[]|\Cake\Collection\CollectionInterface $cows
 */
?>
<div class="page-header">
    <h3>ข้อมูลโค</h3>
</div>
<!--    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cow'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cow Breeds'), ['controller' => 'CowBreeds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow Breed'), ['controller' => 'CowBreeds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cow Images'), ['controller' => 'CowImages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow Image'), ['controller' => 'CowImages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movement Records'), ['controller' => 'MovementRecords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movement Record'), ['controller' => 'MovementRecords', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatment Records'), ['controller' => 'TreatmentRecords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment Record'), ['controller' => 'TreatmentRecords', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<form class="form-horizontal" role="form" method="get" action="cows">
    <div class="form-group">
        <div class="col-md-12">
            <div class="form-group row">
                <label for="inputKey" class="col-lg-1 col-md-1 col-sm-12 col-xs-12 control-label">ค้นหา</label>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" id="keyword" name="keyword" placeholder="รหัสโค / ชื่อโค" value="<?= (empty($keyword)?'':$keyword) ?>">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <!--<select class="form-control" name="gender">
                        <option value="">เพศ..</option>}
                        <option value="M">ผู้</option>
                        <option value="F">เมีย</option>
                    </select>-->
                    <?= $this->Form->input('gender', array('options' => array(''=>'เพศ ..','M'=>'ผู้','F'=>'เมีย'), 'label'=> false, 'value'=>(empty($gender)?'':$gender), 'class'=>'form-control')); ?>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                   <?= $this->Html->link('<button type="button" class="btn btn-info btn-block"><span class="glyphicon glyphicon-plus"></span> เพิ่มโค</button>', ['action' => 'add'],['escape'=>false]) ?>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="row form-group">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                    <th scope="col" class="actions text-center"><?= __('บัตรประจำตัวโค') ?></th>
                    <th scope="col" class="actions text-center"><?= __('บัตรประจำตัวสัตว์') ?></th>
                    <th scope="col" class="text-center"><?= $this->Paginator->sort('code','รหัสโค') ?></th>
                    <th scope="col" class="text-center"><?= $this->Paginator->sort('cow_breed_id','ชื่อ') ?></th>
                    <th scope="col" class="text-center"><?= $this->Paginator->sort('gender', 'เพศ') ?></th>
                    <th scope="col" class="text-center"><?= $this->Paginator->sort('birthday','วัน-เดือน-ปี เกิด') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cows as $cow): ?>
                <tr>
                    <td class="actions text-center">
                        <?=$this->Html->link(BT_EDIT,['action' => 'edit', $cow->id],['escape'=>false])?>
                        <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $cow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cow->id),'escape'=>false]) ?>
                    </td>
                    <td class="text-center"><?= $this->Html->link('<i class="glyphicon glyphicon-print" style="font-size : 25px;" ></i>', '/reports/cowcard/' . $cow->id, ['escape' => false]); ?></td>
                    <td class="text-center"><?= $this->Html->link('<i class="glyphicon glyphicon-print" style="font-size : 25px;"></i>', '/reports/animalcertificate/' . $cow->id, ['escape' => false]); ?></td>
                    <td><?= h($cow->code) ?></td>
                    <td><?= $cow->cow_breed->name ?></td>
                    <td><?= (h($cow->gender)=='M'?'ผู้':'เมีย') ?></td>
                    <td class="text-center"><?= h($cow->birthday) ?></td>
                    
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('หน้า {{page}} / {{pages}}, แสดง {{current}} รายการ จากทั้งหมด {{count}} รายการ')]) ?></p>
        </div>
    </div>
</div>

<!--<?= $this->Html->script('angular-scripts/node_modules/angular/angular.min.js') ?>
<?= $this->Html->script('angular-scripts/node_modules/angular-ui-bootstrap/dist/ui-bootstrap-tpls.js') ?>
<?= $this->Html->script('angular-scripts/node_modules/angular-animate/angular-animate.min.js') ?>
<?= $this->Html->script('angular-scripts/node_modules/angular-cookies/angular-cookies.min.js') ?>
<?= $this->Html->script('angular-scripts/abeef-main.js') ?>
<?= $this->Html->script('angular-scripts/controllers/ListController.js') ?>

<div ng-app="abeef">
    

    <div class="page-header">
        <h3>ข้อมูลโค</h3>
    </div>
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="inputKey" class="col-lg-1 col-md-1 col-sm-12 col-xs-12 control-label">ค้นหา</label>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="inputKey" placeholder="รหัสโค">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <select class="form-control">
                            <option value="">เพศ..</option>}
                            <option value="">ผู้</option>
                            <option value="">เมีย</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <button type="" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <button type="" class="btn btn-info btn-block"><span class="glyphicon glyphicon-plus"></span> เพิ่มโค</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row form-group">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            รหัสโค
                        </th>
                        <th>
                            เพศ
                        </th>
                        <th>
                            วัน-เดือน-ปี เกิด
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?=$this->Html->link(BT_EDIT,[],['escape'=>false])?>
                        </td>
                        <td>
                            TAK6000001
                        </td>
                        <td>
                            ผู้
                        </td>
                        <td>
                            12/5/2017
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></button>
                        </td>
                        <td>
                            TAK6000002
                        </td>
                        <td>
                            เมีย
                        </td>
                        <td>
                            3/8/2017
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
