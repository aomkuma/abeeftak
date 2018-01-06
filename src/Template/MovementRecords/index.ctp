<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovementRecord[]|\Cake\Collection\CollectionInterface $movementRecords
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Movement Record'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movementRecords index large-9 medium-8 columns content">
    <h3><?= __('Movement Records') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cow_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('departure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destination') ?></th>
                <th scope="col"><?= $this->Paginator->sort('movement_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movementRecords as $movementRecord): ?>
            <tr>
                <td><?= h($movementRecord->id) ?></td>
                <td><?= $movementRecord->has('cow') ? $this->Html->link($movementRecord->cow->id, ['controller' => 'Cows', 'action' => 'view', $movementRecord->cow->id]) : '' ?></td>
                <td><?= h($movementRecord->departure) ?></td>
                <td><?= h($movementRecord->destination) ?></td>
                <td><?= h($movementRecord->movement_date) ?></td>
                <td><?= h($movementRecord->description) ?></td>
                <td><?= h($movementRecord->created) ?></td>
                <td><?= h($movementRecord->createdby) ?></td>
                <td><?= h($movementRecord->updated) ?></td>
                <td><?= h($movementRecord->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $movementRecord->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $movementRecord->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movementRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movementRecord->id)]) ?>
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
