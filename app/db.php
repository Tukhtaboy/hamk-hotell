<?php 
try {
  $pdo = new PDO('mysql:dbname=hamk_hotel; host=127.0.0.1:3307', 'root', '',  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
  die($e->getMessage());
}
