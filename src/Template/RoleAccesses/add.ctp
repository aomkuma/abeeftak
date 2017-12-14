<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoleAccess $roleAccess
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Role Accesses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="roleAccesses form large-9 medium-8 columns content">
    <?= $this->Form->create($roleAccess) ?>
    <fieldset>
        <legend><?= __('Add Role Access') ?></legend>
        <?php
        echo $this->Form->control('role_id', ['options' => $roles]);
       
       
        foreach ($actions as $controller):
            $actionObjs = $controller['actions'];
            echo $controller['name'];
            foreach ($actionObjs as $action):
                echo $this->Form->checkbox('action[].action_id', array(
                    'label' => false,
                    
                    'value'=>$action['id']
                   
                ));
            echo $action['name'];
            endforeach;
            echo '<br/>';
        endforeach;

        echo $this->Form->control('createdby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
