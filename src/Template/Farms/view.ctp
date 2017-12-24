<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farm $farm
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Farm'), ['action' => 'edit', $farm->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Farm'), ['action' => 'delete', $farm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $farm->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Farms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Farm'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="farms view large-9 medium-8 columns content">
    <h3><?= h($farm->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($farm->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($farm->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= h($farm->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($farm->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= $farm->has('address') ? $this->Html->link($farm->address->id, ['controller' => 'Addresses', 'action' => 'view', $farm->address->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($farm->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Image') ?></th>
            <td><?= h($farm->location_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hasstable') ?></th>
            <td><?= h($farm->hasstable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hasmeadow') ?></th>
            <td><?= h($farm->hasmeadow) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grass Species') ?></th>
            <td><?= h($farm->grass_species) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Water Body') ?></th>
            <td><?= h($farm->water_body) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dung Destroy') ?></th>
            <td><?= h($farm->dung_destroy) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($farm->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($farm->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($farm->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($farm->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Stable') ?></th>
            <td><?= $this->Number->format($farm->total_stable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Cow Capacity') ?></th>
            <td><?= $this->Number->format($farm->total_cow_capacity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Meadow') ?></th>
            <td><?= $this->Number->format($farm->total_meadow) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Space') ?></th>
            <td><?= $this->Number->format($farm->total_space) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($farm->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($farm->updated) ?></td>
        </tr>
    </table>
</div>
