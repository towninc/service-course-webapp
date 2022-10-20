<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cherry[]|\Cake\Collection\CollectionInterface $cherrys
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cherry'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cherrys index large-9 medium-8 columns content">
    <h3><?= __('Cherrys') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('yomi_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pref') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lng') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cherrys as $cherry): ?>
            <tr>
                <td><?= $this->Number->format($cherry->id) ?></td>
                <td><?= h($cherry->name) ?></td>
                <td><?= h($cherry->yomi_name) ?></td>
                <td><?= h($cherry->pref) ?></td>
                <td><?= h($cherry->city) ?></td>
                <td><?= $this->Number->format($cherry->lat) ?></td>
                <td><?= $this->Number->format($cherry->lng) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cherry->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cherry->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cherry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cherry->id)]) ?>
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
