<?php 

    setcookie("user_id"," ",time()-3600,'/Tienda-Virtual-2020');
    setcookie("username"," ",time()-3600,'/Tienda-Virtual-2020');

    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Tienda-Virtual-2020';
    header('Location: ' . $home_url);
?>