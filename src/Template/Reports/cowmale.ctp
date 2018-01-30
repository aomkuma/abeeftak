<?=$this->Html->script('cow/cowmale.js')?>
<script>
    var jsondatacow = <?=$jsondatacow?>;
    var jsondatagrowth = <?=$jsondatagrowth?>;
    var jsondatagrowthW = <?=$jsondatagrowthW?>;
    var jsondataBreed = <?=$jsondataBreed?>;
    
    
    exportPDF(jsondatacow,jsondatagrowth,jsondatagrowthW,jsondataBreed);
    
    console.log(jsondatacow,jsondatagrowth);
</script>
