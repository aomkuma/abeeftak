<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BreedingRecord $breedingRecord
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $breedingRecord->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $breedingRecord->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Breeding Records'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="breedingRecords form large-9 medium-8 columns content">
    <?= $this->Form->create($breedingRecord) ?>
    <fieldset>
        <legend><?= __('Edit Breeding Record') ?></legend>
        <?php
            echo $this->Form->control('breeding_date');
            echo $this->Form->control('mother_code');
            echo $this->Form->control('createdby');
            echo $this->Form->control('updatedby');
            echo $this->Form->control('cow_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
