<?php

class Migration_Items extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'item_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'slip_id_fk' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'item_assetTag' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ),
            'item_manufacturer' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ),
            'item_deviceName' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ),
            'item_modelNumber' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ),
            'item_serialNumber' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ),
            'item_quantity' => array(
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
            ),
        ));
        $this->dbforge->add_key('item_id', TRUE);
        $this->dbforge->create_table('items');
        $this->dbforge->add_column('items',[
            'CONSTRAINT slip_id_fk FOREIGN KEY(slip_id_fk) REFERENCES slips(slip_id)',
        ]);
    }

    public function down() {
        $this->dbforge->drop_table('items');
    }

}