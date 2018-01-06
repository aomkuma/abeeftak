<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovementRecord $movementRecord
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Movement Record'), ['action' => 'edit', $movementRecord->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Movement Record'), ['action' => 'delete', $movementRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movementRecord->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Movement Records'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movement Record'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="movementRecords view large-9 medium-8 columns content">
    <h3><?= h($movementRecord->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($movementRecord->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cow') ?></th>
            <td><?= $movementRecord->has('cow') ? $this->Html->link($movementRecord->cow->id, ['controller' => 'Cows', 'action' => 'view', $movementRecord->cow->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Departure') ?></th>
            <td><?= h($movementRecord->departure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination') ?></th>
            <td><?= h($movementRecord->destination) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($movementRecord->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($movementRecord->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($movementRecord->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Movement Date') ?></th>
            <td><?= h($movementRecord->movement_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($movementRecord->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($movementRecord->updated) ?></td>
        </tr>
    </table>
</div>
