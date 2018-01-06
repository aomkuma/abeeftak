<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address[]|\Cake\Collection\CollectionInterface $addresses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Address'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Farms'), ['controller' => 'Farms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Farm'), ['controller' => 'Farms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Herdsmans'), ['controller' => 'Herdsmans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Herdsman'), ['controller' => 'Herdsmans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addresses index large-9 medium-8 columns content">
    <h3><?= __('Addresses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_line') ?></th>
                <th scope="col"><?= $this->Paginator->sort('houseno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('villageno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('villagename') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subdistrict') ?></th>
                <th scope="col"><?= $this->Paginator->sort('district') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postalcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($addresses as $address): ?>
            <tr>
                <td><?= h($address->id) ?></td>
                <td><?= h($address->address_line) ?></td>
                <td><?= h($address->houseno) ?></td>
                <td><?= h($address->villageno) ?></td>
                <td><?= h($address->villagename) ?></td>
                <td><?= h($address->subdistrict) ?></td>
                <td><?= h($address->district) ?></td>
                <td><?= h($address->province_id) ?></td>
                <td><?= h($address->postalcode) ?></td>
                <td><?= h($address->description) ?></td>
                <td><?= h($address->created) ?></td>
                <td><?= h($address->createdby) ?></td>
                <td><?= h($address->updated) ?></td>
                <td><?= h($address->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $address->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $address->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?>
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
