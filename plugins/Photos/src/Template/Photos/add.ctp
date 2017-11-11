<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $photo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Novo Evento'), ['plugin' => 'Events', 'controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="photos form large-9 medium-8 columns content">
    <?= $this->Form->create($photo, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Adicionar Foto') ?></legend>
        <?php
            echo $this->Form->control('directory', ['label' => __d('shopping', 'Imagem'), 'type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
