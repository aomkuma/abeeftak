<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header font-th-prompt400">รายงาน</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                รายงานส่วนของผู้เลี้ยงโค
            </div>
            <div class="panel-body">
                <ul>
                    <li>
                        <?= $this->Html->link('รายงานสมาชิกผู้เลี้ยงโค', ['controller' => '', 'action' => ''], ['escape' => false]) ?>
                    </li>
                </ul>

            </div>
            <div class="panel-footer">

            </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <div class="col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                รายงานส่วนของฟาร์ม
            </div>
            <div class="panel-body">
                <ul>
                    <li>
                        <?= $this->Html->link('รายงานฟาร์ม', ['controller' => '', 'action' => ''], ['escape' => false]) ?>
                    </li>
                </ul>
            </div>
            <div class="panel-footer">

            </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <div class="col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                รายงานส่วนของโค
            </div>
            <div class="panel-body">
                <ul>
                    <li>
                        <?= $this->Html->link('รายงานจำนวนโค', ['controller' => '', 'action' => ''], ['escape' => false]) ?>
                    </li>
                </ul>
            </div>
            <div class="panel-footer">

            </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <div class="col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                รายงานอื่น ๆ
            </div>
            <div class="panel-body">
                <ul>
                    <li>
                        <?= $this->Html->link('รายงานจำนวนผู้ปฏิบัติงาน (Operator)', ['controller' => '', 'action' => ''], ['escape' => false]) ?>

                    </li>
                    <li>

                        <?= $this->Html->link('รายงานข้อมูลผู้ปฏิบัติงาน (Operator)', ['controller' => '', 'action' => ''], ['escape' => false]) ?>
                    </li>
                </ul>
            </div>
            <div class="panel-footer">

            </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>
</div>