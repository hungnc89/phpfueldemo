<?php
use Orm\Model;
class Model_Customer extends Model
{


	protected static $_properties = array(
		'id',
		'name',
		'email',
		'address',
		'phone',
		'sex',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);
}
