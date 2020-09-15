<?php
  session_start();
  $_SESSION = array();
  session_destroy();
  setcookie('user_id_admin','',time() - 36000);
  setcookie('username_admin','',time() - 36000);
  $admin_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Tienda-Virtual-2020/admin';
  header('Location:' . $admin_url);
?>