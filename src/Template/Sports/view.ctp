<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sport $sport
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sport'), ['action' => 'edit', $sport->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sport'), ['action' => 'delete', $sport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sport->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sports'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sport'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sports view large-9 medium-8 columns content">
    <h3><?= h($sport->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($sport->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($sport->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel') ?></th>
            <td><?= h($sport->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($sport->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sport->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($sport->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($sport->latitude) ?></td>
        </tr>
    </table>
</div>
