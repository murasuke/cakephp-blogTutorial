<?php

/**
 * Topic Fixture
 */
class TopicFixture extends CakeTestFixture
{

	/**
	 * Fields
	 *
	 * @var array
	 */
	public $fields = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'],
		'title' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb3_unicode_ci', 'charset' => 'utf8mb3'],
		'body' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8mb3_unicode_ci', 'charset' => 'utf8mb3'],
		'category_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false],
		'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
		'modified' => ['type' => 'datetime', 'null' => false, 'default' => null],
		'indexes' => [
			'PRIMARY' => ['column' => 'id', 'unique' => 1]
		],
		'tableParameters' => ['charset' => 'utf8mb3', 'collate' => 'utf8mb3_unicode_ci', 'engine' => 'MyISAM']
	];

	/**
	 * Records
	 *
	 * @var array
	 */
	public $records = [
		[
			'id' => 1,
			'category_id' => 1,
			'title' => '新しいパソコン',
			'body' => '',
			'created' => '2022-08-02 20:18:47',
			'modified' => '2022-08-13 20:18:47',
		],
		[
			'id' => 2,
			'category_id' => 1,
			'title' => '新しい携帯電話',
			'body' => '',
			'created' => '2022-08-03 20:18:47',
			'modified' => '2022-08-13 20:18:47',
		],
		[
			'id' => 3,
			'category_id' => 1,
			'title' => '格好良いスマートフォン',
			'body' => '',
			'created' => '2022-08-01 20:18:47',
			'modified' => '2022-08-13 20:18:47',
		],
		[
			'id' => 4,
			'category_id' => 1,
			'title' => 'はじめてのPHP',
			'body' => '',
			'created' => '2022-08-04 20:18:47',
			'modified' => '2022-08-13 20:18:47',
		],
		[
			'id' => 5,
			'category_id' => 1,
			'title' => 'はじめてのWindows',
			'body' => '',
			'created' => '2022-08-05 20:18:47',
			'modified' => '2022-08-13 20:18:47',
		],
		[
			'id' => 6,
			'category_id' => 1,
			'title' => 'CG入門',
			'body' => '',
			'created' => '2022-08-06 20:18:47',
			'modified' => '2022-08-13 20:18:47',
		],
		[
			'id' => 7,
			'category_id' => 2,
			'title' => '好きなお寿司は？',
			'body' => '',
			'created' => '2022-08-04 22:18:47',
			'modified' => '2022-08-13 20:18:47',
		],

	];
}
