<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $event
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Event') ?></legend>
        <?php
            echo $this->Form->control('name', ['label' => __d('events', 'Name')]);
            echo $this->Form->control('time_inicial', ['label' => __d('events', 'Start Time')]);
            echo $this->Form->control('location', ['label' => __d('events', 'Location')]);
            echo $this->Form->control('image', ['label' => __d('events', 'Image'), 'type' => 'file']);
            echo $this->Form->control('description', ['label' => __d('events', 'Description')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
