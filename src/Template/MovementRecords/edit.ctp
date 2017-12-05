<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovementRecord $movementRecord
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $movementRecord->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $movementRecord->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Movement Records'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movementRecords form large-9 medium-8 columns content">
    <?= $this->Form->create($movementRecord) ?>
    <fieldset>
        <legend><?= __('Edit Movement Record') ?></legend>
        <?php
            echo $this->Form->control('cow_id', ['options' => $cows]);
            echo $this->Form->control('departure');
            echo $this->Form->control('destination');
            echo $this->Form->control('movement_date');
            echo $this->Form->control('description');
            echo $this->Form->control('createdby');
            echo $this->Form->control('updatedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
