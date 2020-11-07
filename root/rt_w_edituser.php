<?php
# rt_w_edituser.php
# Старница редактирования пользователей и операций над ними
# v.:0.1.2
# ©2020 intervision

include_once($_SERVER['DOCUMENT_ROOT'].'/conf/settings.php');
include_once($BASEDIR.'/header.php');
include_once($BASEDIR.'/lib/functions/f_users.php');
# Проверяем, что пользователь админ
if (isset($_SESSION['name']) and isset($_SESSION['status']) and $_SESSION['status'] == '1') {
  if (($_POST['useraction'] == "delete") and (isset($_POST['login']))) {
    $del_login = $_POST['login'];
    echo "ACTION SET TO DELETE for user ".$del_login;
    echo deluser($DBLINK, $del_login);
  }

  if (($_POST['useraction'] == "edit") and (isset($_POST['login']))) {
    echo "ACTION SET TO EDIT for user ".$_POST['login'];
  }
} else {
  echo 'YOU ARE NOT ADMIN! GET OUT!';
}

include_once($BASEDIR.'/footer.php');
?>
