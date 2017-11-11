<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $likes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Like'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="likes index large-9 medium-8 small-8 columns content">
    <h3><?= __('Likes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <tbody>
        <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Escolha seus gostos!') ?></legend>
        <?php foreach ($likes as $like): ?>
            <div class="large-2 medium-3 small-12 columns">
            <label><input type="checkbox" name="likes[]" value="<?= $like->id ?>"><?= $like->name ?></label>
            </div>
            <?php endforeach; ?>
            <br>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </fieldset>
        </tbody>
    </table>
</div>
