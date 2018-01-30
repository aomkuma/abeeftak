<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grass $grass
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $grass->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $grass->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Grasses'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="grasses form large-9 medium-8 columns content">
    <?= $this->Form->create($grass) ?>
    <fieldset>
        <legend><?= __('Edit Grass') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('updatedby');
            echo $this->Form->control('createdby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
