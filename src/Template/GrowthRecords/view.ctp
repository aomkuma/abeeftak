<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GrowthRecord $growthRecord
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Growth Record'), ['action' => 'edit', $growthRecord->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Growth Record'), ['action' => 'delete', $growthRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $growthRecord->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Growth Records'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Growth Record'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="growthRecords view large-9 medium-8 columns content">
    <h3><?= h($growthRecord->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($growthRecord->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($growthRecord->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age') ?></th>
            <td><?= h($growthRecord->age) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Food Type') ?></th>
            <td><?= h($growthRecord->food_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Eating') ?></th>
            <td><?= h($growthRecord->total_eating) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($growthRecord->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($growthRecord->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($growthRecord->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cow Id') ?></th>
            <td><?= h($growthRecord->cow_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= $this->Number->format($growthRecord->weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chest') ?></th>
            <td><?= $this->Number->format($growthRecord->chest) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Height') ?></th>
            <td><?= $this->Number->format($growthRecord->height) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Length') ?></th>
            <td><?= $this->Number->format($growthRecord->length) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Growth Stat') ?></th>
            <td><?= $this->Number->format($growthRecord->growth_stat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Record Date') ?></th>
            <td><?= h($growthRecord->record_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($growthRecord->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($growthRecord->updated) ?></td>
        </tr>
    </table>
</div>
