<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GrowthRecord $growthRecord
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Growth Records'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="growthRecords form large-9 medium-8 columns content">
    <?= $this->Form->create($growthRecord) ?>
    <fieldset>
        <legend><?= __('Add Growth Record') ?></legend>
        <?php
            echo $this->Form->control('type');
            echo $this->Form->control('record_date', ['empty' => true]);
            echo $this->Form->control('age');
            echo $this->Form->control('weight');
            echo $this->Form->control('chest');
            echo $this->Form->control('height');
            echo $this->Form->control('length');
            echo $this->Form->control('growth_stat');
            echo $this->Form->control('food_type');
            echo $this->Form->control('total_eating');
            echo $this->Form->control('description');
            echo $this->Form->control('createdby');
            echo $this->Form->control('updatedby');
            echo $this->Form->control('cow_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
