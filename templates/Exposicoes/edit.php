<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exposico $exposico
 * @var string[]|\Cake\Collection\CollectionInterface $lojas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exposico->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exposico->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Exposicoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="exposicoes form content">
            <?= $this->Form->create($exposico) ?>
            <fieldset>
                <legend><?= __('Edit Exposico') ?></legend>
                <?php
                    echo $this->Form->control('loja_id', ['options' => $lojas]);
                    echo $this->Form->control('nome');
                    echo $this->Form->control('endereco');
                    echo $this->Form->control('cidade');
                    echo $this->Form->control('estado');
                    echo $this->Form->control('cep');
                    echo $this->Form->control('telefone');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
