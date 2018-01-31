<?=$this->Html->script('cow/animalcertificate.js')?>
<script>
    var jsondatacow = <?=$jsondatacow?>;
    var jsondataFath = <?=$jsondataFath?>;
    var jsondataMoth = <?=$jsondataMoth?>;
    var jsondatamoveR = <?=$jsondatamoveR?>;
    
    exportPDF(jsondatacow,jsondataFath,jsondataMoth,jsondatamoveR);
    
    console.log(jsondatacow,jsondataFath,jsondataMoth,jsondatamoveR);
</script>
