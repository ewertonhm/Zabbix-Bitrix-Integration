<?php
 try {
    $db = new PDO("pgsql:host=localhost dbname=postgres user=postgres password=sngesp.,");
 } catch (PDOException $e) {
    print $e->getMessage();
 }
 ?>