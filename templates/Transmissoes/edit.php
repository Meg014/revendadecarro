<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transmisso $transmisso
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transmisso->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transmisso->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Transmissoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transmissoes form content">
            <?= $this->Form->create($transmisso) ?>
            <fieldset>
                <legend><?= __('Edit Transmisso') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
