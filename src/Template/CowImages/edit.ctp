<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CowImage $cowImage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cowImage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cowImage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cow Images'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cowImages form large-9 medium-8 columns content">
    <?= $this->Form->create($cowImage) ?>
    <fieldset>
        <legend><?= __('Edit Cow Image') ?></legend>
        <?php
            echo $this->Form->control('cow_id', ['options' => $cows]);
            echo $this->Form->control('image_id', ['options' => $images]);
            echo $this->Form->control('createdby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
