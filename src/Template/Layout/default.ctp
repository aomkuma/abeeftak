<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <?= $this->Html->css('/startbootstrap/vendor/bootstrap/css/bootstrap.min.css') ?>

        <!-- MetisMenu CSS -->
        <?= $this->Html->css('/startbootstrap/vendor/metisMenu/metisMenu.min.css') ?>

        <!-- Custom CSS -->
        <?= $this->Html->css('/startbootstrap/dist/css/sb-admin-2.css') ?>

        <!-- Morris Charts CSS -->
        <?= $this->Html->css('/startbootstrap/vendor/morrisjs/morris.css') ?>


        <!-- Custom Fonts -->
        <?= $this->Html->css('/startbootstrap/vendor/font-awesome/css/font-awesome.min.css') ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <?= $this->Html->css('abeef_style.css', ['rel' => 'stylesheet']) ?>

        <!-- jQuery -->
        <?= $this->Html->script('/startbootstrap/vendor/jquery/jquery.min.js') ?>

        <!-- Bootstrap Core JavaScript -->
        <?= $this->Html->script('/startbootstrap/vendor/bootstrap/js/bootstrap.min.js') ?>

        <!-- Metis Menu Plugin JavaScript -->
        <?= $this->Html->script('/startbootstrap/vendor/metisMenu/metisMenu.min.js') ?>

        <!-- Morris Charts JavaScript -->
        <?= $this->Html->script('/startbootstrap/vendor/raphael/raphael.min.js') ?>
        <?= $this->Html->script('/startbootstrap/vendor/morrisjs/morris.min.js') ?>
        <?= $this->Html->script('/startbootstrap/data/morris-data.js') ?>

        <!-- Custom Theme JavaScript -->
        <?= $this->Html->script('/startbootstrap/dist/js/sb-admin-2.js') ?>
    </head>
    <body>
        <div id="wrapper" style="background-color: #FFFFFF;">
            <?= $this->element('Layout/nav') ?>
            <div class="container">
                <?= $this->Flash->render() ?>
                
                <?= $this->fetch('content') ?>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    </body>
</html>
