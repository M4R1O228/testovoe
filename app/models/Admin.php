<?php

namespace app\models;

use app\core\Model;

class Admin extends Model{

  public function getUsers() {
    $result = $this->db->row('SELECT * from users');
    return $result;
  }

  public function getCategories()
  {
    $result = $this->db->row('SELECT * from categories');
    return $result;
  }

  public function removeCategory($id) {
    $result = $this->db->row('delete from categories where id = ' . $id);
    return $result;
  }

  public function createCategory($category) {
    $result = $this->db->row("insert into categories (category) values ('" . $category . "')");
    return $result;
  }

  public function getCategory($id) {
    $result = $this->db->row('select * from categories where id = ' . $id);
    return $result;
  }

  public function updateCategory($id, $category) {
    $result = $this->db->row("update categories set category = '" . $category . "' where id = " . $id);
    return $result;
  }



}

