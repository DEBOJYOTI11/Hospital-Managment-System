<?php

session_start();

if (!isset($_SESSION['name'])) {
    if (isset($_COOKIE['name']) && isset($_COOKIE['id'])){
    
      $_SESSION['id'] = $_COOKIE['id'];
      $_SESSION['name'] = $_COOKIE['name'];
    }
  }
?>