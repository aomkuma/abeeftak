

<?=$this->Html->script('cow/movementrecord.js')?>
<script>
    var jsondata = <?=$jsondata?>;
    
    exportPDF(jsondata);
    
    console.log(jsondata);
</script>