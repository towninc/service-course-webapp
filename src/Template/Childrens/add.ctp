<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Children $children
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Childrens'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="childrens form large-9 medium-8 columns content">
    <?= $this->Form->create($children) ?>
    <fieldset>
        <legend><?= __('Add Children') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('url');
            echo $this->Form->control('tel');
            echo $this->Form->control('latitude');
            echo $this->Form->control('longitude');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
