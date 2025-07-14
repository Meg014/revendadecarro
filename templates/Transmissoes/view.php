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
            <?= $this->Html->link(__('Edit Transmisso'), ['action' => 'edit', $transmisso->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transmisso'), ['action' => 'delete', $transmisso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transmisso->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transmissoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transmisso'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transmissoes view content">
            <h3><?= h($transmisso->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($transmisso->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transmisso->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($transmisso->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($transmisso->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
