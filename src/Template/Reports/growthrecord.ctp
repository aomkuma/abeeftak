<?=$this->Html->script('cow/growthrecord.js')?>
<script>
    var jsondata = <?=$jsondata?>;
    
    exportPDF(jsondata);
    
    console.log(jsondata);
</script>