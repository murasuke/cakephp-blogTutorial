<?php
class TasksController extends AppController {
  public $scaffold;
  public $components = ['Flash'];


  public function index() {
    $options = [
      'conditions' => ['Task.status' => 0]
    ];


    $tasks_data = $this->Task->find('all', $options);
    $this->set(compact('tasks_data'));
    // $this->render('index');
  }

  public function done() {
    $id = $this->request->pass[0];
    $this->Task->id = $id;
    $this->Task->saveField('status', 1);

    $msg = sprintf('タスク %s を完了しました', $this-> request->pass[0]);
    $this->Flash->success('This was successful');
    $this->redirect('index');
  }

  public function create() {
    if ($this->request->is('post')) {
      $data = [
        'name' => $this->request->data['name'],
        'body' => $this->request->data['body']
      ];

      // idがセットされなければInsert、あればUpdateになる
      $id = $this->Task->save($data);
      if( $id === false) {
        $this->render('create');
        return;
      }

      $msg = sprintf('タスク %s を登録しました。', $this->Task->id);

      // $this->flash($msg, 'Tasks/index'); //depricated at 2.7
      // $this->Session->setFlash($msg); //depricated at 2.7
      $this->Flash->success($msg);
      $this->redirect('index');
    }
    // $this->render('create'); // actionと同名のviewを表示
  }

  public function edit() {
    $id = $this->request->pass[0];
    $options = [
      'conditions' =>
      ['Task.id' => $id, 'Task.status' => 0]
    ];

    $task = $this->Task->find('first', $options);

    if($task === false) {
      $this->Flash->error('タスクが見つかりません');
      $this->redirect('index');
    }

    if ($this->request->is('post')) {
      $data = [
        'id' => $id,
        'name' => $this->request->data['Task']['name'],
        'body' => $this->request->data['Task']['body'],
      ];
      if ($this->Task->save($data)) {
        $this->Flash->success('更新しました');
        $this->redirect('index');
      }
    } else {
      $this->request->data = $task;
    }
  }
}
