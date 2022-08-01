<?php
// app/Model/Task.php

class Task extends AppModel {
  public $hasMany = ['Note'];

  public $validate = [
    'name' => [
      'rule' => ['maxlength' ,60],
      'required' => true,
      'allowEmpty' => false,
      'message' => 'タスク名を入力してください',
    ],
    'body' =>[
      'rule' => ['maxLength',255],
      'required' => true,
      'allowEmpty' => false,
      'message' => '詳細を入力してください',
    ]
  ];
}
