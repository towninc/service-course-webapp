<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicycle $bicycle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bicycle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bicycle->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bicycles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bicycles form large-9 medium-8 columns content">
    <?= $this->Form->create($bicycle) ?>
    <fieldset>
        <legend><?= __('Edit Bicycle') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('location');
            echo $this->Form->control('latitude');
            echo $this->Form->control('longitude');
            echo $this->Form->control('utilization_time');
            echo $this->Form->control('price_per_day');
            echo $this->Form->control('phone_number');
            echo $this->Form->control('capacity');
            echo $this->Form->control('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
