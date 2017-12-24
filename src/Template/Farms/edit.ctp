<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farm $farm
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $farm->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $farm->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Farms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="farms form large-9 medium-8 columns content">
    <?= $this->Form->create($farm) ?>
    <fieldset>
        <legend><?= __('Edit Farm') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('level');
            echo $this->Form->control('type');
            echo $this->Form->control('address_id', ['options' => $addresses, 'empty' => true]);
            echo $this->Form->control('description');
            echo $this->Form->control('location_image');
            echo $this->Form->control('latitude');
            echo $this->Form->control('longitude');
            echo $this->Form->control('hasstable');
            echo $this->Form->control('total_stable');
            echo $this->Form->control('total_cow_capacity');
            echo $this->Form->control('hasmeadow');
            echo $this->Form->control('total_meadow');
            echo $this->Form->control('total_space');
            echo $this->Form->control('grass_species');
            echo $this->Form->control('water_body');
            echo $this->Form->control('dung_destroy');
            echo $this->Form->control('createdby');
            echo $this->Form->control('updatedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
