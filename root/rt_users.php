<?php
# rt_users.php
# Страница управления пользователями
# v.:0.1.5
# ©2020 intervision

include_once($_SERVER['DOCUMENT_ROOT'].'/conf/settings.php');

include_once($BASEDIR.'/header.php');

if (isset($_SESSION['name']) and isset($_SESSION['status']) and $_SESSION['status'] == '1') {
# Выбираем пользователей для отображения на странице управления пользователями
    $query_users = 'SELECT login, status, name, email, comment FROM users';
    $result_users = mysqli_query($DBLINK, $query_users);

  echo '
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">'.LNG_LOGIN.'</th>
        <th scope="col">'.LNG_NAME.'</th>
        <th scope="col">'.LNG_STATUS.'</th>
        <th scope="col">'.LNG_EMAIL.'</th>
        <th scope="col">'.LNG_COMMENT.'</th>
        <th scope="col">'.LNG_ACTION.'</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      ';

# Формируем таблицу с пользователями
while ($user = mysqli_fetch_assoc($result_users)) {
# Проверяем возможные пустые поля
    if (!isset($user['email'])) {
      $email = LNG_ABSENT;
    } else {
      $email = $user['email'];
    }

    if (!isset($user['comment'])) {
      $comment = LNG_ABSENT;
    } else {
      $comment = $user['comment'];
    }
# Преобразуем код статуса в название статуса
    if ($user['status'] == '1') {
      $userstatus = LNG_ADMIN;
    } elseif ($user['status'] == '2') {
      $userstatus = LNG_EDITOR;
    } elseif ($user['status'] == '3') {
      $userstatus = LNG_USER;
    }
        echo '
        <td>'.$user['login'].'</td>
        <td>'.$user['name'].'</td>
        <td>'.$userstatus.'</td>
        <td>'.$email.'</td>
        <td>'.$comment.'</td>
          <td>
            <form action="/root/rt_w_edituser" method="POST">
              <div class="form-group">
                <input class="form-control" type="text" value ="'.$user['login'].'" name="login" readonly hidden>
                <button class="btn btn-outline-primary btn-sm" type="submit" name="useraction" value="edit">'.LNG_EDIT.'</button>
                <button class="btn btn-outline-danger btn-sm" type="submit" name="useraction" value="delete">'.LNG_DELETE.'</button>
              </div>
            </form>
          </td>';
      }
    echo '
      </tr>
    </tbody>
  </table>

  ';


  } else {
  echo 'YOU ARE NOT ADMIN! GET OUT!';
}

include_once($BASEDIR.'/footer.php');
?>
