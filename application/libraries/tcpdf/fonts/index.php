<?php
if(is_file('connect.php')) $racine="";
else if(is_file('../connect.php')) $racine="../"; 
  require_once ''.$racine.'ouvrir_session.php';
    $tab=ouvrir_session();
     if ( $tab[0]==false) header("Location:$racine");
?>
