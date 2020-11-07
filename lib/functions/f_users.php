<?php
# f_users.php
# Функции управления пользователями
# v.:0.1.3
# ©2020 intervision

#
# Добавление пользователя
#
function adduser($DBLINK, $uadd_login, $uadd_pass, $uadd_status, $uadd_name, $uadd_email, $uadd_comment) {

# Проверка соединения с БД
if (!$DBLINK) {
  die('Connection failed: ' . mysqli_connect_error());
  }

# Принимаемый функцией и передаваемый в БД пароль должен приходить уже в зашифрованом виде!
# Поэтому, внутри функции шифрование не используем. Оно должно проходить еще в форме ввода данных.
$query_adduser = "INSERT INTO users (login, pass, status, name, email, comment)
                  VALUES ('$uadd_login', '$uadd_pass', '$uadd_status', '$uadd_name', '$uadd_email', '$uadd_comment')";

if (mysqli_query($DBLINK, $query_adduser)) {
# Преобразуем код статуса в расшифровку
  if ($uadd_status == '1') {
    $converted_status = LNG_ADMIN;
  } elseif ($uadd_status == '2') {
    $converted_status = LNG_EDITOR;
  } elseif ($uadd_status == '3') {
    $converted_status = LNG_USER;
  }
# Возвращаем результат: Пользователь "username" добавлен состатусом "status"
  return '
    <br>
    '.LNG_USER.' '.$uadd_login.' '.LNG_WASADDED.' '.$converted_status;
} else {
  return LNG_ERROR.': '.$query_adduser.'<br>'.mysqli_error($DBLINK);
}

mysqli_close($DBLINK);
}

#
# Удаление пользователя
#

function deluser($DBLINK, $udel_login) {
  if (!$DBLINK) {
    die('Connection failed: ' . mysqli_connect_error());
    }
  $query_deluser = "DELETE FROM users WHERE login = '$udel_login'";

    if (mysqli_query($DBLINK, $query_deluser)) {
      return '
      <br>
      '.LNG_USER.' '.$udel_login.' '.LNG_DELETED.'
      ';
    } else {
      return LNG_ERROR.': '.$query_adduser.'<br>'.mysqli_error($DBLINK);
    }
}

?>
