<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FarmCow[]|\Cake\Collection\CollectionInterface $farmCows
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Farm Cow'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Farms'), ['controller' => 'Farms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Farm'), ['controller' => 'Farms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="farmCows index large-9 medium-8 columns content">
    <h3><?= __('Farm Cows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('farm_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cow_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seq') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($farmCows as $farmCow): ?>
            <tr>
                <td><?= h($farmCow->id) ?></td>
                <td><?= $farmCow->has('farm') ? $this->Html->link($farmCow->farm->name, ['controller' => 'Farms', 'action' => 'view', $farmCow->farm->id]) : '' ?></td>
                <td><?= $farmCow->has('cow') ? $this->Html->link($farmCow->cow->id, ['controller' => 'Cows', 'action' => 'view', $farmCow->cow->id]) : '' ?></td>
                <td><?= $this->Number->format($farmCow->seq) ?></td>
                <td><?= h($farmCow->description) ?></td>
                <td><?= h($farmCow->created) ?></td>
                <td><?= h($farmCow->createdby) ?></td>
                <td><?= h($farmCow->updated) ?></td>
                <td><?= h($farmCow->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $farmCow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $farmCow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $farmCow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $farmCow->id)]) ?>
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
