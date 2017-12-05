<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TreatmentRecord $treatmentRecord
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Treatment Record'), ['action' => 'edit', $treatmentRecord->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Treatment Record'), ['action' => 'delete', $treatmentRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRecord->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Treatment Records'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment Record'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="treatmentRecords view large-9 medium-8 columns content">
    <h3><?= h($treatmentRecord->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($treatmentRecord->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cow') ?></th>
            <td><?= $treatmentRecord->has('cow') ? $this->Html->link($treatmentRecord->cow->id, ['controller' => 'Cows', 'action' => 'view', $treatmentRecord->cow->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disease') ?></th>
            <td><?= h($treatmentRecord->disease) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Used') ?></th>
            <td><?= h($treatmentRecord->drug_used) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conservator') ?></th>
            <td><?= h($treatmentRecord->conservator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($treatmentRecord->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($treatmentRecord->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($treatmentRecord->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Treatment Date') ?></th>
            <td><?= h($treatmentRecord->treatment_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($treatmentRecord->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($treatmentRecord->updated) ?></td>
        </tr>
    </table>
</div>
