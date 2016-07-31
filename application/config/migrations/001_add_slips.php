<?php
class Migration_Add_slips extends CI_Migration
{
	public.function up()
	{
		$this->dbforge->add_field(
			array(
				'slip_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'auto_increment' => true,
					'null' => false,
				),
				'slip_shipName' => array(
					'type' => 'VARCHAR',
					'constraint' => 50,
					'null' => false,
				),
				'slip_shipAddress' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
					'null' => false,
				),	
				'slip_shipCity' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
					'null' => false,
				),
				'slip_shipState' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
					'null' => false,
				),
				'slip_shipZip' => array(
					'type' => 'INT',
					'constraint' => 5,
					'null' => false,
				),
				'slip_fedexTracking' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
					'null' => true,
				),
				'slip_rmaNumber' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
					'null' => true,
				),
				'slip_comments' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
					'null' => true,
				),
				'slip_status' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
					'null' => false,
				),
				'slip_date timestamp default current_timestamp',
				'slip_customerContact' => array(
					'type' => 'VARCHAR',
					'constraint' => 50,
					'null' => false,
				),
				'slip_customerPhone' => array(
					'type' => 'VARCHAR',
					'constraint' => 50,
					'null' => false,
				),
				'slip_lastModified' => array(
					'type' => 'VARCHAR',
					'constraint' => 50,
					'null' => false,
				),
				'slip_description' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
					'null' => false,
				),
			)
		);

		$this->dbforge->add_key('slip_id', TRUE);
		$this->dbforge->create_table('slips');
	}
	public function down()
	{
		$this->dbforge->drop_table('slips');
	}
}