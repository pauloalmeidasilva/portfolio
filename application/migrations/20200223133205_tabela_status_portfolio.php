<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tabela_status_portfolio extends CI_Migration {

  public function up(){
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'descricao' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
      'cor' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
      'status' => array(
        'type' => 'TINYINT',
        'constraint' => 1,
        'default' => 1,
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('status_portfolio');
  }

  public function down(){
    $this->dbforge->drop_table('status_portfolio');
  }
}