<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Children $children
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Children'), ['action' => 'edit', $children->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Children'), ['action' => 'delete', $children->id], ['confirm' => __('Are you sure you want to delete # {0}?', $children->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Childrens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Children'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="childrens view large-9 medium-8 columns content">
    <h3><?= h($children->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($children->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($children->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($children->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel') ?></th>
            <td><?= h($children->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($children->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($children->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($children->longitude) ?></td>
        </tr>
    </table>
</div>
