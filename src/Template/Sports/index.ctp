<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sport[]|\Cake\Collection\CollectionInterface $sports
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sport'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sports index large-9 medium-8 columns content">
    <h3><?= __('Sports') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sports as $sport): ?>
            <tr>
                <td><?= $this->Number->format($sport->id) ?></td>
                <td><?= h($sport->name) ?></td>
                <td><?= h($sport->address) ?></td>
                <td><?= $this->Number->format($sport->longitude) ?></td>
                <td><?= $this->Number->format($sport->latitude) ?></td>
                <td><?= h($sport->tel) ?></td>
                <td><?= h($sport->url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sport->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sport->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sport->id)]) ?>
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
