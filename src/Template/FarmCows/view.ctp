<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FarmCow $farmCow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Farm Cow'), ['action' => 'edit', $farmCow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Farm Cow'), ['action' => 'delete', $farmCow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $farmCow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Farm Cows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Farm Cow'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Farms'), ['controller' => 'Farms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Farm'), ['controller' => 'Farms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="farmCows view large-9 medium-8 columns content">
    <h3><?= h($farmCow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($farmCow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Farm') ?></th>
            <td><?= $farmCow->has('farm') ? $this->Html->link($farmCow->farm->name, ['controller' => 'Farms', 'action' => 'view', $farmCow->farm->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cow') ?></th>
            <td><?= $farmCow->has('cow') ? $this->Html->link($farmCow->cow->id, ['controller' => 'Cows', 'action' => 'view', $farmCow->cow->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($farmCow->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($farmCow->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($farmCow->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seq') ?></th>
            <td><?= $this->Number->format($farmCow->seq) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($farmCow->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($farmCow->updated) ?></td>
        </tr>
    </table>
</div>
