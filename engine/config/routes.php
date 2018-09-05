<?php

  /*
    Убрать ненужное слово в массиве 1 уровня
   */

  return [
    //Main Controller
    '' => [
      'controller' => 'main',
      'action'     => 'index',
    ],
    //DashBoard Controller
    'dashboard' => [
      'controller' => 'main',
      'action'     => 'dashboard',
    ],
    //Account Controller
    'account' => [
      'controller' => 'account',
      'action'     => 'index',
    ],
    'account/{id:\d+}' => [
      'controller' => 'account',
      'action'     => 'index',
    ],
    'account/login' => [
      'controller' => 'account',
      'action'     => 'login',
    ],
    'account/logout' => [
      'controller' => 'account',
      'action'     => 'logout',
    ],
    'account/register' => [
      'controller' => 'account',
      'action'     => 'register',
    ],
    'account/forgot-password' => [
      'controller' => 'account',
      'action'     => 'reset',
    ],
    'account/verification' => [
      'controller' => 'account',
      'action'     => 'verification',
    ],
    'account/edit' => [
      'controller' => 'account',
      'action'     => 'edit',
    ],
    //Admin Account Controller
    'admin' => [
      'controller' => 'admin',
      'action'     => 'index',
    ],
    'admin/{type:\w+}' => [
      'controller' => 'admin',
      'action'     => 'index',
    ],
    //Project Controller
    'project' => [
      'controller' => 'project',
      'action'     => 'index',
    ],
    'project/{id:\d+}' => [
      'controller' => 'project',
      'action'     => 'index',
    ],
    'project/add' => [
      'controller' => 'project',
      'action'     => 'add',
    ],
    'project/add/{type:\w+}' => [
      'controller' => 'project',
      'action'     => 'add',
    ],
    'project/edit' => [
      'controller' => 'project',
      'action'     => 'edit',
    ],
    'project/edit/{type:\w+}' => [
      'controller' => 'project',
      'action'     => 'edit',
    ],
    'project/edit/{type:\w+}/{id:\d+}' => [
      'controller' => 'project',
      'action'     => 'edit',
    ],
    'project/archive' => [
      'controller' => 'project',
      'action'     => 'archive',
    ],
    'project/archive/{type:\w+}/{id:\d+}' => [
      'controller' => 'project',
      'action'     => 'archive',
    ],
    // Test Controller
    'test' => [
      'controller' => 'test',
      'action'     => 'index',
    ],
    'test/{id:\d+}' => [
      'controller' => 'test',
      'action'     => 'index',
    ],
    'test/{type:\w+}/{id:\d+}' => [
      'controller' => 'test',
      'action'     => 'run',
    ],
    // Search Controller
    'search' => [
      'controller' => 'search',
      'action'     => 'index',
    ],
    // Other Controller
    'news/show' => [
      'controller' => 'news',
      'action'     => 'show',
    ]
  ];

?>
