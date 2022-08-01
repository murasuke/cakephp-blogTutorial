<!-- app/View/Tasks/index.ctp -->
<?= $this->Html->link('新規タスク', 'create'); ?>
<h3><?= count($tasks_data) ?>件のタスクが未完了です</h3>

<?php foreach( $tasks_data as $row): ?>
<?= $this->element('task', ['task' => $row]) ?>
<?php endforeach ?>

