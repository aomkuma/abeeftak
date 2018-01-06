<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Controller $controller
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Controller'), ['action' => 'edit', $controller->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Controller'), ['action' => 'delete', $controller->id], ['confirm' => __('Are you sure you want to delete # {0}?', $controller->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Controllers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Controller'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="controllers view large-9 medium-8 columns content">
    <h3><?= h($controller->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($controller->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($controller->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($controller->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($controller->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($controller->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($controller->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($controller->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($controller->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Actions') ?></h4>
        <?php if (!empty($controller->actions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Controller Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('Updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($controller->actions as $actions): ?>
            <tr>
                <td><?= h($actions->id) ?></td>
                <td><?= h($actions->name) ?></td>
                <td><?= h($actions->value) ?></td>
                <td><?= h($actions->controller_id) ?></td>
                <td><?= h($actions->description) ?></td>
                <td><?= h($actions->created) ?></td>
                <td><?= h($actions->createdby) ?></td>
                <td><?= h($actions->updated) ?></td>
                <td><?= h($actions->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Actions', 'action' => 'view', $actions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Actions', 'action' => 'edit', $actions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Actions', 'action' => 'delete', $actions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
