<?php
class CategoryShell extends AppShell {
  public $uses = ['Category'];
  function index() {
    $this->out("id\tname");
    $this->out('===========================================');
    foreach ($this->Category->find('all') as $category) {
      $this->out($category['Category']['id']. "\t".$category['Category']['name']);
    }
    $this->out('===========================================');
  }

  function add() {
    $this->Category->create();
    $this->Category->save(['name'=>$this->args[0]]);
    $this->out('"'.$this->args[0].'"をid:'.$this->Category->id.'で登録しました');
  }

  function delete() {
    $this->Category->delete($this->args[0]);
  }
}
