<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $events
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('events', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('events', 'New Event'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="events index large-9 medium-8 columns content">
    <h3><?= __d('events', 'Last Events') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => __d('events', 'Name')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('time_inicial', ['label' => __d('events', 'Start Time')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('location', ['label' => __d('events', 'Location')]) ?></th>
                <th scope="col" class="actions"><?= __d('events', 'Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
            <tr>
                <td><?= h($event->name) ?></td>
                <td><?= date_format($event->time_inicial,"H:i") ?></td>
                <td><?= h($event->location) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fi-zoom-in" style="margin-right: 5px;" title="' . __d('events', 'View') . '"></i>', ['action' => 'view', $event->id], ['escape' => false]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __d('events', 'first')) ?>
            <?= $this->Paginator->prev('< ' . __d('events', 'previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__d('events', 'next') . ' >') ?>
            <?= $this->Paginator->last(__d('events', 'last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __d('events', 'Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
