<?=$this->Html->script('cow/historyowner.js')?>
<script>
    var jsondata = <?=$jsondata?>;
    
    exportPDF(jsondata);
    
    console.log(jsondata);
</script>
