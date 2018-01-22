<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FarmHerdsman $farmHerdsman
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Farm Herdsmans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Farms'), ['controller' => 'Farms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Farm'), ['controller' => 'Farms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="farmHerdsmans form large-9 medium-8 columns content">
    <?= $this->Form->create($farmHerdsman) ?>
    <fieldset>
        <legend><?= __('Add Farm Herdsman') ?></legend>
        <?php
            echo $this->Form->control('farm_id', ['options' => $farms]);
            echo $this->Form->control('herdsman_id');
            echo $this->Form->control('description');
            echo $this->Form->control('seq');
            echo $this->Form->control('createdby');
            echo $this->Form->control('updatedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
