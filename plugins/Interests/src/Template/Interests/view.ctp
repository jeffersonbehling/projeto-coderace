<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $interest
 */
use Cake\Routing\Router;
?>
<style>
    .profile-img {
        border-radius: 100%;
        float: left;
        margin-right: 10px;
    }

    .profile-img:hover {
        cursor: pointer;
    }

    .event-photos {
        width: 200px;
        height: 200px;
        margin-right: 20px;
        float: left;
    }

</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Novo Evento'), ['plugin' => 'Events', 'controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Lista de Eventos'), ['controller' => 'Interests', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="interests view large-9 medium-8 columns content">
    <h3><?= h($event->name) ?></h3>
    <?= $this->Html->image('uploads/' . $event->image, ['class' => 'event-img']) ?><br><br>
    <h4><?= __('Descrição') ?></h4>
    <?= $this->Text->autoParagraph(h($event->description)); ?>
    <h4><?= __('Grupo do WhatsApp') ?></h4>
    <?= $event->whatsapp_group != null ? $this->Html->link($event->whatsapp_group) : 'Nenhum Grupo do WhatsApp cadastrado' ?>
    <h4><?= __('Participantes') ?></h4>
    <?php foreach ($users as $user): ?>

            <?php
            $email_hash = md5(strtolower(trim($user->email)));
            $url = 'https://www.gravatar.com/avatar/' . $email_hash . '?s=48'; ?>
        <img src="<?= $url ?>" alt="<?= $user->first_name ?>" title="<?= $user->first_name ?>" class="profile-img"s>

    <?php endforeach; ?>
    <br>
    <br>
    <h4><?= __('Imagens do Evento') ?></h4>
    <?php if ($photos->count() != 0) { ?>
        <?php foreach ($photos as $photo): ?>

            <?php
            echo $this->Html->image('uploads/' . $photo->directory, ['class' => 'event-photos']
            );
            ?>
        <?php endforeach; ?>
        <br><br>
        <br><br>
        <br><br>
        <br><br>
    <?php } else { ?>
       <?= __('Nenhuma imagem adicionada ainda...') ?>
    <?php } ?>
    <br>
        <?= $this->Html->link(__('Adicionar Imagem'), ['plugin' => 'Photos', 'controller' => 'Photos', 'action' => 'add', $event->id]) ?>

    <br><br>
    <?php if ($interested) { ?>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Interests', 'action' => 'delete', $event->id]]) ?>
            <h6><?= __('Não vai querer desistir agora, né?') ?></h6>
        <?= $this->Form->submit(__('Não vou mais'), ['class' => 'button alert']) ?>
        <?= $this->Form->end() ?>
    <?php } else { ?>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Interests', 'action' => 'add', $event->id]]) ?>
        <h6><?= __('E aí, bora?') ?></h6>
        <?= $this->Form->submit(__('Bora!'), ['class' => 'button success']) ?>
        <?= $this->Form->end() ?>
    <?php } ?>
    <?= $this->Form->end() ?>
</div>
