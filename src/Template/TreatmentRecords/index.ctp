<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TreatmentRecord[]|\Cake\Collection\CollectionInterface $treatmentRecords
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Treatment Record'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatmentRecords index large-9 medium-8 columns content">
    <h3><?= __('Treatment Records') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cow_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('treatment_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('disease') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drug_used') ?></th>
                <th scope="col"><?= $this->Paginator->sort('conservator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($treatmentRecords as $treatmentRecord): ?>
            <tr>
                <td><?= h($treatmentRecord->id) ?></td>
                <td><?= $treatmentRecord->has('cow') ? $this->Html->link($treatmentRecord->cow->id, ['controller' => 'Cows', 'action' => 'view', $treatmentRecord->cow->id]) : '' ?></td>
                <td><?= h($treatmentRecord->treatment_date) ?></td>
                <td><?= h($treatmentRecord->disease) ?></td>
                <td><?= h($treatmentRecord->drug_used) ?></td>
                <td><?= h($treatmentRecord->conservator) ?></td>
                <td><?= h($treatmentRecord->description) ?></td>
                <td><?= h($treatmentRecord->created) ?></td>
                <td><?= h($treatmentRecord->createdby) ?></td>
                <td><?= h($treatmentRecord->updated) ?></td>
                <td><?= h($treatmentRecord->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $treatmentRecord->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $treatmentRecord->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $treatmentRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRecord->id)]) ?>
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
