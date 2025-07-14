<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carro $carro
 * @var string[]|\Cake\Collection\CollectionInterface $exposicoes
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $marcas
 * @var string[]|\Cake\Collection\CollectionInterface $modelos
 * @var string[]|\Cake\Collection\CollectionInterface $combustiveis
 * @var string[]|\Cake\Collection\CollectionInterface $transmissoes
 * @var string[]|\Cake\Collection\CollectionInterface $condicoes
 * @var string[]|\Cake\Collection\CollectionInterface $categorias
 * @var string[]|\Cake\Collection\CollectionInterface $features
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $carro->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $carro->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Carros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carros form content">
            <?= $this->Form->create($carro) ?>
            <fieldset>
                <legend><?= __('Edit Carro') ?></legend>
                <?php
                    echo $this->Form->control('exposicao_id', ['options' => $exposicoes]);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('marca_id', ['options' => $marcas]);
                    echo $this->Form->control('modelo_id', ['options' => $modelos]);
                    echo $this->Form->control('combustivel_id', ['options' => $combustiveis]);
                    echo $this->Form->control('transmissao_id', ['options' => $transmissoes]);
                    echo $this->Form->control('condicao_id', ['options' => $condicoes]);
                    echo $this->Form->control('categoria_id', ['options' => $categorias]);
                    echo $this->Form->control('nome');
                    echo $this->Form->control('ano');
                    echo $this->Form->control('quilometragem');
                    echo $this->Form->control('cor_exterior');
                    echo $this->Form->control('cor_interior');
                    echo $this->Form->control('portas');
                    echo $this->Form->control('motor');
                    echo $this->Form->control('torque');
                    echo $this->Form->control('potencia');
                    echo $this->Form->control('velocidade_maxima');
                    echo $this->Form->control('tracao');
                    echo $this->Form->control('capacidade_reboque');
                    echo $this->Form->control('placa');
                    echo $this->Form->control('codigo_estoque');
                    echo $this->Form->control('preco');
                    echo $this->Form->control('preco_promocional');
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('extras');
                    echo $this->Form->control('observacoes');
                    echo $this->Form->control('status');
                    echo $this->Form->control('destaque');
                    echo $this->Form->control('visualizacoes');
                    echo $this->Form->control('features._ids', ['options' => $features]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
