<?php

return [
  //MainController
  '' => [
    'controller' => 'main',
    'action' => 'index'
  ],
  'question/{id:\d+}' => [
    'controller' => 'main',
    'action' => 'question'
  ],
  'questions' => [
    'controller' => 'main',
    'action' => 'questions'
  ],
  'question/like/{id:\d+}' => [
    'controller' => 'main',
    'action' => 'like'
  ],
  'question/dislike/{id:\d+}' => [
    'controller' => 'main',
    'action' => 'dislike'
  ],
  //AccountController
  'account/login' => [
    'controller' => 'account',
    'action' => 'login'
  ],
  'account/register' => [
    'controller' => 'account',
    'action' => 'register'
  ],
  'account/logout' => [
    'controller' => 'account',
    'action' => 'logout'
  ],
  'account/add' => [
    'controller' => 'account',
    'action' => 'add'
  ],
  'account/signin' => [
    'controller' => 'account',
    'action' => 'signin'
  ],
  'account/signup' => [
    'controller' => 'account',
    'action' => 'signup'
  ],
  'account/notes' => [
    'controller' => 'account',
    'action' => 'notes'
  ],

  //AdminController
  'admin/categories' => [
    'controller' => 'admin',
    'action' => 'categories'
  ],
  'admin/edit/{id:\d+}' => [
    'controller' => 'admin',
    'action' => 'edit'
  ],
  'admin/create' => [
    'controller' => 'admin',
    'action' => 'create'
  ],
  'admin/remove/{id:\d+}' => [
    'controller' => 'admin',
    'action' => 'remove'
  ],
  'admin/panel' => [
    'controller' => 'admin',
    'action' => 'panel'
  ],

];
