<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feature $feature
 * @var string[]|\Cake\Collection\CollectionInterface $carros
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $feature->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $feature->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Features'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="features form content">
            <?= $this->Form->create($feature) ?>
            <fieldset>
                <legend><?= __('Edit Feature') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at', ['empty' => true]);
                    echo $this->Form->control('carros._ids', ['options' => $carros]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
