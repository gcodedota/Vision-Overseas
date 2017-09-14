<?php
/**
 * File Storage Fixture
 *
 * @author Florian Krämer
 * @copyright 2012 - 2016 Florian Krämer
 * @license MIT
 */
namespace Burzum\FileStorage\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class FileStorageFixture extends TestFixture {

/**
 * Model name
 *
 * @var string $model
 */
	public $name = 'FileStorage';

/**
 * Table name
 *
 * @var string $useTable
 */
	public $table = 'file_storage';

/**
 * Fields definition
 *
 * @var array $fields
 */
	public $fields = array(
		'id' => array('type' => 'uuid', 'null' => true, 'default' => NULL, 'length' => 36),
		'user_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36),
		'foreign_key' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36),
		'model' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 64),
		'filename' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'filesize' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 16),
		'mime_type' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 32),
		'extension' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 5),
		'hash' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 64),
		'path' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'adapter' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 32, 'comment' => 'Gaufrette Storage Adapter Class'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['id']],
		]
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 'file-storage-1',
			'user_id' => 'user-1',
			'foreign_key' => 'item-1',
			'model' => 'Item',
			'filename' => 'cake.icon.png',
			'filesize' => '',
			'mime_type' => 'image/png',
			'extension' => 'png',
			'hash' => '',
			'path' => '',
			'adapter' => 'Local',
			'created' => '2012-01-01 12:00:00',
			'modified' => '2012-01-01 12:00:00',
		),
		array(
			'id' => 'file-storage-2',
			'user_id' => 'user-1',
			'foreign_key' => 'item-1',
			'model' => 'Item',
			'filename' => 'titus-bienebek-bridle.jpg',
			'filesize' => '',
			'mime_type' => 'image/jpg',
			'extension' => 'jpg',
			'hash' => '',
			'path' => '',
			'adapter' => 'Local',
			'created' => '2012-01-01 12:00:00',
			'modified' => '2012-01-01 12:00:00',
		),
		array(
			'id' => 'file-storage-3',
			'user_id' => 'user-1',
			'foreign_key' => 'item-2',
			'model' => 'Item',
			'filename' => 'titus.jpg',
			'filesize' => '335872',
			'mime_type' => 'image/jpg',
			'extension' => 'jpg',
			'hash' => '',
			'path' => '',
			'adapter' => 'Local',
			'created' => '2012-01-01 12:00:00',
			'modified' => '2012-01-01 12:00:00',
		),
		array(
			'id' => 'file-storage-4',
			'user_id' => 'user-1',
			'foreign_key' => 'item-4',
			'model' => 'Item',
			'filename' => 'titus.jpg',
			'filesize' => '335872',
			'mime_type' => 'image/jpg',
			'extension' => 'jpg',
			'hash' => '09d82a31',
			'path' => null,
			'adapter' => 'S3',
			'created' => '2012-01-01 12:00:00',
			'modified' => '2012-01-01 12:00:00',
		)
	);
}
