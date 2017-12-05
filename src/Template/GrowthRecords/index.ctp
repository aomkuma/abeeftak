<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GrowthRecord[]|\Cake\Collection\CollectionInterface $growthRecords
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Growth Record'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="growthRecords index large-9 medium-8 columns content">
    <h3><?= __('Growth Records') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('record_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chest') ?></th>
                <th scope="col"><?= $this->Paginator->sort('height') ?></th>
                <th scope="col"><?= $this->Paginator->sort('length') ?></th>
                <th scope="col"><?= $this->Paginator->sort('growth_stat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('food_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_eating') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cow_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($growthRecords as $growthRecord): ?>
            <tr>
                <td><?= h($growthRecord->id) ?></td>
                <td><?= h($growthRecord->type) ?></td>
                <td><?= h($growthRecord->record_date) ?></td>
                <td><?= h($growthRecord->age) ?></td>
                <td><?= $this->Number->format($growthRecord->weight) ?></td>
                <td><?= $this->Number->format($growthRecord->chest) ?></td>
                <td><?= $this->Number->format($growthRecord->height) ?></td>
                <td><?= $this->Number->format($growthRecord->length) ?></td>
                <td><?= $this->Number->format($growthRecord->growth_stat) ?></td>
                <td><?= h($growthRecord->food_type) ?></td>
                <td><?= h($growthRecord->total_eating) ?></td>
                <td><?= h($growthRecord->description) ?></td>
                <td><?= h($growthRecord->created) ?></td>
                <td><?= h($growthRecord->createdby) ?></td>
                <td><?= h($growthRecord->updated) ?></td>
                <td><?= h($growthRecord->updatedby) ?></td>
                <td><?= h($growthRecord->cow_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $growthRecord->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $growthRecord->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $growthRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $growthRecord->id)]) ?>
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
