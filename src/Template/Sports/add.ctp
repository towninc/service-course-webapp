<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sport $sport
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sports'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sports form large-9 medium-8 columns content">
    <?= $this->Form->create($sport) ?>
    <fieldset>
        <legend><?= __('Add Sport') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('longitude');
            echo $this->Form->control('latitude');
            echo $this->Form->control('tel');
            echo $this->Form->control('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
