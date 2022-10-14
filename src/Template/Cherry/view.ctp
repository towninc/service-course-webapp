<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cherry $cherry
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cherry'), ['action' => 'edit', $cherry->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cherry'), ['action' => 'delete', $cherry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cherry->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cherry'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cherry'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cherry view large-9 medium-8 columns content">
    <h3><?= h($cherry->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($cherry->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Yomi Name') ?></th>
            <td><?= h($cherry->yomi_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pref') ?></th>
            <td><?= h($cherry->pref) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($cherry->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cherry->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($cherry->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Long') ?></th>
            <td><?= $this->Number->format($cherry->long) ?></td>
        </tr>
    </table>
</div>
