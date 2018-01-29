<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FarmCow $farmCow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Farm Cows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Farms'), ['controller' => 'Farms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Farm'), ['controller' => 'Farms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="farmCows form large-9 medium-8 columns content">
    <?= $this->Form->create($farmCow) ?>
    <fieldset>
        <legend><?= __('Add Farm Cow') ?></legend>
        <?php
            echo $this->Form->control('farm_id', ['options' => $farms]);
            echo $this->Form->control('cow_id', ['options' => $cows]);
            echo $this->Form->control('seq');
            echo $this->Form->control('description');
            echo $this->Form->control('createdby');
            echo $this->Form->control('updatedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
