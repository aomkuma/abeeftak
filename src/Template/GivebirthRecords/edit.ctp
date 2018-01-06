<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GivebirthRecord $givebirthRecord
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $givebirthRecord->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $givebirthRecord->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Givebirth Records'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="givebirthRecords form large-9 medium-8 columns content">
    <?= $this->Form->create($givebirthRecord) ?>
    <fieldset>
        <legend><?= __('Edit Givebirth Record') ?></legend>
        <?php
            echo $this->Form->control('breeding_date');
            echo $this->Form->control('father_code');
            echo $this->Form->control('authorities');
            echo $this->Form->control('breeding_status');
            echo $this->Form->control('createdby');
            echo $this->Form->control('updatedby');
            echo $this->Form->control('cow_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
