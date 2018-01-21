<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Running $running
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Running'), ['action' => 'edit', $running->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Running'), ['action' => 'delete', $running->id], ['confirm' => __('Are you sure you want to delete # {0}?', $running->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Runnings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Running'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="runnings view large-9 medium-8 columns content">
    <h3><?= h($running->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Running Code') ?></th>
            <td><?= h($running->running_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Running Type') ?></th>
            <td><?= h($running->running_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($running->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Running No') ?></th>
            <td><?= $this->Number->format($running->running_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Runnubg Date') ?></th>
            <td><?= h($running->runnubg_date) ?></td>
        </tr>
    </table>
</div>
