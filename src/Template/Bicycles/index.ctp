<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicycle[]|\Cake\Collection\CollectionInterface $bicycles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bicycle'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bicycles index large-9 medium-8 columns content">
    <h3><?= __('Bicycles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('utilization_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price_per_day') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('capacity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bicycles as $bicycle): ?>
            <tr>
                <td><?= $this->Number->format($bicycle->id) ?></td>
                <td><?= h($bicycle->name) ?></td>
                <td><?= h($bicycle->location) ?></td>
                <td><?= $this->Number->format($bicycle->latitude) ?></td>
                <td><?= $this->Number->format($bicycle->longitude) ?></td>
                <td><?= h($bicycle->utilization_time) ?></td>
                <td><?= h($bicycle->price_per_day) ?></td>
                <td><?= h($bicycle->phone_number) ?></td>
                <td><?= $this->Number->format($bicycle->capacity) ?></td>
                <td><?= h($bicycle->url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bicycle->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bicycle->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bicycle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bicycle->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
