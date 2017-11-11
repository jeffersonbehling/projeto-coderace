<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $like
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Likes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="likes form large-9 medium-8 columns content">
    <?= $this->Form->create($like) ?>
    <fieldset>
        <legend><?= __('Add Like') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
