<!-- app/View/Elements/task.ctp -->

<?= $this->Html->css('task'); ?>
<div class="roundBox" >
  <h3><?= h($task['Task']['id']) ?>:<?= h($task['Task']['name']) ?></h3>
  作成日<?= h($task['Task']['created']) ?>
  <p class="comment">
    <ul>
      <?php foreach ($task['Note'] as $note): ?>
        <li>
          <?= h($note['body']) ?>
        </li>

      <?php endforeach ?>
      <li>
        <?= $this->Html->link('コメントを追加', '/Notes/create') ?>
      </li>
    </ul>
  </p>
  <?= $this->Html->Link('編集', '/Tasks/edit/'. $task['Task']['id'], ['class' => 'button left']) ?>
  <?= $this->Html->Link('このタスクを完了する', '/Tasks/done/'.$task['Task']['id'], ['class' => 'button right']) ?>
</div>
