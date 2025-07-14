<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Combustivei $combustivei
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Combustivei'), ['action' => 'edit', $combustivei->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Combustivei'), ['action' => 'delete', $combustivei->id], ['confirm' => __('Are you sure you want to delete # {0}?', $combustivei->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Combustiveis'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Combustivei'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="combustiveis view content">
            <h3><?= h($combustivei->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($combustivei->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($combustivei->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($combustivei->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($combustivei->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
