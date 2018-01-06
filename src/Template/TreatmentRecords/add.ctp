<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TreatmentRecord $treatmentRecord
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Treatment Records'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatmentRecords form large-9 medium-8 columns content">
    <?= $this->Form->create($treatmentRecord) ?>
    <fieldset>
        <legend><?= __('Add Treatment Record') ?></legend>
        <?php
            echo $this->Form->control('cow_id', ['options' => $cows]);
            echo $this->Form->control('treatment_date');
            echo $this->Form->control('disease');
            echo $this->Form->control('drug_used');
            echo $this->Form->control('conservator');
            echo $this->Form->control('description');
            echo $this->Form->control('createdby');
            echo $this->Form->control('updatedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
