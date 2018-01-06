<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GivebirthRecord $givebirthRecord
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Givebirth Record'), ['action' => 'edit', $givebirthRecord->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Givebirth Record'), ['action' => 'delete', $givebirthRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $givebirthRecord->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Givebirth Records'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Givebirth Record'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="givebirthRecords view large-9 medium-8 columns content">
    <h3><?= h($givebirthRecord->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($givebirthRecord->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Father Code') ?></th>
            <td><?= h($givebirthRecord->father_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Authorities') ?></th>
            <td><?= h($givebirthRecord->authorities) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Breeding Status') ?></th>
            <td><?= h($givebirthRecord->breeding_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($givebirthRecord->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($givebirthRecord->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cow Id') ?></th>
            <td><?= h($givebirthRecord->cow_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Breeding Date') ?></th>
            <td><?= h($givebirthRecord->breeding_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($givebirthRecord->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($givebirthRecord->updated) ?></td>
        </tr>
    </table>
</div>
