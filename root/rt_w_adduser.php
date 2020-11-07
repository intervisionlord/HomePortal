<?php
# rt_w_adduser.php
# Старница добавления пользователя
# v.:0.1.1
# ©2020 intervision

include_once($_SERVER['DOCUMENT_ROOT'].'/conf/settings.php');
include_once($BASEDIR.'/header.php');
include_once($BASEDIR.'/lib/functions/f_users.php');
# Проверяем, что пользователь админ
if (isset($_SESSION['name']) and isset($_SESSION['status']) and $_SESSION['status'] == '1') {
  if ((isset($_POST['useraction'])) and ($_POST['useraction'] == 'add')) {

#    echo '
#    <form action="/root/rt_w_adduser" method="POST">
#      <div class="formgroup">
#      </div>
#    </form>
#    ';
    echo adduser($DBLINK, 'testlogin', 'testpass', '3', 'testname', 'testemail', 'testcomment');

  }
} else {
  echo 'YOU ARE NOT ADMIN! GET OUT!';
}

include_once($BASEDIR.'/footer.php');
?>
