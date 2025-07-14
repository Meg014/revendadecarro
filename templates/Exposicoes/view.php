<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exposico $exposico
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Exposico'), ['action' => 'edit', $exposico->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Exposico'), ['action' => 'delete', $exposico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exposico->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Exposicoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Exposico'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="exposicoes view content">
            <h3><?= h($exposico->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Loja') ?></th>
                    <td><?= $exposico->has('loja') ? $this->Html->link($exposico->loja->nome, ['controller' => 'Lojas', 'action' => 'view', $exposico->loja->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($exposico->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Endereco') ?></th>
                    <td><?= h($exposico->endereco) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cidade') ?></th>
                    <td><?= h($exposico->cidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= h($exposico->estado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cep') ?></th>
                    <td><?= h($exposico->cep) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone') ?></th>
                    <td><?= h($exposico->telefone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($exposico->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($exposico->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($exposico->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
