<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grass $grass
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grass'), ['action' => 'edit', $grass->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grass'), ['action' => 'delete', $grass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grass->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grasses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grass'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="grasses view large-9 medium-8 columns content">
    <h3><?= h($grass->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($grass->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($grass->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($grass->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($grass->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($grass->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($grass->updated) ?></td>
        </tr>
    </table>
</div>
