<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoleAccess[]|\Cake\Collection\CollectionInterface $roleAccesses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Role Access'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2">
        <h3><?= __('Role Accesses') ?></h3>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('action_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roleAccesses as $roleAccess): ?>
                    <tr>
                        <td><?= h($roleAccess->id) ?></td>
                        <td><?= $roleAccess->has('role') ? $this->Html->link($roleAccess->role->name, ['controller' => 'Roles', 'action' => 'view', $roleAccess->role->id]) : '' ?></td>
                        <td><?= $roleAccess->has('action') ? $this->Html->link($roleAccess->action->name, ['controller' => 'Actions', 'action' => 'view', $roleAccess->action->id]) : '' ?></td>
                        <td><?= h($roleAccess->created) ?></td>
                        <td><?= h($roleAccess->createdby) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $roleAccess->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $roleAccess->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $roleAccess->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleAccess->id)]) ?>
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
