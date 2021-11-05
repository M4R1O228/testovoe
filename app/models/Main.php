<?php

namespace app\models;

use app\core\Model;

class Main extends Model
{

  public function getQuestions()
  {
    $result = $this->db->row('SELECT q.id, q.title, q.description, q.byUserId, q.category_id, q.timeCreated, c.category from questions q inner join categories c on c.id = q.category_id order by q.timeCreated asc');
    return $result;
  }

  public function getQuestion($id)
  {
    $result = $this->db->row('SELECT q.id, q.title, q.description, q.byUserId, q.category_id, q.timeCreated, c.category from questions q inner join categories c on c.id = q.category_id where q.id = ' . $id);
    return $result;
  }

  public function getAnswers($id)
  {
    $result = $this->db->row('select a.dislikes, a.dislikesByUsers, a.id, a.likesByUsers, a.likes, a.answer, a.timeCreated, u.name from answers a inner join users u on u.id = a.byUserId where a.question_id = ' . $id . ' order by a.timeCreated asc ');
    return $result;
  }

  public function getAnswer($id)
  {
    $result = $this->db->row('select * from answers where id = ' . $id . ' ');
    return $result;
  }

  public function setAnswer($answer, $userId, $questionId)
  {
    $userId = intval($userId);
    $questionId = intval($questionId);
    $timeCreated = date("y-m-d");
    $result = $this->db->row("insert into answers (answer, timeCreated, byUserId, question_id) values ('" . $answer . "', '" . $timeCreated . "', " . $userId . ", " . $questionId . ' )');
    return $result;
  }

  public function getQuestionsByUser($userId)
  {
    $userId = intval($userId);
    $result = $this->db->row("select questions.timeCreated, questions.title, questions.description, category from categories 
inner join questions on categories.id = questions.category_id where questions.byUserId = " . $userId);
    return $result;
  }

  public function getCategoriesByUser($userId)
  {
    $userId = intval($userId);
    $result = $this->db->row("select distinct category from categories 
inner join questions on categories.id = questions.category_id where questions.byUserId = " . $userId);
    return $result;
  }

  public function getQuestionsSortedByDate($userId)
  {
//    select categories.title from categories inner join questions on categories.id = questions.category_id where questions.byUserId = 2
    $userId = intval($userId);
    $result = $this->db->row("select questions.timeCreated, questions.title, questions.description, category from categories 
inner join questions on categories.id = questions.category_id where questions.byUserId = " . $userId . ' order by timeCreated asc');
    return $result;
  }

  public function getQuestionsBySearch($userId, $searchWords)
  {
    $userId = intval($userId);
    $result = $this->db->row("select questions.timeCreated, questions.title, questions.description, category from categories 
inner join questions on categories.id = questions.category_id where questions.byUserId = " . $userId . " and questions.title like" . "'%" . $searchWords . "%' or questions.description like " . "'%" . $searchWords . "%'  order by timeCreated asc");
    return $result;
  }

  public function getCategoriesBySearch($userId, $searchWords)
  {
    $userId = intval($userId);
    $result = $this->db->row("select distinct category from categories 
inner join questions on categories.id = questions.category_id where questions.byUserId = " . $userId . " and questions.title like" . "'%" . $searchWords . "%' or questions.description like " . "'%" . $searchWords . "%'  order by timeCreated asc");
    return $result;
  }

  public function updateLikesAnswer($id, $count, $byUsers)
  {
    $result = $this->db->row("update answers set likes = " . $count . ", likesByUsers =  '" . $byUsers . "' where id = " . $id);
    return $result;
  }

  public function updateDislikesAnswer($id, $count, $byUsers)
  {
    $result = $this->db->row("update answers set dislikes = " . $count . ", dislikesByUsers =  '" . $byUsers . "' where id = " . $id);
    return $result;
  }

}

