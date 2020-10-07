<?php
# header.php
# Шаблон шапки портала
# v.:0.0.1
# @intervision

echo '
<html>
  <head>
    <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.css">
    <link rel="shortcut icon" href="/lib/media/icons/favicon.ico" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <title>
  '.LNG_TITLE.'
  </title>
<body>
';

include_once($BASEDIR.'/nav.php');

?>
