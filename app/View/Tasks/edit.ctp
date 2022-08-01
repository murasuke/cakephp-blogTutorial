<!-- app/View/Tasks/edit.ctp -->
<?php
echo $this->Form->create('Task',['type' => 'post']);
echo $this->Form->input('Task.name', ['label' => 'タイトル']);
echo $this->Form->input('Task.body', ['label' => '詳細']);
echo $this->Form->end('保存');
?>
