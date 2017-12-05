<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Herdsman[]|\Cake\Collection\CollectionInterface $herdsmans
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Herdsman'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="herdsmans index large-9 medium-8 columns content">
    <h3><?= __('Herdsmans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idcard') ?></th>
                <th scope="col"><?= $this->Paginator->sort('birthday') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registerdate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isactive') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($herdsmans as $herdsman): ?>
            <tr>
                <td><?= h($herdsman->id) ?></td>
                <td><?= h($herdsman->code) ?></td>
                <td><?= h($herdsman->title) ?></td>
                <td><?= h($herdsman->firstname) ?></td>
                <td><?= h($herdsman->lastname) ?></td>
                <td><?= h($herdsman->idcard) ?></td>
                <td><?= h($herdsman->birthday) ?></td>
                <td><?= h($herdsman->registerdate) ?></td>
                <td><?= h($herdsman->isactive) ?></td>
                <td><?= $herdsman->has('address') ? $this->Html->link($herdsman->address->id, ['controller' => 'Addresses', 'action' => 'view', $herdsman->address->id]) : '' ?></td>
                <td><?= h($herdsman->mobile) ?></td>
                <td><?= h($herdsman->email) ?></td>
                <td><?= h($herdsman->description) ?></td>
                <td><?= h($herdsman->created) ?></td>
                <td><?= h($herdsman->createdby) ?></td>
                <td><?= h($herdsman->updated) ?></td>
                <td><?= h($herdsman->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $herdsman->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $herdsman->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $herdsman->id], ['confirm' => __('Are you sure you want to delete # {0}?', $herdsman->id)]) ?>
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
