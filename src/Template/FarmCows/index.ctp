<div class="list-group" id="cow_list">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>รหัส</th>
                <th>เพิ่มโดย</th>
                <th></th>
            </tr>
        </thead>
        <?php foreach ($farmCows as $item): ?>
            <tr>
                <td><?= h($item->seq) ?></td>
                <td><?= h($item->cow->code) ?></td>
                <td><?= h($item->createdby) ?></td>
                <td><?=BT_DELETE?></td>
            </tr>


        <?php endforeach; ?>
    </table>
</div>
