<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Action $action
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Action'), ['action' => 'edit', $action->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Action'), ['action' => 'delete', $action->id], ['confirm' => __('Are you sure you want to delete # {0}?', $action->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Actions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Action'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Controllers'), ['controller' => 'Controllers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Controller'), ['controller' => 'Controllers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Role Accesses'), ['controller' => 'RoleAccesses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role Access'), ['controller' => 'RoleAccesses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="actions view large-9 medium-8 columns content">
    <h3><?= h($action->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($action->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($action->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($action->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Controller') ?></th>
            <td><?= $action->has('controller') ? $this->Html->link($action->controller->name, ['controller' => 'Controllers', 'action' => 'view', $action->controller->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($action->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($action->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($action->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($action->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($action->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Role Accesses') ?></h4>
        <?php if (!empty($action->role_accesses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Action Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($action->role_accesses as $roleAccesses): ?>
            <tr>
                <td><?= h($roleAccesses->id) ?></td>
                <td><?= h($roleAccesses->role_id) ?></td>
                <td><?= h($roleAccesses->action_id) ?></td>
                <td><?= h($roleAccesses->created) ?></td>
                <td><?= h($roleAccesses->createdby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RoleAccesses', 'action' => 'view', $roleAccesses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RoleAccesses', 'action' => 'edit', $roleAccesses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RoleAccesses', 'action' => 'delete', $roleAccesses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleAccesses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
