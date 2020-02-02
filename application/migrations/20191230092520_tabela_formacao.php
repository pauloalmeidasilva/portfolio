<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tabela_formacao extends CI_Migration {

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
      'instituicao' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
      'escolaridade' => array(
        'type' => 'TINYINT',
        'constraint' => 1,
      ),
      'nivel' => array(
        'type' => 'TINYINT',
        'constraint' => 1,
        'null' => TRUE,
      ),
      'inicio' => array(
        'type' => 'CHAR',
        'constraint' => 4,
      ),
      'termino' => array(
        'type' => 'CHAR',
        'constraint' => 4,
        'null' => TRUE,
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
    $this->dbforge->create_table('formacoes');
  }

  public function down(){
    $this->dbforge->drop_table('formacoes');
  }
}