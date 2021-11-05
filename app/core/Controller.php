<?php

namespace app\core;

use app\core\View;

abstract class Controller {

  public $route;
  public $view;
  public $control;

  public function __construct($route)
  {
    $this->route = $route;
    if(!$this->checkControl()) {
      debug($this->checkControl());
    }
    $this->view = new View($route);
    $this->model = $this->loadModel($route['controller']);
  }

  public function loadModel($name) {
    $path = 'app\models\\' . ucfirst($name);
    if (class_exists($path)) {
      return new $path;
    }
  }

  public function checkControl() {
    $this->control = require 'app/control/' . $this->route['controller'] . '.php';
    if ($this->isControl('all')) {
      return true;
    }
    elseif (isset($_SESSION['authorize']['id']) && $this->isControl('authorize')) {
      return true;
    }
    elseif (isset($_SESSION['admin']) && $this->isControl('admin')) {
      return true;
    }
    return false;
  }

  public function isControl($key) {
    return in_array($this->route['action'], $this->control[$key]);
  }
}
