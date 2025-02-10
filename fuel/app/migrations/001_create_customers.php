<?php

namespace Fuel\Migrations;

class Create_customers extends Migration
{
	public function up()
	{
		\DBUtil::create_table('customers', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'name' => array('constraint' => 50, 'null' => false, 'type' => 'varchar'),
			'email' => array('constraint' => 50, 'null' => false, 'type' => 'varchar', 'unique' => true),
			'address' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
			'phone' => array('constraint' => 30, 'null' => false, 'type' => 'varchar'),
			'sex' => array('null' => false, 'type' => 'boolean'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('customers');
	}
}