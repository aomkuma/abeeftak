<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FarmHerdsman $farmHerdsman
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Farm Herdsman'), ['action' => 'edit', $farmHerdsman->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Farm Herdsman'), ['action' => 'delete', $farmHerdsman->id], ['confirm' => __('Are you sure you want to delete # {0}?', $farmHerdsman->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Farm Herdsmans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Farm Herdsman'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Farms'), ['controller' => 'Farms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Farm'), ['controller' => 'Farms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="farmHerdsmans view large-9 medium-8 columns content">
    <h3><?= h($farmHerdsman->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($farmHerdsman->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Farm') ?></th>
            <td><?= $farmHerdsman->has('farm') ? $this->Html->link($farmHerdsman->farm->name, ['controller' => 'Farms', 'action' => 'view', $farmHerdsman->farm->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Herdsman Id') ?></th>
            <td><?= h($farmHerdsman->herdsman_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($farmHerdsman->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($farmHerdsman->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($farmHerdsman->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seq') ?></th>
            <td><?= $this->Number->format($farmHerdsman->seq) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($farmHerdsman->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($farmHerdsman->updated) ?></td>
        </tr>
    </table>
</div>
