<?php

require_once('inc/header.php');

$auth->logout();

echo "<script> window.location = 'index.php'; </script>";

