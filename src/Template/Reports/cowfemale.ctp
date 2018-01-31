<?=$this->Html->script('cow/cowfemale.js')?>
<script>
    var jsondatacow = <?=$jsondatacow?>;
    var jsondatagrowth = <?=$jsondatagrowth?>;
    var jsondatagrowthW = <?=$jsondatagrowthW?>;
    var jsondatagbR = <?=$jsondatagbR?>;
    
    
    exportPDF(jsondatacow,jsondatagrowth,jsondatagrowthW,jsondatagbR);
    
    console.log(jsondatacow,jsondatagrowth);
</script>
