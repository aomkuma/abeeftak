<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Running $running
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $running->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $running->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Runnings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="runnings form large-9 medium-8 columns content">
    <?= $this->Form->create($running) ?>
    <fieldset>
        <legend><?= __('Edit Running') ?></legend>
        <?php
            echo $this->Form->control('running_code');
            echo $this->Form->control('running_no');
            echo $this->Form->control('runnubg_date');
            echo $this->Form->control('running_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
