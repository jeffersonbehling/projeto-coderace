<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $event
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Lista de Eventos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Adicionar Evento') ?></legend>
        <?php
            echo $this->Form->control('name', ['label' => __d('events', 'Nome')]);
            echo $this->Form->control('time_inicial', ['label' => __d('events', 'Hora de Início')]);
            echo $this->Form->control('location', ['label' => __d('events', 'Localização')]);
            echo $this->Form->control('image', ['label' => __d('events', 'Imagem'), 'type' => 'file']);
            echo $this->Form->control('whatsapp_group', ['label' => __d('events', 'Grupo do WhatsApp'), 'type' => 'file']);
            echo $this->Form->control('description', ['label' => __d('events', 'Descrição')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
