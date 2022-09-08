<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicycle $bicycle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bicycle'), ['action' => 'edit', $bicycle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bicycle'), ['action' => 'delete', $bicycle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bicycle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bicycles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bicycle'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bicycles view large-9 medium-8 columns content">
    <h3><?= h($bicycle->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($bicycle->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($bicycle->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Utilization Time') ?></th>
            <td><?= h($bicycle->utilization_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price Per Day') ?></th>
            <td><?= h($bicycle->price_per_day) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Number') ?></th>
            <td><?= h($bicycle->phone_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($bicycle->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bicycle->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($bicycle->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($bicycle->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Capacity') ?></th>
            <td><?= $this->Number->format($bicycle->capacity) ?></td>
        </tr>
    </table>
</div>
