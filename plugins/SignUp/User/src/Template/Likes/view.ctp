<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $like
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Like'), ['action' => 'edit', $like->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Like'), ['action' => 'delete', $like->id], ['confirm' => __('Are you sure you want to delete # {0}?', $like->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Likes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Like'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="likes view large-9 medium-8 columns content">
    <h3><?= h($like->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($like->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($like->id) ?></td>
        </tr>
    </table>
</div>
