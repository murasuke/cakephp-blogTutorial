<!-- File: /app/View/posts/view.ctp -->

<h1><?= h($post['Post']['title']) ?></h1>
<p><?= h($post['Post']['body']) ?></p>
<p><small>Created: <?=$post['Post']['created']?></small></p>
