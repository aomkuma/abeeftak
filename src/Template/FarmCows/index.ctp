<div class="row">
    <div class="col-md-12">
        <?= $this->Form->create('cow', ['novalidate' => true, 'id' => 'cowfrm', 'class' => '', 'url' => ['action' => 'addcow', $farm_id]]) ?>
        <?= $this->Form->hidden('farm_id', ['value' => $farm_id]) ?>
        <div class="form-group col-md-8 col-xs-9 col-md-offset-1">
            <?= $this->Form->select('cow_id', $cows, ['class' => 'form-control', 'id' => 'cow_id']) ?>
        </div>
        <div class="form-group col-md-2 col-xs-3">
            <button type="submit" class="btn btn-primary btn-block">เพิ่ม</button>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>
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
        <?php $count = 1; ?>
        <?php foreach ($farmCows as $item): ?>
            <tr>
                <td><?= h($count) ?></td>
                <td><?= h($item->cow->code) ?></td>
                <td><?= h($item->createdby) ?></td>
                <td class="text-right">
            <?= $this->Form->postLink('<span class="label label-warning">ย้ายออก</span>', ['action' => 'movecow', $item->id, $item->farm_id], ['confirm' => __('คุณต้องการย้าย "{0}" ออกจากฟาร์ม?', $item->cow->code), 'escape' => false]) ?>
                    <?= $this->Form->postLink('<span class="label label-danger">ลบ</span>', ['action' => 'delete', $item->id, $item->farm_id], ['confirm' => __('คุณต้องการลบ "{0}" ออกจากฟาร์ม?', $item->cow->code), 'escape' => false]) ?></td>
            </tr>

            <?php $count++; ?>
        <?php endforeach; ?>
        <?php if (is_null($farmCows) || sizeof($farmCows) == 0) { ?>
            <tr>
                <td colspan="4"  class="text-center text-danger">
                    ยังไม่มีโค
                </td>
            </tr>
        <?php } ?>

    </table>
</div>
<script>
    $(document).ready(function () {
        Validation.initValidation();
    });

    var Validation = function () {
        return {
            //Validation
            initValidation: function () {
                $("#cowfrm").validate({
                    rules:
                            {
                                cow_id:
                                        {
                                            required: true
                                        }

                            },

                    // Messages for form validation
                    messages:
                            {
                                cow_id:
                                        {
                                            required: ''
                                        }

                            },

                    // Do not change code below
                    errorPlacement: function (error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });
            }

        };
    }();
</script>