<?=$this->Html->script('cow/cowmale.js')?>
<script>
    var jsondatacow = <?=$jsondatacow?>;
    var jsondatagrowth = <?=$jsondatagrowth?>;
    var jsondatagrowthW = <?=$jsondatagrowthW?>;
    var jsondataBreed = <?=$jsondataBreed?>;
    var jsondataFath = <?=$jsondataFath?>;
    var jsondataMoth = <?=$jsondataMoth?>;
    
    
    exportPDF(jsondatacow,jsondatagrowth,jsondatagrowthW,jsondataBreed,jsondataFath,jsondataMoth);
    
    console.log(jsondatacow,jsondatagrowth);
</script>
