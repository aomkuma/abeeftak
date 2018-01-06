<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CowBreed[]|\Cake\Collection\CollectionInterface $cowBreeds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cow Breed'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cowBreeds index large-9 medium-8 columns content">
    <h3><?= __('Cow Breeds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cowBreeds as $cowBreed): ?>
            <tr>
                <td><?= h($cowBreed->id) ?></td>
                <td><?= h($cowBreed->name) ?></td>
                <td><?= h($cowBreed->created) ?></td>
                <td><?= h($cowBreed->createdby) ?></td>
                <td><?= h($cowBreed->updated) ?></td>
                <td><?= h($cowBreed->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cowBreed->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cowBreed->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cowBreed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cowBreed->id)]) ?>
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
