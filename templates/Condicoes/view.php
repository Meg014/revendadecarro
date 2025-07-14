<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Condico $condico
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Condico'), ['action' => 'edit', $condico->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Condico'), ['action' => 'delete', $condico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $condico->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Condicoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Condico'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="condicoes view content">
            <h3><?= h($condico->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($condico->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($condico->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($condico->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($condico->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
