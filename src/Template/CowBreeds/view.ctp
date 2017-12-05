<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CowBreed $cowBreed
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cow Breed'), ['action' => 'edit', $cowBreed->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cow Breed'), ['action' => 'delete', $cowBreed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cowBreed->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cow Breeds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cow Breed'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cowBreeds view large-9 medium-8 columns content">
    <h3><?= h($cowBreed->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($cowBreed->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($cowBreed->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($cowBreed->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($cowBreed->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cowBreed->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($cowBreed->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cows') ?></h4>
        <?php if (!empty($cowBreed->cows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Grade') ?></th>
                <th scope="col"><?= __('Birthday') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Isbreeder') ?></th>
                <th scope="col"><?= __('Cow Breed Id') ?></th>
                <th scope="col"><?= __('Breeding') ?></th>
                <th scope="col"><?= __('Father Code') ?></th>
                <th scope="col"><?= __('Mother Code') ?></th>
                <th scope="col"><?= __('Origins') ?></th>
                <th scope="col"><?= __('Import Date') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('Updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cowBreed->cows as $cows): ?>
            <tr>
                <td><?= h($cows->id) ?></td>
                <td><?= h($cows->code) ?></td>
                <td><?= h($cows->grade) ?></td>
                <td><?= h($cows->birthday) ?></td>
                <td><?= h($cows->gender) ?></td>
                <td><?= h($cows->isbreeder) ?></td>
                <td><?= h($cows->cow_breed_id) ?></td>
                <td><?= h($cows->breeding) ?></td>
                <td><?= h($cows->father_code) ?></td>
                <td><?= h($cows->mother_code) ?></td>
                <td><?= h($cows->origins) ?></td>
                <td><?= h($cows->import_date) ?></td>
                <td><?= h($cows->description) ?></td>
                <td><?= h($cows->created) ?></td>
                <td><?= h($cows->createdby) ?></td>
                <td><?= h($cows->updated) ?></td>
                <td><?= h($cows->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cows', 'action' => 'view', $cows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cows', 'action' => 'edit', $cows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cows', 'action' => 'delete', $cows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
