<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cow $cow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cows'), ['action' => 'index']) ?></li>
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
<div class="cows form large-9 medium-8 columns content">
    <?= $this->Form->create($cow) ?>
    <fieldset>
        <legend><?= __('Add Cow') ?></legend>
        <?php
            echo $this->Form->control('code');
            echo $this->Form->control('grade');
            echo $this->Form->control('birthday');
            echo $this->Form->control('gender');
            echo $this->Form->control('isbreeder');
            echo $this->Form->control('cow_breed_id', ['options' => $cowBreeds]);
            echo $this->Form->control('breeding');
            echo $this->Form->control('father_code');
            echo $this->Form->control('mother_code');
            echo $this->Form->control('origins');
            echo $this->Form->control('import_date', ['empty' => true]);
            echo $this->Form->control('description');
            echo $this->Form->control('createdby');
            echo $this->Form->control('updatedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
