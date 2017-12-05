<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Herdsman $herdsman
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Herdsman'), ['action' => 'edit', $herdsman->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Herdsman'), ['action' => 'delete', $herdsman->id], ['confirm' => __('Are you sure you want to delete # {0}?', $herdsman->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Herdsmans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Herdsman'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="herdsmans view large-9 medium-8 columns content">
    <h3><?= h($herdsman->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($herdsman->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($herdsman->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($herdsman->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($herdsman->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($herdsman->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idcard') ?></th>
            <td><?= h($herdsman->idcard) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isactive') ?></th>
            <td><?= h($herdsman->isactive) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= $herdsman->has('address') ? $this->Html->link($herdsman->address->id, ['controller' => 'Addresses', 'action' => 'view', $herdsman->address->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($herdsman->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($herdsman->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($herdsman->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($herdsman->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($herdsman->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthday') ?></th>
            <td><?= h($herdsman->birthday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registerdate') ?></th>
            <td><?= h($herdsman->registerdate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($herdsman->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($herdsman->updated) ?></td>
        </tr>
    </table>
</div>
