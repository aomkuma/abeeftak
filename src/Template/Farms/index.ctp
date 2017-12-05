<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farm[]|\Cake\Collection\CollectionInterface $farms
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Farm'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="farms index large-9 medium-8 columns content">
    <h3><?= __('Farms') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hasstable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_stable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_cow_capacity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hasmeadow') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_meadow') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_space') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grass_species') ?></th>
                <th scope="col"><?= $this->Paginator->sort('water_body') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dung_destroy') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($farms as $farm): ?>
            <tr>
                <td><?= h($farm->id) ?></td>
                <td><?= h($farm->name) ?></td>
                <td><?= h($farm->level) ?></td>
                <td><?= h($farm->type) ?></td>
                <td><?= $farm->has('address') ? $this->Html->link($farm->address->id, ['controller' => 'Addresses', 'action' => 'view', $farm->address->id]) : '' ?></td>
                <td><?= h($farm->description) ?></td>
                <td><?= h($farm->location_image) ?></td>
                <td><?= $this->Number->format($farm->latitude) ?></td>
                <td><?= $this->Number->format($farm->longitude) ?></td>
                <td><?= h($farm->hasstable) ?></td>
                <td><?= $this->Number->format($farm->total_stable) ?></td>
                <td><?= $this->Number->format($farm->total_cow_capacity) ?></td>
                <td><?= h($farm->hasmeadow) ?></td>
                <td><?= $this->Number->format($farm->total_meadow) ?></td>
                <td><?= $this->Number->format($farm->total_space) ?></td>
                <td><?= h($farm->grass_species) ?></td>
                <td><?= h($farm->water_body) ?></td>
                <td><?= h($farm->dung_destroy) ?></td>
                <td><?= h($farm->created) ?></td>
                <td><?= h($farm->createdby) ?></td>
                <td><?= h($farm->updated) ?></td>
                <td><?= h($farm->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $farm->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $farm->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $farm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $farm->id)]) ?>
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
