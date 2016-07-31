<?php

class Migration_vendors extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'vendor_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'vendor_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ),
            'vendor_address' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ),
            'vendor_city' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ),
            'vendor_state' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
            ),
            'vendor_zip' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
            ),
        ));
        $this->dbforge->add_key('vendor_id', TRUE);
        $this->dbforge->create_table('vendors');
    }

    public function down() {
        $this->dbforge->drop_table('vendors');
    }

}