<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cow[]|\Cake\Collection\CollectionInterface $cows
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cow '), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cow Breeds'), ['controller' => 'CowBreeds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow Breed'), ['controller' => 'CowBreeds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cow Images'), ['controller' => 'CowImages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow Image'), ['controller' => 'CowImages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movement Records'), ['controller' => 'MovementRecords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movement Record'), ['controller' => 'MovementRecords', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatment Records'), ['controller' => 'TreatmentRecords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment Record'), ['controller' => 'TreatmentRecords', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cows index large-9 medium-8 columns content">
    <h3><?= __('Cows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('birthday') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isbreeder') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cow_breed_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('breeding') ?></th>
                <th scope="col"><?= $this->Paginator->sort('father_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mother_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('origins') ?></th>
                <th scope="col"><?= $this->Paginator->sort('import_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cows as $cow): ?>
            <tr>
                <td><?= h($cow->id) ?></td>
                <td><?= h($cow->code) ?></td>
                <td><?= h($cow->grade) ?></td>
                <td><?= h($cow->birthday) ?></td>
                <td><?= h($cow->gender) ?></td>
                <td><?= h($cow->isbreeder) ?></td>
                <td><?= $cow->has('cow_breed') ? $this->Html->link($cow->cow_breed->name, ['controller' => 'CowBreeds', 'action' => 'view', $cow->cow_breed->id]) : '' ?></td>
                <td><?= h($cow->breeding) ?></td>
                <td><?= h($cow->father_code) ?></td>
                <td><?= h($cow->mother_code) ?></td>
                <td><?= h($cow->origins) ?></td>
                <td><?= h($cow->import_date) ?></td>
                <td><?= h($cow->description) ?></td>
                <td><?= h($cow->created) ?></td>
                <td><?= h($cow->createdby) ?></td>
                <td><?= h($cow->updated) ?></td>
                <td><?= h($cow->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cow->id)]) ?>
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
