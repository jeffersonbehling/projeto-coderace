<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $photos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Photo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="photos index large-9 medium-8 columns content">
    <h3><?= __('Photos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('directory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('events_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($photos as $photo): ?>
            <tr>
                <td><?= h($photo->id) ?></td>
                <td><?= h($photo->directory) ?></td>
                <td><?= h($photo->events_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $photo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $photo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $photo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $photo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
