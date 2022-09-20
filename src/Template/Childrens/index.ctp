<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Children[]|\Cake\Collection\CollectionInterface $childrens
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Children'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="childrens index large-9 medium-8 columns content">
    <h3><?= __('Childrens') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($childrens as $children): ?>
            <tr>
                <td><?= $this->Number->format($children->id) ?></td>
                <td><?= h($children->name) ?></td>
                <td><?= h($children->address) ?></td>
                <td><?= h($children->url) ?></td>
                <td><?= h($children->tel) ?></td>
                <td><?= $this->Number->format($children->latitude) ?></td>
                <td><?= $this->Number->format($children->longitude) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $children->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $children->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $children->id], ['confirm' => __('Are you sure you want to delete # {0}?', $children->id)]) ?>
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
