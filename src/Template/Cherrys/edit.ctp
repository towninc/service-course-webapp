<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cherry $cherry
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cherry->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cherry->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cherrys'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cherrys form large-9 medium-8 columns content">
    <?= $this->Form->create($cherry) ?>
    <fieldset>
        <legend><?= __('Edit Cherry') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('yomi_name');
            echo $this->Form->control('pref');
            echo $this->Form->control('city');
            echo $this->Form->control('lat');
            echo $this->Form->control('lng');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
