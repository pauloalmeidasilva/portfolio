<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tabela_portfolio extends CI_Migration {

  public function up(){
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'foto' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
      ),
      'nome' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
      'tipo' => array(
        'type' => 'INT',
        'constraint' => 5,
      ),
      'linguagem' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
      'link_repositorio' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
      ),
      'mostrar_link' => array(
        'type' => 'TINYINT',
        'constraint' => 1,
        'default' => 0,
      ),
      'inicio' => array(
        'type' => 'VARCHAR',
        'constraint' => '4',
      ),
      'termino' => array(
        'type' => 'VARCHAR',
        'constraint' => '4',
      ),
      'status' => array(
        'type' => 'INT',
        'constraint' => 5,
      ),
      'descricao' => array(
        'type' => 'VARCHAR',
        'constraint' => '500',
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
    $this->dbforge->create_table('portfolio');
  }

  public function down(){
    $this->dbforge->drop_table('portfolio');
  }
}