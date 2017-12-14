<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Herdsman $herdsman
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Herdsman'), ['action' => 'edit', $herdsman->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Herdsman'), ['action' => 'delete', $herdsman->id], ['confirm' => __('Are you sure you want to delete # {0}?', $herdsman->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Herdsmans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Herdsman'), ['action' => 'add']) ?> </li>
    </ul>
</nav>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
       
        <table class="table-condensed" style="width: 100%">
            <tr>
                <td class="text-center" colspan="4">รูป <?= $herdsman->has('image') ? $herdsman->image->path : '' ?> </td>
            </tr>
            <tr>
                <td class="text-right"><b>รหัส : </b></td>
                <td><?= h($herdsman->code) ?></td> 
                <td class="text-right"><b>ชื่อ-นามสกุล : </b></td>
                <td><?= h($herdsman->title) ?> &nbsp; <?= h($herdsman->firstname) ?>&nbsp;&nbsp;<?= h($herdsman->lastname) ?></td>
            </tr>

            <tr>
                <td class="text-right"><b>รหัสประจำตัวประชาชน :</b> </td>
                <td><?= h($herdsman->idcard) ?>  </td>
                <td class="text-right">  </td>
                <td></td>
            </tr>    
            <tr>
                <td class="text-right">   <b>เบอร์โทรศัพท์: </b> </td>
                <td><?= h($herdsman->mobile) ?></td>
                <td class="text-right"> <b>อีเมลล์: </b> </td>
                <td><?= h($herdsman->email) ?></td>
            </tr>
            <tr>
                <td class="text-right"><b>วันเดือนปีเกิด/วันที่จดทะเบียน : </b></td>
                <td><?= h($herdsman->birthday) ?></td>
                <td class="text-right"><b>วันที่ขึ้นทะเบียน : </b> </td>
                <td><?= h($herdsman->registerdate) ?> </td>
            </tr>
            
            <tr>
                <td class="text-right"><b>บ้านเลขที่ : </b></td>
                <td><?= $herdsman->has('address') ? $herdsman->address->houseno : '' ?></td>
                <td class="text-right"><b>หมู่ที่ : </b></td>
                <td><?= $herdsman->has('address') ? $herdsman->address->villageno : '' ?></td>
            </tr>

            <tr>
                <td class="text-right"><b>ชื่อหมู่บ้าน : </b></td>
                <td><?= $herdsman->has('address') ? $herdsman->address->villagename : '' ?></td>
                <td class="text-right"><b>ตำบล : </b></td>
                <td><?= $herdsman->has('address') ? $herdsman->address->subdistrict : '' ?></td>
            </tr>
            <tr>
                <td class="text-right"><b>อำเภอ : </b></td>
                <td><?= $herdsman->has('address') ? $herdsman->address->district : '' ?></td>
                <td class="text-right"><b>จังหวัด : </b></td>
                <td></td>
            </tr>
            <tr>
                <td class="text-right"><b>รหัสไปรษณีย์ : </b></td>
                <td><?= $herdsman->has('address') ? $herdsman->address->postalcode : '' ?></td>
            </tr>
        </table>
        <div><?= $this->Html->link(__('<< ย้อนกลับ'),  ['controller' => 'Herdsmans', 'action' => 'index', 'escape' => false]); ?></div>
        <?= $this->Form->end() ?>
    </div>
</div>
