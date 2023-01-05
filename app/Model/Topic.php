<?php
App::uses('AppModel', 'Model');
/**
 * Topic Model
 *
 * @property Category $Category
 */
class Topic extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	// public $validate = array(
	// 	'title' => array(
	// 		'notBlank' => array(
	// 			'rule' => array('notBlank'),
	// 			//'message' => 'Your custom message here',
	// 			//'allowEmpty' => false,
	// 			//'required' => false,
	// 			//'last' => false, // Stop validation after this rule
	// 			//'on' => 'create', // Limit validation to 'create' or 'update' operations
	// 		),
	// 	),
	// 	'body' => array(
	// 		'notBlank' => array(
	// 			'rule' => array('notBlank'),
	// 			//'message' => 'Your custom message here',
	// 			//'allowEmpty' => false,
	// 			//'required' => false,
	// 			//'last' => false, // Stop validation after this rule
	// 			//'on' => 'create', // Limit validation to 'create' or 'update' operations
	// 		),
	// 	),
	// 	'category_id' => array(
	// 		'numeric' => array(
	// 			'rule' => array('numeric'),
	// 			//'message' => 'Your custom message here',
	// 			//'allowEmpty' => false,
	// 			//'required' => false,
	// 			//'last' => false, // Stop validation after this rule
	// 			//'on' => 'create', // Limit validation to 'create' or 'update' operations
	// 		),
	// 	),
	// );

	// The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = ['Category'];
	public $hasMany = ['Comment'];

	public $validate = [
			'title' => [
					'rule'     => ['minLength', 8],
					'required' => true
			]
	];

	public function getLatest() {
			$option = [
					'conditions' => ['Topic.category_id' => 1],
					'order' => ['Topic.created desc'],
					'limit' => 5
			];
			return $this->find('all',$option);
	}
}
