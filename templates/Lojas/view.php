<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loja $loja
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Loja'), ['action' => 'edit', $loja->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Loja'), ['action' => 'delete', $loja->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loja->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lojas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Loja'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lojas view content">
            <h3><?= h($loja->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($loja->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $loja->has('user') ? $this->Html->link($loja->user->name, ['controller' => 'Users', 'action' => 'view', $loja->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($loja->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($loja->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($loja->updated_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Exposicoes') ?></h4>
                <?php if (!empty($loja->exposicoes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Loja Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Endereco') ?></th>
                            <th><?= __('Cidade') ?></th>
                            <th><?= __('Estado') ?></th>
                            <th><?= __('Cep') ?></th>
                            <th><?= __('Telefone') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($loja->exposicoes as $exposicoes) : ?>
                        <tr>
                            <td><?= h($exposicoes->id) ?></td>
                            <td><?= h($exposicoes->loja_id) ?></td>
                            <td><?= h($exposicoes->nome) ?></td>
                            <td><?= h($exposicoes->endereco) ?></td>
                            <td><?= h($exposicoes->cidade) ?></td>
                            <td><?= h($exposicoes->estado) ?></td>
                            <td><?= h($exposicoes->cep) ?></td>
                            <td><?= h($exposicoes->telefone) ?></td>
                            <td><?= h($exposicoes->created_at) ?></td>
                            <td><?= h($exposicoes->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Exposicoes', 'action' => 'view', $exposicoes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Exposicoes', 'action' => 'edit', $exposicoes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Exposicoes', 'action' => 'delete', $exposicoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exposicoes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
