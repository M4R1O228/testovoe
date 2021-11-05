<?php

namespace app\models;

use app\core\Model;

class Account extends Model
{

  public $error;

  public function getCategories()
  {
    $result = $this->db->row('SELECT * from categories');
    return $result;
  }

  public function getCheckUser($name, $password)
  {
    $result = $this->db->row('SELECT * from users where name =' . "'" . $name . "'" . ' and password = ' . "'"  . $password . "'");
    return $result;
  }

  public function setUser($name, $password)
  {
    $result = $this->db->row('INSERT INTO users (name, password) values (' . "'" . $name . "'" . ', ' . "'"  . $password . "')");
    return $result;
  }

  public function getNotes($userId) {
    $byUserId = intval($userId);
    $result = $this->db->row("select notes.id, notes.timeCreated, notes.title, notes.description, category from categories 
inner join notes on categories.id = notes.category_id where notes.byUserId = " . $userId);
    return $result;
  }

  public function setQuestion($title, $description, $byUserId, $categoryId, $checkNote) {
    $byUserId = intval($byUserId);
    $categoryId = intval($categoryId);
    $timeCreated = date("y-m-d");
    if ($checkNote) {
      $result = $this->db->row("INSERT INTO notes (title, description, byUserId, category_id, timeCreated) 
values ('" . $title . "'" . ", '" . $description . "', " . $byUserId . ', ' . $categoryId . ", '".$timeCreated . "')");
    } else {
      $result = $this->db->row("INSERT INTO questions (title, description, byUserId, category_id, timeCreated) 
values ('" . $title . "'" . ", '" . $description . "', " . $byUserId . ', ' . $categoryId . ", '".$timeCreated . "')");
    }
    return $result;
  }

  public function getUsers()
  {
    $result = $this->db->row('SELECT * from users');
    return $result;
  }

}
