<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header font-th-prompt400">แผงควบคุม</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> รายการรออนุมัติ
            </div>
            <div class="panel-body">
                <iframe id="cow_list" src="<?= SITE_URL . 'approves/index/' ?>" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"></iframe>


            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-4">
                        <?= $this->Html->image('farmer.png', ['class' => 'img-responsive']) ?>
                    </div>
                    <div class="col-xs-8 text-right">
                        <div class="huge"><?= h($herdsmanamt) ?></div>
                        <div class="font-th-prompt400">จำนวนผู้เลี้ยงโคทั้งหมด</div>
                    </div>
                </div>
            </div>
            <a href="<?= SITE_URL . 'herdsmans' ?>">
                <div class="panel-footer">
                    <span class="pull-left">ดูข้อมูล</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-4">
                        <?= $this->Html->image('barn.png', ['class' => 'img-responsive']) ?>
                    </div>
                    <div class="col-xs-8 text-right">
                        <div class="huge"><?= h($farmamt) ?></div>
                        <div class="font-th-prompt400">จำนวนฟาร์มทั้งหมด</div>
                    </div>
                </div>
            </div>
            <a href="<?= SITE_URL . 'farms' ?>">
                <div class="panel-footer">
                    <span class="pull-left">ดูข้อมูล</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-4">

                        <?= $this->Html->image('islamic-halal.png', ['class' => 'img-responsive']) ?>
                    </div>
                    <div class="col-xs-8 text-right">
                        <div class="huge"><?= h($cowamt) ?></div>
                        <div class="font-th-prompt400">จำนวนโคทั้งหมด</div>
                    </div>
                </div>
            </div>
            <a href="<?= SITE_URL . 'cows' ?>">
                <div class="panel-footer">
                    <span class="pull-left">ดูข้อมูล</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-8">

        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> จำนวนโคที่เกิดแต่ละเดือนประจำปี 2561
                <div class="pull-right">

                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">

                    <!-- /.col-lg-4 (nested) -->
                    <div class="col-lg-12">
                        <div id="morris-bar-chart"></div>
                    </div>
                    <!-- /.col-lg-8 (nested) -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->


    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> จำนวนเพศผู้-เมีย
            </div>
            <div class="panel-body">
                <div id="morris-donut-chart"></div>

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

    </div>
    <!-- /.col-lg-4 -->
</div>
<!-- /.row -->

<!-- Morris Charts JavaScript -->
<?= $this->Html->script('/startbootstrap/vendor/raphael/raphael.min.js') ?>
<?= $this->Html->script('/startbootstrap/vendor/morrisjs/morris.min.js') ?>
<script>
    function resizeIframe(obj) {
        obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    }

    $(function () {
        Morris.Donut({
            element: 'morris-donut-chart',
            data: [{
                    label: "เพศผู้",
                    value: <?= $cowmamt ?>
                }, {
                    label: "เพศเมีย",
                    value: <?= $cowfamt ?>
                }],
            resize: true
        });
        var jsonData = '<?= $stat ?>';
        jsonData = JSON.parse(jsonData);

        var arr = $.map(jsonData, function (el) {
            return el;
        });


        Morris.Bar({
            element: 'morris-bar-chart',
            data: arr,
            xkey: 'name',
            ykeys: ['amt'],
            labels: ['จำนวน'],
            hideHover: 'auto',
            resize: true
        });

    });

</script>