<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medicine[]|\Cake\Collection\CollectionInterface $medicines
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Medicine'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="medicines index large-9 medium-8 columns content">
    <h3><?= __('Medicines') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medicines as $medicine): ?>
            <tr>
                <td><?= $this->Number->format($medicine->id) ?></td>
                <td><?= h($medicine->name) ?></td>
                <td><?= h($medicine->location) ?></td>
                <td><?= $this->Number->format($medicine->latitude) ?></td>
                <td><?= $this->Number->format($medicine->longitude) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $medicine->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $medicine->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $medicine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicine->id)]) ?>
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
