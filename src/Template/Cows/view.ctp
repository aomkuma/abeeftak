<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cow $cow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cow'), ['action' => 'edit', $cow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cow'), ['action' => 'delete', $cow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cow'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cow Breeds'), ['controller' => 'CowBreeds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cow Breed'), ['controller' => 'CowBreeds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cow Images'), ['controller' => 'CowImages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cow Image'), ['controller' => 'CowImages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movement Records'), ['controller' => 'MovementRecords', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movement Record'), ['controller' => 'MovementRecords', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatment Records'), ['controller' => 'TreatmentRecords', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment Record'), ['controller' => 'TreatmentRecords', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cows view large-9 medium-8 columns content">
    <h3><?= h($cow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($cow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($cow->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grade') ?></th>
            <td><?= h($cow->grade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($cow->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isbreeder') ?></th>
            <td><?= h($cow->isbreeder) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cow Breed') ?></th>
            <td><?= $cow->has('cow_breed') ? $this->Html->link($cow->cow_breed->name, ['controller' => 'CowBreeds', 'action' => 'view', $cow->cow_breed->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Breeding') ?></th>
            <td><?= h($cow->breeding) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Father Code') ?></th>
            <td><?= h($cow->father_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mother Code') ?></th>
            <td><?= h($cow->mother_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Origins') ?></th>
            <td><?= h($cow->origins) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($cow->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($cow->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($cow->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthday') ?></th>
            <td><?= h($cow->birthday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Import Date') ?></th>
            <td><?= h($cow->import_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cow->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($cow->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cow Images') ?></h4>
        <?php if (!empty($cow->cow_images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cow Id') ?></th>
                <th scope="col"><?= __('Image Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cow->cow_images as $cowImages): ?>
            <tr>
                <td><?= h($cowImages->id) ?></td>
                <td><?= h($cowImages->cow_id) ?></td>
                <td><?= h($cowImages->image_id) ?></td>
                <td><?= h($cowImages->created) ?></td>
                <td><?= h($cowImages->createdby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CowImages', 'action' => 'view', $cowImages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CowImages', 'action' => 'edit', $cowImages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CowImages', 'action' => 'delete', $cowImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cowImages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Movement Records') ?></h4>
        <?php if (!empty($cow->movement_records)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cow Id') ?></th>
                <th scope="col"><?= __('Departure') ?></th>
                <th scope="col"><?= __('Destination') ?></th>
                <th scope="col"><?= __('Movement Date') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('Updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cow->movement_records as $movementRecords): ?>
            <tr>
                <td><?= h($movementRecords->id) ?></td>
                <td><?= h($movementRecords->cow_id) ?></td>
                <td><?= h($movementRecords->departure) ?></td>
                <td><?= h($movementRecords->destination) ?></td>
                <td><?= h($movementRecords->movement_date) ?></td>
                <td><?= h($movementRecords->description) ?></td>
                <td><?= h($movementRecords->created) ?></td>
                <td><?= h($movementRecords->createdby) ?></td>
                <td><?= h($movementRecords->updated) ?></td>
                <td><?= h($movementRecords->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MovementRecords', 'action' => 'view', $movementRecords->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MovementRecords', 'action' => 'edit', $movementRecords->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MovementRecords', 'action' => 'delete', $movementRecords->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movementRecords->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Treatment Records') ?></h4>
        <?php if (!empty($cow->treatment_records)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cow Id') ?></th>
                <th scope="col"><?= __('Treatment Date') ?></th>
                <th scope="col"><?= __('Disease') ?></th>
                <th scope="col"><?= __('Drug Used') ?></th>
                <th scope="col"><?= __('Conservator') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('Updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cow->treatment_records as $treatmentRecords): ?>
            <tr>
                <td><?= h($treatmentRecords->id) ?></td>
                <td><?= h($treatmentRecords->cow_id) ?></td>
                <td><?= h($treatmentRecords->treatment_date) ?></td>
                <td><?= h($treatmentRecords->disease) ?></td>
                <td><?= h($treatmentRecords->drug_used) ?></td>
                <td><?= h($treatmentRecords->conservator) ?></td>
                <td><?= h($treatmentRecords->description) ?></td>
                <td><?= h($treatmentRecords->created) ?></td>
                <td><?= h($treatmentRecords->createdby) ?></td>
                <td><?= h($treatmentRecords->updated) ?></td>
                <td><?= h($treatmentRecords->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TreatmentRecords', 'action' => 'view', $treatmentRecords->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TreatmentRecords', 'action' => 'edit', $treatmentRecords->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TreatmentRecords', 'action' => 'delete', $treatmentRecords->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRecords->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
