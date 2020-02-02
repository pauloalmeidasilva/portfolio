<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_addfield_conhecimento extends CI_Migration {

  public function up(){
    $field = array(
      'mostrar_curriculo' => array(
        'type' => 'TINYINT',
        'constraint' => 1,
        'default' => 0,
        'after' => 'porcentagem_experiencia'
      ));
    $this->dbforge->add_column('conhecimentos', $field);
  }

  public function down(){
    $this->dbforge->drop_column('conhecimentos', 'mostrar_curriculo');
  }
}