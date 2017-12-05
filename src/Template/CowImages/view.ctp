<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CowImage $cowImage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cow Image'), ['action' => 'edit', $cowImage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cow Image'), ['action' => 'delete', $cowImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cowImage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cow Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cow Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cowImages view large-9 medium-8 columns content">
    <h3><?= h($cowImage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($cowImage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cow') ?></th>
            <td><?= $cowImage->has('cow') ? $this->Html->link($cowImage->cow->id, ['controller' => 'Cows', 'action' => 'view', $cowImage->cow->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $cowImage->has('image') ? $this->Html->link($cowImage->image->name, ['controller' => 'Images', 'action' => 'view', $cowImage->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($cowImage->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cowImage->created) ?></td>
        </tr>
    </table>
</div>
