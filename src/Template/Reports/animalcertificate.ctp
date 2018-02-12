<?=$this->Html->script('cow/animalcertificate.js')?>
<script>
    var jsondatacow = <?=$jsondatacow?>;
    var jsondataFath = <?=$jsondataFath?>;
    var jsondataMoth = <?=$jsondataMoth?>;
    var jsondatamoveR = <?=$jsondatamoveR?>;
     var jsondataTreatR = <?=$jsondataTreatR?>;
    
    exportPDF(jsondatacow,jsondataFath,jsondataMoth,jsondatamoveR,jsondataTreatR);
    
    console.log(jsondatacow,jsondataFath,jsondataMoth,jsondatamoveR,jsondataTreatR);
    setTimeout(function () {

        window.close();
    }, 1000);
</script>

<div class="container">
    <div class="row" style="">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-3">
                <div class="login-panel panel panel-default">
                   
                    <div class="panel-body">
                      
                                <div class="form-group" style="text-align: center">
                                    <h2 style=" color:blue;" > ดาวน์โหลด บัตรประจำตัวสัตว์</h2>
                                </div>
                                <div class="form-group" style="text-align: center">
                                    <?= $this->Html->link(BT_BACK, ['controller'=>'cows','action' => 'index'], ['escape' => false]) ?>
                                </div>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>