<?php
/**
 * Comment Fixture
 */
class CommentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'],
		'topic_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false],
		'title' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb3_unicode_ci', 'charset' => 'utf8mb3'],
		'comment' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8mb3_unicode_ci', 'charset' => 'utf8mb3'],
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
			'topic_id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2022-08-13 20:22:07',
			'modified' => '2022-08-13 20:22:07'
		],
	];

}
