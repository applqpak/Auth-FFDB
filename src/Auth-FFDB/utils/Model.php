<?php

  include 'lib/FFDB.php';

  class Model
  {
      private $db;

      public function __construct()
      {
          $this->db = new FFDB('db/users');
          return true;
      }

      public function login($u, $p)
      {
          $users = $this->db->get('users');
          if(!(isset($users[$u])))
          {
              return false;
          }
          if(password_verify($p, $users[$u]['password']))
          {
              return true;
          }
          return false;
      }

      public function register($u, $p)
      {
          $users = $this->db->get('users');
          if(isset($users[$u]))
          {
              return false;
          }
          $users[$u] = ['username' => $u, 'password' => $p, 'date_registered' => date('r')];
          $this->db->set('users', $users);
          $this->db->save();
          return true;
      }

      public function fetch($u, $p)
      {
          $users = $this->db->get('users');
          if(!(isset($users[$u])))
          {
              return false;
          }
          if(password_verify($p, $users[$u]['password']))
          {
              return json_encode(
                  [
                      'username'        => $users[$u]['username'],
                      'password'        => $users[$u]['password'],
                      'date_registered' => $users[$u]['date_registered']
                  ]
              );
          }
          return false;
      }
  }
