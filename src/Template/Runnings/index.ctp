<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Running[]|\Cake\Collection\CollectionInterface $runnings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Running'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="runnings index large-9 medium-8 columns content">
    <h3><?= __('Runnings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('running_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('running_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('runnubg_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('running_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($runnings as $running): ?>
            <tr>
                <td><?= $this->Number->format($running->id) ?></td>
                <td><?= h($running->running_code) ?></td>
                <td><?= $this->Number->format($running->running_no) ?></td>
                <td><?= h($running->runnubg_date) ?></td>
                <td><?= h($running->running_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $running->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $running->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $running->id], ['confirm' => __('Are you sure you want to delete # {0}?', $running->id)]) ?>
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
