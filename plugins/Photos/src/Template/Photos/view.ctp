<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $photo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Photo'), ['action' => 'edit', $photo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Photo'), ['action' => 'delete', $photo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $photo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Photo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="photos view large-9 medium-8 columns content">
    <h3><?= h($photo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($photo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Directory') ?></th>
            <td><?= h($photo->directory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Events Id') ?></th>
            <td><?= h($photo->events_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Phinxlog') ?></h4>
        <?php if (!empty($photo->phinxlog)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Version') ?></th>
                <th scope="col"><?= __('Migration Name') ?></th>
                <th scope="col"><?= __('Start Time') ?></th>
                <th scope="col"><?= __('End Time') ?></th>
                <th scope="col"><?= __('Breakpoint') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($photo->phinxlog as $phinxlog): ?>
            <tr>
                <td><?= h($phinxlog->version) ?></td>
                <td><?= h($phinxlog->migration_name) ?></td>
                <td><?= h($phinxlog->start_time) ?></td>
                <td><?= h($phinxlog->end_time) ?></td>
                <td><?= h($phinxlog->breakpoint) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Phinxlog', 'action' => 'view', $phinxlog->version]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Phinxlog', 'action' => 'edit', $phinxlog->version]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Phinxlog', 'action' => 'delete', $phinxlog->version], ['confirm' => __('Are you sure you want to delete # {0}?', $phinxlog->version)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
