<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $photo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Photos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="photos form large-9 medium-8 columns content">
    <?= $this->Form->create($photo, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Photo') ?></legend>
        <?php
            echo $this->Form->control('directory', ['label' => __d('shopping', 'Image'), 'type' => 'file']);
            echo $this->Form->control('events_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
