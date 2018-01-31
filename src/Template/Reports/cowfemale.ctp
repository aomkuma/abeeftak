<?=$this->Html->script('cow/cowfemale.js')?>
<script>
    var jsondatacow = <?=$jsondatacow?>;
    var jsondatagrowth = <?=$jsondatagrowth?>;
    var jsondatagrowthW = <?=$jsondatagrowthW?>;
    var jsondatagbR = <?=$jsondatagbR?>;
    var jsondataFath = <?=$jsondataFath?>;
    var jsondataMoth = <?=$jsondataMoth?>;
    
    
    exportPDF(jsondatacow,jsondatagrowth,jsondatagrowthW,jsondatagbR,jsondataFath,jsondataMoth);
    
    console.log(jsondatacow,jsondatagrowth);
</script>
