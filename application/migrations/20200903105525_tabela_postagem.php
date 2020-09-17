<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tabela_postagem extends CI_Migration {

  public function up(){
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'titulo' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
      'conteudo' => array(
        'type' => 'TEXT',
      ),
      'data_postagem' => array(
        'type' => 'DATETIME',
      ),
      'mostrar_site' => array(
        'type' => 'TINYINT',
        'constraint' => 1,
        'default' => 0,
      ),
      'id_pessoa' => array(
        'type' => 'INT',
        'constraint' => 5,
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('postagens');
  }

  public function down(){
    $this->dbforge->drop_table('postagens');
  }
}