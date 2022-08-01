<?php
// app/Model/Note.php

class Note extends AppModel {
  public $belongsTo = ['Task'];
}
