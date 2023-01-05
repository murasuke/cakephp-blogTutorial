<?php
/**
 * Category Fixture
 */
class CategoryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'],
		'name' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb3_unicode_ci', 'charset' => 'utf8mb3'],
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
			'name' => 'コンピュータ',
			'created' => '2022-08-13 20:18:24',
			'modified' => '2022-08-13 20:18:24'
		],
		[
			'id' => 2,
			'name' => 'グルメ',
			'created' => '2022-08-13 20:18:24',
			'modified' => '2022-08-13 20:18:24'
		],
	];

}
