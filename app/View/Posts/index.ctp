<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>

<?= $this->Html->link('Add Post', ['controller' => 'posts', 'action' => 'add']) ?>

<table>
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Actions</th>
    <th>Created</th>
  </tr>
  <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->
  <?php foreach ($posts as $post) : ?>
    <tr>
      <td><?php echo $post['Post']['id']; ?></td>
      <td>
        <?php echo $this->Html->link(
            $post['Post']['title'],
            ['controller' => 'posts', 'action' => 'view', $post['Post']['id']]);
        ?>
      </td>
      <td>
        <?php echo $this->Html->link(
            'Edit',
            ['action' => 'edit', $post['Post']['id']]);
        ?>
        <?php echo $this->Form->PostLink(
            'Delete',
            ['action' => 'delete', $post['Post']['id']],
            ['confirm' => 'Are you sure?']);
        ?>
      </td>
      <td><?= $post['Post']['created'] ?></td>
    </tr>
  <?php endforeach; ?>
  <?php unset($post); ?>
</table>
