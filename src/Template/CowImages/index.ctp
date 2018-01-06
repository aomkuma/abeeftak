<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CowImage[]|\Cake\Collection\CollectionInterface $cowImages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cow Image'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cowImages index large-9 medium-8 columns content">
    <h3><?= __('Cow Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cow_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cowImages as $cowImage): ?>
            <tr>
                <td><?= h($cowImage->id) ?></td>
                <td><?= $cowImage->has('cow') ? $this->Html->link($cowImage->cow->id, ['controller' => 'Cows', 'action' => 'view', $cowImage->cow->id]) : '' ?></td>
                <td><?= $cowImage->has('image') ? $this->Html->link($cowImage->image->name, ['controller' => 'Images', 'action' => 'view', $cowImage->image->id]) : '' ?></td>
                <td><?= h($cowImage->created) ?></td>
                <td><?= h($cowImage->createdby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cowImage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cowImage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cowImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cowImage->id)]) ?>
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
