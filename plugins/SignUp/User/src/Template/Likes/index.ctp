<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $likes
 */

$this->layout = 'login';
?>
<div class="likes index large-12 medium-8 small-12 columns content">
    <h3><?= __('Likes') ?></h3>
        <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Escolha seus gostos!') ?></legend>
        <?php foreach ($likes as $like): ?>
            <div class="large-3 medium-3 small-12 columns">
            <label><input type="checkbox" name="likes[]" value="<?= $like->id ?>"><?= $like->name ?></label>
            </div>
            <?php endforeach; ?>
        </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
