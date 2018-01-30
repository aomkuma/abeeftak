<?= $this->Html->script('cow/cowqtyreport.js') ?>
<script>
 
    var jsondata = <?= $summaryjs ?>;

    exportPDF(jsondata);
    setTimeout(function () {

        window.close();
    }, 1000);

    ///close tab//

</script>

