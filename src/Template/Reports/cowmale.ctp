<?=$this->Html->script('cow/cowmale.js')?>
<script>
    var jsondatacow = <?=$jsondatacow?>;
    var jsondatagrowth = <?=$jsondatagrowth?>;
    
    exportPDF(jsondatacow,jsondatagrowth);
    
    console.log(jsondatacow,jsondatagrowth);
</script>
