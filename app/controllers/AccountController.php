<?php

namespace app\controllers;

use app\core\Controller;

class AccountController extends Controller
{

  public function loginAction()
  {
    $users = $this->model->getUsers();
    $vars = [
      'users' => $users
    ];
    if (isset($_SESSION['authorize']['id'])) {
      $this->view->redirect('');
    }
    $this->view->render('Login page', $vars);
  }

  public function registerAction()
  {
    $users = $this->model->getUsers();
    $vars = [
      'users' => $users
    ];
    if (isset($_SESSION['authorize']['id'])) {
      $this->view->redirect('');
    }
    $this->view->render('Register page', $vars);
  }

  public function logoutAction()
  {
    if (isset($_SESSION['authorize']['id'])) {
      unset($_SESSION['authorize']['id']);
    }
    if (isset($_SESSION['admin'])) {
      unset($_SESSION['admin']);
    }
    $this->view->redirect('account/login');
  }

  public function addAction()
  {
    $categories = $this->model->getCategories();
    $vars = [
      'categories' => $categories
    ];
    if (!empty($_POST)) {
      if (isset($_POST['checkNotes'])) {
        $this->model->setQuestion($_POST['title'], $_POST['description'], $_SESSION['userId'], $_POST['category'], true);
      } else {
        $this->model->setQuestion($_POST['title'], $_POST['description'], $_SESSION['userId'], $_POST['category'], false);
      }
      $this->view->redirect('');
    }
    $this->view->render('Add page', $vars);
  }

  public function notesAction() {
    $notes = $this->model->getNotes($_SESSION['userId']);
    $vars = [
      'notes' => $notes
    ];
    $this->view->render('Notes page', $vars);
  }

  public function signinAction()
  {
    $checkUser = $this->model->getCheckUser($_POST['name'], $_POST['password']);
    if (empty($checkUser)) {
      $_SESSION['message'] = 'wrong password or login';
      $this->view->render('signin page');
    } else {
      $_SESSION['userId'] = $checkUser[0]['id'];
      $_SESSION['userName'] = $checkUser[0]['name'];
      $vars = [
        'checkUser' => $checkUser
      ];
      if (!empty($_POST)) {
        if (!empty($checkUser)) {
          $_SESSION['authorize']['id'] = true;
          $_SESSION['message'] = 'Krasava u signed in';
          if ($_POST['name'] == 'admin' && $_POST['password'] == 'admin') {
            $_SESSION['admin'] = true;
            $_SESSION['message'] = 'Welcome general';
          }
          $this->view->render('signin page', $vars);
        } else {
          $_SESSION['message'] = 'Invalid login or password';
          $this->view->render('signin page');
        }
      }
    }
  }

  public function signupAction()
  {
    $checkUser = $this->model->getCheckUser($_POST['name'], $_POST['password']);
    if (!empty($_POST)) {
      if (empty($checkUser)) {
        $_SESSION['authorize']['id'] = true;
        $_SESSION['message'] = 'Congrat u registered';
        $this->model->setUser($_POST['name'], $_POST['password']);
        $users = $this->model->getUsers();
        $_SESSION['userId'] = end($users)['id'];
        $_SESSION['userName'] = $_POST['name'];
        $this->view->render('signup page');
      } else {
        $_SESSION['message'] = 'This user already exists';
        $this->view->render('signup page');
      }
    }
  }

}
