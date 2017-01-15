<?php

  include 'lib/FFDB.php';

  $db = new FFDB('db/users');
  $db->set('users', []);
  $db->save();
