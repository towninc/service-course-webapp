<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medicine $medicine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Medicines'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="medicines form large-9 medium-8 columns content">
    <?= $this->Form->create($medicine) ?>
    <fieldset>
        <legend><?= __('Add Medicine') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('location');
            echo $this->Form->control('latitude');
            echo $this->Form->control('longitude');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
