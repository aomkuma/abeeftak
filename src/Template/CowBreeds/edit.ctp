<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CowBreed $cowBreed
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cowBreed->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cowBreed->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cow Breeds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cows'), ['controller' => 'Cows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cow'), ['controller' => 'Cows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cowBreeds form large-9 medium-8 columns content">
    <?= $this->Form->create($cowBreed) ?>
    <fieldset>
        <legend><?= __('Edit Cow Breed') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('createdby');
            echo $this->Form->control('updatedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
