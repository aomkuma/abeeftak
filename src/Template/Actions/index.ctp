<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Action[]|\Cake\Collection\CollectionInterface $actions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Action'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Controllers'), ['controller' => 'Controllers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Controller'), ['controller' => 'Controllers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Role Accesses'), ['controller' => 'RoleAccesses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role Access'), ['controller' => 'RoleAccesses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2">
        <h3><?= __('Actions') ?></h3>
        <table class="table">
            <thead>
                <tr>

                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('controller_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('description') ?></th>

                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actions as $action): ?>
                    <tr>

                        <td><?= h($action->name) ?></td>
                        <td><?= h($action->value) ?></td>
                        <td><?= $action->has('controller') ? $this->Html->link($action->controller->name, ['controller' => 'Controllers', 'action' => 'view', $action->controller->id]) : '' ?></td>
                        <td><?= h($action->description) ?></td>

                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $action->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $action->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $action->id], ['confirm' => __('Are you sure you want to delete # {0}?', $action->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>
</div>