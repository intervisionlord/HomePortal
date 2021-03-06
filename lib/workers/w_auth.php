<?php
# w_auth.php
# Обработчик авторизации
# v.:0.1.5
# © 2020 intervision

include_once($_SERVER['DOCUMENT_ROOT'].'/conf/settings.php');
include_once($BASEDIR.'/header.php');

# Проверка данных от формы авторизации
if (!empty($_POST['password']) and !empty($_POST['login']) ) {
  //Пишем логин и пароль из формы в переменные (для удобства работы):
  $login = $_POST['login'];
  $password = md5($_POST['password']);

# ВЫБРАТЬ ИЗ таблицы_users ГДЕ поле_логин = $login И поле_пароль = $password.
  $query = 'SELECT*FROM users WHERE login="'.$login.'" AND pass="'.$password.'"';
  $result = mysqli_query($DBLINK, $query); //ответ базы пишем в переменную $result
  $user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP

# Если БД вернула не пустой ответ - значит пара логин-пароль правильная
    if (!empty($user)) {
# Пользователь прошел авторизацию
			$_SESSION['auth'] = true;
			$_SESSION['id'] = $user['id'];
			$_SESSION['login'] = $user['login'];
      $_SESSION['name'] = $user['name'];
      $_SESSION['status'] = $user['status'];

      echo '
      <div class="alert alert-success m-5" role="alert">
      '.LNG_AUTH_SUCCES.'<br><small>'.LNG_AUTH_REDIRECT.'</small>
      </div>
      ';
    } else {
# Пользователь неверно ввел логин или пароль
      echo '
      <div class="alert alert-danger m-5" role="alert">
      '.LNG_AUTH_FAIL.'<br><small>'.LNG_AUTH_FAIL_DESCR.'</small>
      </div>
      ';
  }
}

include_once($BASEDIR.'/footer.php');
?>
