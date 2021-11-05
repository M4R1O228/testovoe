<?php

namespace app\controllers;

use app\core\Controller;

class AdminController extends Controller{


  public function categoriesAction() {
    $categories = $this->model->getCategories();
    $vars = [
      'categories' => $categories
    ];
    $this->view->render('categories page', $vars);
  }
  public function panelAction() {
    $users = $this->model->getUsers();
    $vars = [
      'users' => $users
    ];
    $this->view->render('Users which exist', $vars);
  }
  public function removeAction() {
    $this->model->removeCategory($this->route['id']);
    $this->view->redirect('admin/categories');
  }

  public function createAction() {
    if(!empty($_POST)){
      $this->model->createCategory($_POST['category']);
    }
    $this->view->redirect('admin/categories');
  }

  public function editAction() {
    $category = $this->model->getCategory($this->route['id']);
    $vars = [
      'category' => $category
    ];

    if(!empty($_POST)) {
      $this->model->updateCategory($this->route['id'], $_POST['category']);
      $this->view->redirect('admin/categories');
    }
    $this->view->render('Edit category', $vars);
  }


}
