<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tabela_trabalhos extends CI_Migration {

  public function up(){
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'cargo' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
      'empresa' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
      'inicio' => array(
        'type' => 'VARCHAR',
        'constraint' => '4',
      ),
      'termino' => array(
        'type' => 'VARCHAR',
        'constraint' => '4',
      ),
      'descricao' => array(
        'type' => 'VARCHAR',
        'constraint' => '500',
      ),
      'atual' => array(
        'type' => 'TINYINT',
        'constraint' => 1,
        'default' => 0,
      ),
      'mostrar_curriculo' => array(
        'type' => 'TINYINT',
        'constraint' => 1,
        'default' => 0,
      ),
      'id_pessoa' => array(
        'type' => 'INT',
        'constraint' => 5,
      ),
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('trabalhos');
  }

  public function down(){
    $this->dbforge->drop_table('trabalhos');
  }
}