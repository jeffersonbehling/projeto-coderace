<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $interests
 */
?>
<style>
    span.qtd-users {
        width:50px;
        height:50px;
        border-radius:25px;
        color: #000000;
        text-align:center;
    }

    .fi-plus:hover {
        color: #00aa00;
        cursor: pointer;
    }

    .fi-plus {
        font-size: 20px;
        padding-right: 20px;
        color: #000000;
    }

    .fi-x:hover {
        color: #e10d00;
        cursor: pointer;
    }

    .fi-x {
        font-size: 20px;
        padding-right: 20px;
        color: #000000;
    }

    div.hidden-description {
        display: none;
    }

    .event-name {
        margin-top: 5px;
        cursor: pointer;
    }

</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('interests', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('interests', 'New Event'), ['plugin' => 'Events', 'controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="interests index large-9 medium-8 columns content">
    <?= $this->Form->create(); ?>
        <fieldset>
            <h3><?= __d('soils', 'Search Events') ?></h3>
            <?php
            echo $this->Form->control('name', ['label' => '', 'placeholder' => __d('interests', 'Query by Name')]);
            echo $this->Form->button(__d('interests', 'Filter'), ['type' => 'submit']);
            echo $this->Form->end();
            ?>
        </fieldset>
        <tbody>
        <?php foreach ($events as $event): ?>
            <table class="vertical-table">
                <tr>
                    <th>
                        <?php if ($event->user_participating) { ?>
                            <?= $this->Html->link('<i class="fi-x" title="'. __d('interests', 'Não vou') . '"></i>', ['action' => 'delete', $event->id], ['escape' => false]) ?>
                        <?php } else { ?>
                            <?= $this->Html->link('<i class="fi-plus" title="'. __d('interests', 'Participar') . '"></i>', ['action' => 'add', $event->id], ['escape' => false]) ?>
                        <?php } ?>
                        <?= $this->Html->link($event->name, ['action' => 'view', $event->id], ['class' => 'event-name']) ?>
                    </th>
                    <th><span class="qtd-users" title="Participantes"><?= $event->interested != null ? $event->interested : 0 ?></span></th>
                </tr>
            </table>
            <div class="hidden-description" id="<?= $event->id ?>">
                <p>
                    <?= $event->description != null ? $this->Text->autoParagraph(h($event->description)) : 'Nenhuma descrição para esse evento' ?>
                </p>
            </div>
            <div id="<?= $event->id ?>" style="display: none;"></div>
        <?php endforeach; ?>
        </tbody>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __d('interests', 'first')) ?>
            <?= $this->Paginator->prev('< ' . __d('interests', 'previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__d('interests', 'next') . ' >') ?>
            <?= $this->Paginator->last(__d('interests', 'last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __d('interests', 'Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<script type="application/javascript">

    function showDescription(id) {
        if (document.getElementById(''+id).style.display == 'none') {
            document.getElementById(''+id).style.display = 'block';
        } else {
            document.getElementById(''+id).style.display = 'none';
        }
    }
</script>
