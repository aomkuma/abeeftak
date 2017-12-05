<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BreedingRecord[]|\Cake\Collection\CollectionInterface $breedingRecords
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Breeding Record'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="breedingRecords index large-9 medium-8 columns content">
    <h3><?= __('Breeding Records') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('breeding_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mother_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cow_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($breedingRecords as $breedingRecord): ?>
            <tr>
                <td><?= h($breedingRecord->id) ?></td>
                <td><?= h($breedingRecord->breeding_date) ?></td>
                <td><?= h($breedingRecord->mother_code) ?></td>
                <td><?= h($breedingRecord->created) ?></td>
                <td><?= h($breedingRecord->createdby) ?></td>
                <td><?= h($breedingRecord->updated) ?></td>
                <td><?= h($breedingRecord->updatedby) ?></td>
                <td><?= h($breedingRecord->cow_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $breedingRecord->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $breedingRecord->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $breedingRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $breedingRecord->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
