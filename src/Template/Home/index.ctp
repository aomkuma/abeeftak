<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header font-th-prompt400">แผงควบคุม</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-4">
                        <?=$this->Html->image('farmer.png',['class'=>'img-responsive'])?>
                    </div>
                    <div class="col-xs-8 text-right">
                        <div class="huge">26</div>
                        <div class="font-th-prompt400">จำนวนผู้เลี้ยงโคทั้งหมด</div>
                    </div>
                </div>
            </div>
            <a href="#">
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
                        <?=$this->Html->image('barn.png',['class'=>'img-responsive'])?>
                    </div>
                    <div class="col-xs-8 text-right">
                        <div class="huge">12</div>
                        <div class="font-th-prompt400">จำนวนฟาร์มทั้งหมด</div>
                    </div>
                </div>
            </div>
            <a href="#">
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
                        
                        <?=$this->Html->image('islamic-halal.png',['class'=>'img-responsive'])?>
                    </div>
                    <div class="col-xs-8 text-right">
                        <div class="huge">124</div>
                        <div class="font-th-prompt400">จำนวนโคทั้งหมด</div>
                    </div>
                </div>
            </div>
            <a href="#">
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
                <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
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
                <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
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
    $(function () {
        Morris.Donut({
            element: 'morris-donut-chart',
            data: [{
                    label: "Download Sales",
                    value: 12
                }, {
                    label: "In-Store Sales",
                    value: 30
                }, {
                    label: "Mail-Order Sales",
                    value: 20
                }],
            resize: true
        });

        Morris.Bar({
            element: 'morris-bar-chart',
            data: [{
                    y: '2006',
                    a: 100,
                    b: 90
                }, {
                    y: '2007',
                    a: 75,
                    b: 65
                }, {
                    y: '2008',
                    a: 50,
                    b: 40
                }, {
                    y: '2009',
                    a: 75,
                    b: 65
                }, {
                    y: '2010',
                    a: 50,
                    b: 40
                }, {
                    y: '2011',
                    a: 75,
                    b: 65
                }, {
                    y: '2012',
                    a: 100,
                    b: 90
                }],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B'],
            hideHover: 'auto',
            resize: true
        });

    });

</script>