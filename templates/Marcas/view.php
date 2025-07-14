<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Marca $marca
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Marca'), ['action' => 'edit', $marca->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Marca'), ['action' => 'delete', $marca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marca->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Marcas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Marca'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="marcas view content">
            <h3><?= h($marca->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($marca->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($marca->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($marca->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($marca->updated_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Carros') ?></h4>
                <?php if (!empty($marca->carros)) : ?>
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
                        <?php foreach ($marca->carros as $carros) : ?>
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
            <div class="related">
                <h4><?= __('Related Modelos') ?></h4>
                <?php if (!empty($marca->modelos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Marca Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($marca->modelos as $modelos) : ?>
                        <tr>
                            <td><?= h($modelos->id) ?></td>
                            <td><?= h($modelos->marca_id) ?></td>
                            <td><?= h($modelos->nome) ?></td>
                            <td><?= h($modelos->created_at) ?></td>
                            <td><?= h($modelos->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Modelos', 'action' => 'view', $modelos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Modelos', 'action' => 'edit', $modelos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Modelos', 'action' => 'delete', $modelos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modelos->id)]) ?>
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
