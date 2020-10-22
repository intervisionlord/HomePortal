<?php
# w_logout.php
# Обработчик авторизации - выход
# v.:0.1.1
# © 2020 intervision

include_once($_SERVER['DOCUMENT_ROOT'].'/conf/settings.php');
include_once($BASEDIR.'/header.php');

if (!empty($_GET['logout']) and $_GET['logout'] == 'logout') {
  session_destroy();
  echo '
  <div class="alert alert-success m-5" role="alert">
  '.LNG_AUTH_LOGGED_OUT.'<br><small>'.LNG_AUTH_REDIRECT.'</small>
  </div>
  ';
}

include_once($BASEDIR.'/footer.php');
?>
