<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $events
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('events', 'Ações') ?></li>
        <li><?= $this->Html->link(__d('events', 'Novo Evento'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="events index large-9 medium-8 columns content">
    <h3><?= __d('events', 'Últimos Eventos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => __d('events', 'Nome')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('time_inicial', ['label' => __d('events', 'hora de Início')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('location', ['label' => __d('events', 'Localização')]) ?></th>
                <th scope="col" class="actions"><?= __d('events', 'Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
            <tr>
                <td><?= h($event->name) ?></td>
                <td><?= date_format($event->time_inicial,"H:i") ?></td>
                <td><?= h($event->location) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fi-zoom-in" style="margin-right: 5px;" title="' . __d('events', 'Visualizar') . '"></i>', ['plugin' => 'Interests', 'controller' => 'Interests', 'action' => 'view', $event->id], ['escape' => false]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __d('events', 'primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __d('events', 'anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__d('events', 'próximo') . ' >') ?>
            <?= $this->Paginator->last(__d('events', 'último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __d('events', 'Página {{page}} de {{pages}}, mostrando {{current}} dado(s) de um total de {{count}}')]) ?></p>
    </div>
</div>
