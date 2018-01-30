<?=$this->Html->script('cow/animalcertificate.js')?>
<script>
    var jsondatacow = <?=$jsondatacow?>;
    var jsondataFath = <?=$jsondataFath?>;
    var jsondataMoth = <?=$jsondataMoth?>;
    
    exportPDF(jsondatacow,jsondataFath,jsondataMoth);
    
    console.log(jsondatacow,jsondataFath,jsondataMoth);
</script>
