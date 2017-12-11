<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <?= $this->Html->meta('icon') ?>

        <title>ABeef</title>

        <!-- Bootstrap core CSS -->
        <?= $this->Html->css('bootstrap.css', ['rel' => 'stylesheet']) ?>
        <?= $this->Html->css('abeef_style.css', ['rel' => 'stylesheet']) ?>

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <?= $this->Html->css('ie10-viewport-bug-workaround.css', ['rel' => 'stylesheet']) ?>

        <!-- Custom styles for this template -->
        <?= $this->Html->css('dashboard.css', ['rel' => 'stylesheet']) ?>

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <?= $this->Html->script('ie-emulation-modes-warning.js') ?>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    </head>

    <body>

        <?= $this->element('Layout/nav') ?>

        <div class="container-fluid margin-20">
            <?= $this->fetch('content') ?>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <?= $this->Html->script('bootstrap.min.js') ?>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <?= $this->Html->script('vendor/holder.min.js') ?>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <?= $this->Html->script('bootstrap.min.js') ?>
        <?= $this->Html->script('ie10-viewport-bug-workaround.js') ?>
    </body>
</html>
