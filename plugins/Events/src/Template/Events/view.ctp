<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $event
 */
?>
<style>
    img.event-img {
        width: 600px;
        height: 300px;
        margin-right: 10%;
    }
</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('events', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('events', 'New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('events', 'List Events'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __d('events', 'Location') ?></th>
            <td><?= h($event->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('events', 'Start Time') ?></th>
            <td><?= date_format($event->time_inicial, 'H:i') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('events', 'Created') ?></th>
            <td><?= h($event->created) ?></td>
        </tr>
    </table>
    <h4><?= __d('events', 'Image') ?></h4>
    <div class="col-lg-4 col-md-4">
        <?php echo $this->Html->image('uploads/' . $event->image, ['class' => 'event-img']);?>
    </div>
    <div class="row">
        <h4><?= __d('events', 'Description') ?></h4>
        <?= $this->Text->autoParagraph(h($event->description)); ?>
    </div>
</div>
