<?=$this->Html->script('cow/animalcertificate.js')?>
<script>
    var jsondata = <?=$jsondata?>;
    
    exportPDF(jsondata);
    
    console.log(jsondata);
</script>
