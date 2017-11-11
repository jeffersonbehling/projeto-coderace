<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $interest
 */
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
        width: 100px;
        height: 100px;
        float: left;
    }

</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Event'), ['plugin' => 'Events', 'controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Interests', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="interests view large-9 medium-8 columns content">
    <h3><?= h($event->name) ?></h3>
    <?= $this->Html->image('uploads/' . $event->image, ['class' => 'event-img']) ?><br><br>
    <h4><?= __('Descrição') ?></h4>
    <?= $this->Text->autoParagraph(h($event->description)); ?>
    <h4><?= __('Grupo do WhatsApp') ?></h4>
    <?= $event->whatsapp_group != null ? $event->whatsapp_group : 'Nenhum Grupo do WhatsApp cadastrado' ?>
    <h4><?= __('Participantes') ?></h4>
    <?php foreach ($users as $user): ?>

            <?php
            $email_hash = md5(strtolower(trim($user->email)));
            echo $this->Html->image(
                'https://www.gravatar.com/avatar/' . $email_hash . "?s=48",
                ['alt' => $user->first_name, 'title' => '' .$user->first_name, 'class' => 'profile-img']
            );
            ?>
    <?php endforeach; ?>
    <br>
    <br>
    <h4><?= __('Imagens do Evento') ?></h4>
    <?php foreach ($photos as $photo): ?>

        <?php
        echo $this->Html->image(
            WWW_ROOT . 'img/uploads/' . $photo->directory, ['class' => 'event-photos']
        );
        ?>
    <?php endforeach; ?>
    <br><br>
    <?php if ($interested) { ?>
        <h6><?= __('Não vai querer desistir agora, né?') ?></h6>
        <?= $this->Form->button(__('Não vou mais'), ['class' => 'button alert']) ?>
    <?php } else { ?>
        <h6><?= __('E aí, bora?') ?></h6>
        <?= $this->Form->button(__('Bora!'), ['class' => 'button success']) ?>
    <?php } ?>
</div>
