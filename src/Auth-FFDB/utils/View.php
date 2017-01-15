<?php

  include 'Controller.php';

  $controller = new Controller();
  if((isset($_REQUEST['action'])) && (isset($_REQUEST['username'])) && (isset($_REQUEST['password'])))
  {
      if(($data = $controller->{strtolower($_REQUEST['action'])}($_REQUEST['username'], $_REQUEST['password'])) !== false)
      {
          echo $data;
          return;
      }
      echo 'false';
      return;
  }
