<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BreedingRecord $breedingRecord
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Breeding Record'), ['action' => 'edit', $breedingRecord->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Breeding Record'), ['action' => 'delete', $breedingRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $breedingRecord->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Breeding Records'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Breeding Record'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="breedingRecords view large-9 medium-8 columns content">
    <h3><?= h($breedingRecord->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($breedingRecord->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mother Code') ?></th>
            <td><?= h($breedingRecord->mother_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($breedingRecord->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($breedingRecord->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cow Id') ?></th>
            <td><?= h($breedingRecord->cow_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Breeding Date') ?></th>
            <td><?= h($breedingRecord->breeding_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($breedingRecord->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($breedingRecord->updated) ?></td>
        </tr>
    </table>
</div>
