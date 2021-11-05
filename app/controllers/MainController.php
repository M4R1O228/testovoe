<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{

  public function indexAction()
  {
    if (isset($_SESSION['authorize']['id'])) {
      if (!empty($_POST)) {
        if (isset($_POST['dateSort'])) {
          $questionsSortedByDate = $this->model->getQuestionsSortedByDate($_SESSION['userId']);
          $categoriesByUser = $this->model->getCategoriesByUser($_SESSION['userId']);
          $vars = [
            'questionsByUser' => $questionsSortedByDate,
            'categoriesByUser' => $categoriesByUser
          ];
          $this->view->render('Main page', $vars);
        } elseif (isset($_POST['originalSort'])) {
          $questionsByUser = $this->model->getQuestionsByUser($_SESSION['userId']);
          $categoriesByUser = $this->model->getCategoriesByUser($_SESSION['userId']);
          $vars = [
            'questionsByUser' => $questionsByUser,
            'categoriesByUser' => $categoriesByUser
          ];
          $this->view->render('Main page', $vars);
        } elseif(!empty($_POST['searchWords'])) {
          $searchWords = $_POST['searchWords'];
          $searchWords = trim($searchWords);
          $searchWords = strip_tags($searchWords);
          $questionsBySearch = $this->model->getQuestionsBySearch($_SESSION['userId'], $searchWords);
          $categoriesByUser = $this->model->getCategoriesBySearch($_SESSION['userId'], $searchWords);
          $vars = [
            'questionsByUser' => $questionsBySearch,
            'categoriesByUser' => $categoriesByUser
          ];
          $this->view->render('Main page', $vars);
        } else {
          $questionsByUser = $this->model->getQuestionsByUser($_SESSION['userId']);
          $categoriesByUser = $this->model->getCategoriesByUser($_SESSION['userId']);
          $vars = [
            'questionsByUser' => $questionsByUser,
            'categoriesByUser' => $categoriesByUser
          ];
          $this->view->render('Main page', $vars);
        }
      } else {

        $questionsByUser = $this->model->getQuestionsByUser($_SESSION['userId']);
        $categoriesByUser = $this->model->getCategoriesByUser($_SESSION['userId']);
        $vars = [
          'questionsByUser' => $questionsByUser,
          'categoriesByUser' => $categoriesByUser
        ];
        $this->view->render('Main page', $vars);
      }
    } else {
      $this->view->render('Main page');
    }

  }

  public function questionAction()
  {
    $question = $this->model->getQuestion($this->route['id']);
    $answers = $this->model->getAnswers($question[0]['id']);
    if (!empty($_POST)) {
      $this->model->setAnswer($_POST['newAnswer'], $_SESSION['userId'], $question[0]['id']);
      $this->view->redirect('question/' . $question[0]['id']);
    }
    $vars = [
      'question' => $question,
      'answers' => $answers,
    ];
    $this->view->render('Question', $vars);
  }

  public function questionsAction() {
    $questions = $this->model->getQuestions();
    $vars = [
      'questions' => $questions
    ];
    $this->view->render('All questions', $vars);
  }

  public function likeAction() {
    $answer = $this->model->getAnswer($this->route['id']);
    $newCount = intval($answer[0]['likes']);
    $newCount++;
    $newUser = $answer[0]['likesByUsers'] . $_SESSION['userId'] . ',';
    $question_id = intval($answer[0]['question_id']);
    $this->model->updateLikesAnswer($this->route['id'], $newCount, $newUser);
    $this->view->redirect('question/' . $question_id);
  }

  public function dislikeAction() {
    $answer = $this->model->getAnswer($this->route['id']);
    $newCount = intval($answer[0]['dislikes']);
    $newCount++;
    $newUser = $answer[0]['dislikesByUsers'] . $_SESSION['userId'] . ',';
    $question_id = intval($answer[0]['question_id']);
    $this->model->updateDislikesAnswer($this->route['id'], $newCount, $newUser);
    $this->view->redirect('question/' . $question_id);
  }

}
