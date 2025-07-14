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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $condico->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $condico->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Condicoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="condicoes form content">
            <?= $this->Form->create($condico) ?>
            <fieldset>
                <legend><?= __('Edit Condico') ?></legend>
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
