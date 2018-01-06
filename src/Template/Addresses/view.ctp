<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Farms'), ['controller' => 'Farms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Farm'), ['controller' => 'Farms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Herdsmans'), ['controller' => 'Herdsmans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Herdsman'), ['controller' => 'Herdsmans', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="addresses view large-9 medium-8 columns content">
    <h3><?= h($address->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($address->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Line') ?></th>
            <td><?= h($address->address_line) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Houseno') ?></th>
            <td><?= h($address->houseno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Villageno') ?></th>
            <td><?= h($address->villageno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Villagename') ?></th>
            <td><?= h($address->villagename) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subdistrict') ?></th>
            <td><?= h($address->subdistrict) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('District') ?></th>
            <td><?= h($address->district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province Id') ?></th>
            <td><?= h($address->province_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postalcode') ?></th>
            <td><?= h($address->postalcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($address->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($address->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($address->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($address->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($address->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Farms') ?></h4>
        <?php if (!empty($address->farms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Level') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Address Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Location Image') ?></th>
                <th scope="col"><?= __('Latitude') ?></th>
                <th scope="col"><?= __('Longitude') ?></th>
                <th scope="col"><?= __('Hasstable') ?></th>
                <th scope="col"><?= __('Total Stable') ?></th>
                <th scope="col"><?= __('Total Cow Capacity') ?></th>
                <th scope="col"><?= __('Hasmeadow') ?></th>
                <th scope="col"><?= __('Total Meadow') ?></th>
                <th scope="col"><?= __('Total Space') ?></th>
                <th scope="col"><?= __('Grass Species') ?></th>
                <th scope="col"><?= __('Water Body') ?></th>
                <th scope="col"><?= __('Dung Destroy') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('Updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($address->farms as $farms): ?>
            <tr>
                <td><?= h($farms->id) ?></td>
                <td><?= h($farms->name) ?></td>
                <td><?= h($farms->level) ?></td>
                <td><?= h($farms->type) ?></td>
                <td><?= h($farms->address_id) ?></td>
                <td><?= h($farms->description) ?></td>
                <td><?= h($farms->location_image) ?></td>
                <td><?= h($farms->latitude) ?></td>
                <td><?= h($farms->longitude) ?></td>
                <td><?= h($farms->hasstable) ?></td>
                <td><?= h($farms->total_stable) ?></td>
                <td><?= h($farms->total_cow_capacity) ?></td>
                <td><?= h($farms->hasmeadow) ?></td>
                <td><?= h($farms->total_meadow) ?></td>
                <td><?= h($farms->total_space) ?></td>
                <td><?= h($farms->grass_species) ?></td>
                <td><?= h($farms->water_body) ?></td>
                <td><?= h($farms->dung_destroy) ?></td>
                <td><?= h($farms->created) ?></td>
                <td><?= h($farms->createdby) ?></td>
                <td><?= h($farms->updated) ?></td>
                <td><?= h($farms->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Farms', 'action' => 'view', $farms->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Farms', 'action' => 'edit', $farms->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Farms', 'action' => 'delete', $farms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $farms->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Herdsmans') ?></h4>
        <?php if (!empty($address->herdsmans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Lastname') ?></th>
                <th scope="col"><?= __('Idcard') ?></th>
                <th scope="col"><?= __('Birthday') ?></th>
                <th scope="col"><?= __('Registerdate') ?></th>
                <th scope="col"><?= __('Isactive') ?></th>
                <th scope="col"><?= __('Address Id') ?></th>
                <th scope="col"><?= __('Mobile') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('Updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($address->herdsmans as $herdsmans): ?>
            <tr>
                <td><?= h($herdsmans->id) ?></td>
                <td><?= h($herdsmans->code) ?></td>
                <td><?= h($herdsmans->title) ?></td>
                <td><?= h($herdsmans->firstname) ?></td>
                <td><?= h($herdsmans->lastname) ?></td>
                <td><?= h($herdsmans->idcard) ?></td>
                <td><?= h($herdsmans->birthday) ?></td>
                <td><?= h($herdsmans->registerdate) ?></td>
                <td><?= h($herdsmans->isactive) ?></td>
                <td><?= h($herdsmans->address_id) ?></td>
                <td><?= h($herdsmans->mobile) ?></td>
                <td><?= h($herdsmans->email) ?></td>
                <td><?= h($herdsmans->description) ?></td>
                <td><?= h($herdsmans->created) ?></td>
                <td><?= h($herdsmans->createdby) ?></td>
                <td><?= h($herdsmans->updated) ?></td>
                <td><?= h($herdsmans->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Herdsmans', 'action' => 'view', $herdsmans->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Herdsmans', 'action' => 'edit', $herdsmans->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Herdsmans', 'action' => 'delete', $herdsmans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $herdsmans->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
