<?=$this->Html->script('cow/treatmentandvaccination.js')?>
<script>
    var jsondata = <?=$jsondata?>;
    
    exportPDF(jsondata);
    
    console.log(jsondata);
</script>
