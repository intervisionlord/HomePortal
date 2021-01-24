<?php
# auth.php
# Скрипт авторизации, форма запроса логина и пароля
# v.:0.1.2
# ©2020 intervision

include_once('./conf/settings.php');

include_once($BASEDIR.'/header.php');

# Проверяем на наличие сессии
if (array_key_exists('auth', $_SESSION)) {
  if ($_SESSION['auth'] == true) {
    echo '
    <div class="col d-flex justify-content-center m-5">
      <div class="card shadow bg-white rounded" style="width: 18rem;">
        <img src="/lib/media/images/padlock.png" class="card-img-top" alt="Padlock image">
          <div class="alert alert-success m-5" role="alert">
            <small>
              '.LNG_ALREADY_AUTH.'<br><a href="/lib/workers/w_logout?logout=logout">'.LNG_AUTH_EXIT.'?</a>
            </small>
          </div>
      </div>
    </div>
  ';
  session_write_close();
  } else {
    echo 'lol?';
  }
} else {
  echo '
  <div class="col d-flex justify-content-center m-5">
  <div class="card shadow bg-white rounded" style="width: 18rem;">
  <img src="/lib/media/images/padlock.png" class="card-img-top" alt="Padlock image">
    <form action="/lib/workers/w_auth" method="POST">
      <div class="card-body">

        <div class="form-group">
          <label for="login">'.ICO_USER.' '.LNG_LOGIN.'</label>
          <input type="text" id="login" name="login" class="form-control" aria-describedby="passwordHelpBlock">
          <small id="LoginHelpBlock" class="form-text text-muted">
          '.LNG_LOGIN_DESCR.'
          </small>
        </div>

        <div class="form-group">
          <label for="password">'.ICO_KEY.' '.LNG_PASSWORD.'</label>
          <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpBlock">
          <small id="passwordHelpBlock" class="form-text text-muted">
          '.LNG_PASSWORD_DESCR.'
          </small>
        </div>

        <button type="submit" class="btn btn-primary">'.LNG_BTN_LOGIN.'</button>

      </div>
    </form>
  </div>
  </div>';
}
include_once($BASEDIR.'/footer.php');
?>
