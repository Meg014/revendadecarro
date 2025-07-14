<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modelo $modelo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Modelo'), ['action' => 'edit', $modelo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Modelo'), ['action' => 'delete', $modelo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modelo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Modelos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Modelo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="modelos view content">
            <h3><?= h($modelo->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Marca') ?></th>
                    <td><?= $modelo->has('marca') ? $this->Html->link($modelo->marca->nome, ['controller' => 'Marcas', 'action' => 'view', $modelo->marca->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($modelo->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($modelo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($modelo->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($modelo->updated_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Carros') ?></h4>
                <?php if (!empty($modelo->carros)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Exposicao Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Marca Id') ?></th>
                            <th><?= __('Modelo Id') ?></th>
                            <th><?= __('Combustivel Id') ?></th>
                            <th><?= __('Transmissao Id') ?></th>
                            <th><?= __('Condicao Id') ?></th>
                            <th><?= __('Categoria Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Ano') ?></th>
                            <th><?= __('Quilometragem') ?></th>
                            <th><?= __('Cor Exterior') ?></th>
                            <th><?= __('Cor Interior') ?></th>
                            <th><?= __('Portas') ?></th>
                            <th><?= __('Motor') ?></th>
                            <th><?= __('Torque') ?></th>
                            <th><?= __('Potencia') ?></th>
                            <th><?= __('Velocidade Maxima') ?></th>
                            <th><?= __('Tracao') ?></th>
                            <th><?= __('Capacidade Reboque') ?></th>
                            <th><?= __('Placa') ?></th>
                            <th><?= __('Codigo Estoque') ?></th>
                            <th><?= __('Preco') ?></th>
                            <th><?= __('Preco Promocional') ?></th>
                            <th><?= __('Descricao') ?></th>
                            <th><?= __('Extras') ?></th>
                            <th><?= __('Observacoes') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Destaque') ?></th>
                            <th><?= __('Visualizacoes') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($modelo->carros as $carros) : ?>
                        <tr>
                            <td><?= h($carros->id) ?></td>
                            <td><?= h($carros->exposicao_id) ?></td>
                            <td><?= h($carros->user_id) ?></td>
                            <td><?= h($carros->marca_id) ?></td>
                            <td><?= h($carros->modelo_id) ?></td>
                            <td><?= h($carros->combustivel_id) ?></td>
                            <td><?= h($carros->transmissao_id) ?></td>
                            <td><?= h($carros->condicao_id) ?></td>
                            <td><?= h($carros->categoria_id) ?></td>
                            <td><?= h($carros->nome) ?></td>
                            <td><?= h($carros->ano) ?></td>
                            <td><?= h($carros->quilometragem) ?></td>
                            <td><?= h($carros->cor_exterior) ?></td>
                            <td><?= h($carros->cor_interior) ?></td>
                            <td><?= h($carros->portas) ?></td>
                            <td><?= h($carros->motor) ?></td>
                            <td><?= h($carros->torque) ?></td>
                            <td><?= h($carros->potencia) ?></td>
                            <td><?= h($carros->velocidade_maxima) ?></td>
                            <td><?= h($carros->tracao) ?></td>
                            <td><?= h($carros->capacidade_reboque) ?></td>
                            <td><?= h($carros->placa) ?></td>
                            <td><?= h($carros->codigo_estoque) ?></td>
                            <td><?= h($carros->preco) ?></td>
                            <td><?= h($carros->preco_promocional) ?></td>
                            <td><?= h($carros->descricao) ?></td>
                            <td><?= h($carros->extras) ?></td>
                            <td><?= h($carros->observacoes) ?></td>
                            <td><?= h($carros->status) ?></td>
                            <td><?= h($carros->destaque) ?></td>
                            <td><?= h($carros->visualizacoes) ?></td>
                            <td><?= h($carros->created) ?></td>
                            <td><?= h($carros->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Carros', 'action' => 'view', $carros->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Carros', 'action' => 'edit', $carros->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Carros', 'action' => 'delete', $carros->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carros->id)]) ?>
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
