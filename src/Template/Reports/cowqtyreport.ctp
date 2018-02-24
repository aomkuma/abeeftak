<?= $this->Html->script('cow/cowqtyreport.js') ?>
<script>

    var jsondata1 = <?= $summaryjs1 ?>;
    var jsondata2 = <?= $summaryjs2 ?>;
    var jsondata3 = <?= $summaryjs3 ?>;
    var jsondata4 = <?= $summaryjs4 ?>;
    var jsondata5 = <?= $summaryjs5 ?>;
    var jsondata6 = <?= $summaryjs6 ?>;
    var jsondata7 = <?= $summaryjs7 ?>;
    var jsondata8 = <?= $summaryjs8 ?>;
    exportPDF(jsondata1,jsondata2,jsondata3,jsondata4,jsondata5,jsondata6,jsondata7,jsondata8);
    setTimeout(function () {

        window.close();
    }, 1000);

    ///close tab//

</script>

