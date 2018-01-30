<?= $this->Html->script('user/user_report.js') ?>
<script>
    var jsondata1 = <?= $detailjs ?>;
    var jsondata2 = <?= $summaryjs ?>;

    exportPDF(jsondata1, jsondata2);
    setTimeout(function () {

        window.close();
    }, 1000);

    ///close tab//

</script>
