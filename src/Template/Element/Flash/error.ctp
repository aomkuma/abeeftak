<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>


<div class="row" onclick="this.classList.add('hidden')">
    <div class="col-lg-6 col-lg-offset-3 text-center">
        <div class="alert alert-danger" onclick="this.classList.add('hidden');">
            <?= $message ?>
        </div>
    </div>

</div>