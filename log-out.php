<?php 

    setcookie("user_id"," ",time()-3600);
    setcookie("username"," ",time()-3600);
    var_dump($_COOKIE);
    print time() - 3600;
    
  
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Tienda-Virtual-2020';
  header('Location: ' . $home_url);
?>