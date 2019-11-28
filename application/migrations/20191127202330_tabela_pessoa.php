<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tabela_pessoa extends CI_Migration {

  public function up(){
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'nome' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
      'foto' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
        'null' => TRUE,
      ),
      'nascimento' => array(
        'type' => 'DATE',
      ),
      'email' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
        'null' => TRUE,
      ),
      'telefone' => array(
        'type' => 'VARCHAR',
        'constraint' => '15',
        'null' => TRUE,
      ),
      'facebook' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
        'null' => TRUE,
      ),
      'linkedin' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
        'null' => TRUE,
      ),
      'instagram' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
        'null' => TRUE,
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('pessoa');
  }

  public function down(){
    $this->dbforge->drop_table('pessoa');
  }
}