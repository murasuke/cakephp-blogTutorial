<!-- app/View/Tasks/create.ctp -->

<form action="<?=$this->Html->url('/Tasks/create')?>" method="post">
  <?= $this->Form->error('Task.name') ?>
  <?= $this->Form->error('Task.body') ?>
  タスク名<input type="text" name="name" size="40" >
  詳細<br />
  <textarea name="body" cols="40" rows="3"></textarea>
  <input type="submit" value="タスクを作成" >
</form>
