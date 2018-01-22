<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FarmHerdsman[]|\Cake\Collection\CollectionInterface $farmHerdsmans
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Farm Herdsman'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Farms'), ['controller' => 'Farms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Farm'), ['controller' => 'Farms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="farmHerdsmans index large-9 medium-8 columns content">
    <h3><?= __('Farm Herdsmans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('farm_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('herdsman_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seq') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($farmHerdsmans as $farmHerdsman): ?>
            <tr>
                <td><?= h($farmHerdsman->id) ?></td>
                <td><?= $farmHerdsman->has('farm') ? $this->Html->link($farmHerdsman->farm->name, ['controller' => 'Farms', 'action' => 'view', $farmHerdsman->farm->id]) : '' ?></td>
                <td><?= h($farmHerdsman->herdsman_id) ?></td>
                <td><?= h($farmHerdsman->description) ?></td>
                <td><?= $this->Number->format($farmHerdsman->seq) ?></td>
                <td><?= h($farmHerdsman->created) ?></td>
                <td><?= h($farmHerdsman->createdby) ?></td>
                <td><?= h($farmHerdsman->updated) ?></td>
                <td><?= h($farmHerdsman->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $farmHerdsman->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $farmHerdsman->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $farmHerdsman->id], ['confirm' => __('Are you sure you want to delete # {0}?', $farmHerdsman->id)]) ?>
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
