<?php 

$pdo = require_once("./db/connect.php");
$page = $_GET["page"];
if(!isset($page)) {
  die(header("Location: index.php?page=home"));
}


?>