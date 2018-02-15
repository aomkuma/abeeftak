<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ABEEF TAK การบริหารจัดการข้อมูลโค</title>
        <!-- Bootstrap Core CSS -->
        <?= $this->Html->css('/startbootstrap/vendor/bootstrap/css/bootstrap.css') ?>

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

        <script>
            var urlGlobal = '<?=SITE_URL?>';
            function convertDate(dateObj, type){
                console.log(dateObj, type);
                
                var d = null;
                var showDate = null;
                //var setDate = null;
                if(dateObj != null){
                    d = new Date(dateObj);   
                    showDate = padLeft(d.getDate(), 2, '0') + '/' + padLeft(d.getMonth() + 1, 2, '0') + '/' + (d.getFullYear() + 543);
                    $('#' + type).datepicker({
                                format: 'dd/mm/yyyy',
                                todayBtn: true,
                                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                                thaiyear: true              //Set เป็นปี พ.ศ.
                            }).datepicker("setDate", "0"); 
                    
                }else{
                    $('#' + type).datepicker({
                        format: 'dd/mm/yyyy',
                        todayBtn: true,
                        language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                        thaiyear: true              //Set เป็นปี พ.ศ.
                    }).datepicker("setDate", "0");
                }

                return showDate;
            }

            function padLeft(num, size, pad_with) {
                var s = num+"";
                while (s.length < size) s = pad_with + s;
                return s;
            }

        </script>

        <!-- Custom Theme JavaScript -->
        <?= $this->Html->script('/startbootstrap/dist/js/sb-admin-2.js') ?>

        <?= $this->Html->script('jquery.validate.min.js') ?>
        <?= $this->Html->script('angular-scripts/node_modules/angular/angular.min.js') ?>
        <?= $this->Html->script('angular-scripts/node_modules/angular-ui-bootstrap/dist/ui-bootstrap-tpls.js') ?>
        <?= $this->Html->script('angular-scripts/node_modules/angular-animate/angular-animate.min.js') ?>
        <?= $this->Html->script('angular-scripts/node_modules/angular-cookies/angular-cookies.min.js') ?>
        <?= $this->Html->script('angular-scripts/node_modules/ng-file-upload/ng-file-upload-shim.min.js') ?>
        <?= $this->Html->script('angular-scripts/node_modules/ng-file-upload/ng-file-upload.min.js') ?>
        <?= $this->Html->script('angular-scripts/abeef-main.js') ?>
        <?= $this->Html->script('angular-scripts/service-factory/HttpService.js') ?>
        <?= $this->Html->script('angular-scripts/controllers/CowUpdateController.js') ?>
        <?= $this->Html->script('angular-scripts/node_modules/pdfmake/build/pdfmake.min.js') ?>
        <?= $this->Html->script('angular-scripts/node_modules/pdfmake/build/vfs_fonts.js') ?>
        <?= $this->Html->script('angular-scripts/node_modules/pdfmake/build/build/vfs_fonts.js') ?>
        
        <?= $this->Html->css('bootstrap-3.3.7-dist/css/bootstrap-theme.css', ['rel' => 'stylesheet']) ?>
        <?= $this->Html->css('css-datepicker/bootstrap-datepicker.css', ['rel' => 'stylesheet']) ?>
        <?= $this->Html->script('bootstrap-datepicker-custom/dist/js/bootstrap-datepicker-custom.js') ?>
        <?= $this->Html->script('bootstrap-datepicker-custom/dist/locales/bootstrap-datepicker.th.min.js') ?>


    </head>
    <body>
        <div id="wrapper" style="background-color: #FFFFFF;">
            <?= $this->element('Layout/nav') ?>
            <div class="container margin-top-20">
                <?= $this->Flash->render() ?>

                <?= $this->fetch('content') ?>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    </body>
</html>
