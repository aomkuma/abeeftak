<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GivebirthRecord[]|\Cake\Collection\CollectionInterface $givebirthRecords
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Givebirth Record'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="givebirthRecords index large-9 medium-8 columns content">
    <h3><?= __('Givebirth Records') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('breeding_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('father_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('authorities') ?></th>
                <th scope="col"><?= $this->Paginator->sort('breeding_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cow_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($givebirthRecords as $givebirthRecord): ?>
            <tr>
                <td><?= h($givebirthRecord->id) ?></td>
                <td><?= h($givebirthRecord->breeding_date) ?></td>
                <td><?= h($givebirthRecord->father_code) ?></td>
                <td><?= h($givebirthRecord->authorities) ?></td>
                <td><?= h($givebirthRecord->breeding_status) ?></td>
                <td><?= h($givebirthRecord->created) ?></td>
                <td><?= h($givebirthRecord->createdby) ?></td>
                <td><?= h($givebirthRecord->updated) ?></td>
                <td><?= h($givebirthRecord->updatedby) ?></td>
                <td><?= h($givebirthRecord->cow_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $givebirthRecord->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $givebirthRecord->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $givebirthRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $givebirthRecord->id)]) ?>
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
