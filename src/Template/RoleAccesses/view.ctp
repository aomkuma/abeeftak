<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoleAccess $roleAccess
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Role Access'), ['action' => 'edit', $roleAccess->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Role Access'), ['action' => 'delete', $roleAccess->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleAccess->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Role Accesses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role Access'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roleAccesses view large-9 medium-8 columns content">
    <h3><?= h($roleAccess->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($roleAccess->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $roleAccess->has('role') ? $this->Html->link($roleAccess->role->name, ['controller' => 'Roles', 'action' => 'view', $roleAccess->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= $roleAccess->has('action') ? $this->Html->link($roleAccess->action->name, ['controller' => 'Actions', 'action' => 'view', $roleAccess->action->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($roleAccess->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($roleAccess->created) ?></td>
        </tr>
    </table>
</div>
